<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profil;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\RequestOptions;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Memastikan pengguna sudah terautentikasi
    }

    // Fungsi untuk mendapatkan data beranda dari layanan lain
    public function getBeranda()
    {
        try {
            $client = new Client(['base_uri' => 'http://localhost:8001']); // Inisialisasi klien Guzzle

            // Lakukan permintaan HTTP ke port 8001
            $response = $client->get('/admin/profil');

            // Mendapatkan respons JSON dan mengubahnya menjadi array
            $profil = json_decode($response->getBody(), true);

            return $profil;
        } catch (ConnectException $e) {
            // Tangani kesalahan koneksi jika port dimatikan
            return null;
        }
    }

    // Fungsi untuk menampilkan halaman profil
    public function index()
    {
        $profilData = $this->getBeranda(); // Mendapatkan data dari getBeranda()

        if ($profilData === null) {
            // Jika tidak ada data dari layanan lain, tampilkan pesan kesalahan
            return view('admin.error')->with('message', 'Service tidak tersedia. Silakan coba lagi nanti.');
        }

        $profil = Profil::first(); // Mendapatkan profil pertama dari database

        if (!$profil) {
            // Jika tidak ada profil, buat profil baru dengan data dari getBeranda()
            $profil = new Profil();
            foreach ($profilData as $key => $value) {
                $profil->$key = $value;
            }
            $profil->save();
        } else {
            // Update profil yang sudah ada dengan data dari getBeranda()
            $profil->update($profilData);
        }

        return view('admin.profil.index', compact('profil')); // Menampilkan halaman dengan data profil
    }


    // Fungsi untuk memperbarui profil
    public function update(Request $request, $id)
    {
        $client = new Client(['base_uri' => 'http://localhost:8001']); // Inisialisasi klien Guzzle

        // Mengambil data dari permintaan
        $data = $request->only([
            'nama', 'alamat', 'kode_pos', 'telepon', 'email',
            'karir', 'peta', 'kenapa_vokasi', 'facebook',
            'twitter', 'youtube', 'instagram'
        ]);

        // Cari profil yang ada di database berdasarkan ID
        $profil = Profil::find($id);

        // if (!$profil) {
        //     // Jika profil tidak ditemukan, kembalikan pesan kesalahan
        //     return redirect()->back()->with('error', 'Profil not found');
        // }

        // Proses unggahan file jika ada
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = $file->getClientOriginalName(); // Mengambil nama asli file
            $file->storeAs('public/logos', $filename);
            $data['logo'] = 'public/logos/' . $filename; // Menggunakan nama asli file
        }

        try {
            // Kirim permintaan ke layanan Go dengan metode PUT
            $response = $client->request('PUT', "admin/profil/update/$id", [
                RequestOptions::JSON => $data,
            ]);

            if ($response->getStatusCode() == 200) {
                // Update data profil di database lokal jika permintaan berhasil
                $profil->update($data);

                return redirect()->back()->with('success', 'Profil updated successfully');
            } else {
                return redirect()->back()->with('error', 'Failed to update profile');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update profile: ' . $e->getMessage());
        }
    }
}
