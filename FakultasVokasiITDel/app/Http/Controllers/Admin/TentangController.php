<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use App\Models\Tentang;
use Illuminate\Http\Request;
use GuzzleHttp\RequestOptions;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\ConnectException;


class TentangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Memastikan pengguna sudah terautentikasi
    }

    public function getTentang()
    {
        try {
            $client = new Client(['base_uri' => 'http://localhost:8002']); // Inisialisasi klien Guzzle

            // Lakukan permintaan HTTP ke port 8002
            $response = $client->get('/admin/tentang');

            // Mendapatkan respons JSON dan mengubahnya menjadi array
            $tentang = json_decode($response->getBody(), true);

            return $tentang;
        } catch (ConnectException $e) {
            // Tangani kesalahan koneksi jika port dimatikan
            return null;
        }
    }

    // Fungsi untuk menampilkan halaman profil
    public function index()
    {
        $tentangData = $this->getTentang(); // Mendapatkan data dari getTentang()

        if ($tentangData === null) {
            // Jika tidak ada data dari layanan lain, tampilkan pesan kesalahan
            return view('admin.error')->with('message', 'Service tidak tersedia. Silakan coba lagi nanti.');
        }

        $tentang = Tentang::first(); // Mendapatkan profil pertama dari database

        if (!$tentang) {
            // Jika tidak ada profil, buat profil baru dengan data dari getTentang()
            $profil = new Tentang();
            foreach ($tentangData as $key => $value) {
                $tentang->$key = $value;
            }
            $tentang->save();
        } else {
            // Update tentang yang sudah ada dengan data dari getTentang()
            $tentang->update($tentangData);
        }

        return view('admin.tentang.index', compact('tentang')); // Menampilkan halaman dengan data profil
    }

    // Fungsi untuk memperbarui profil
    public function update(Request $request)
    {
        $client = new Client(['base_uri' => 'http://localhost:8002']); // Inisialisasi klien Guzzle

        // Mengambil data dari permintaan
        $data = $request->only([
            'sejarah', 'visi', 'misi', 'landasan', 'sasaran', 'makna'
        ]);

        // Proses unggahan file jika ada
        if ($request->hasFile('sejarah_foto')) {
            $file = $request->file('sejarah_foto');
            $filename = $file->getClientOriginalName(); // Mengambil nama asli file
            $file->storeAs('public/tentang', $filename);
            $data['sejarah_foto'] = 'public/tentang/' . $filename; // Menggunakan nama asli file
        }

        // Proses unggahan file jika ada
        if ($request->hasFile('tujuan_foto')) {
            $file = $request->file('tujuan_foto');
            $filename = $file->getClientOriginalName(); // Mengambil nama asli file
            $file->storeAs('public/tentang', $filename);
            $data['tujuan_foto'] = 'public/tentang/' . $filename; // Menggunakan nama asli file
        }

        try {
            // Kirim permintaan ke layanan Go dengan metode PUT
            $response = $client->request('PUT', "admin/tentang/update", [
                RequestOptions::JSON => $data,
            ]);

            if ($response->getStatusCode() == 200) {
                // Update data tentang di database lokal jika permintaan berhasil
                return redirect()->route('admin.tentang')->with('success', 'Tentang updated successfully');
            } else {
                return redirect()->route('admin.tentang')->with('error', 'Failed to update Tentang');
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.tentang')->with('error', 'Failed to update tentang: ' . $e->getMessage());
        }
    }
}
