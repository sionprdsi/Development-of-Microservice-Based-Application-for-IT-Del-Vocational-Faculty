<?php

namespace App\Http\Controllers\Admin;

use App\Models\Prodi;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\ConnectException;

class ProdiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan daftar program studi.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getProdi()
    {
        try {
            $client = new Client(['base_uri' => 'http://localhost:8003']); // Inisialisasi klien Guzzle

            // Lakukan permintaan HTTP ke port 8003
            $response = $client->get('/admin/prodi');

            // Mendapatkan respons JSON dan mengubahnya menjadi array
            $prodi = json_decode($response->getBody(), true);

            return $prodi;
        } catch (ConnectException $e) {
            // Tangani kesalahan koneksi jika port dimatikan
            return null;
        }
    }

    // Fungsi untuk menampilkan halaman profil
    public function index()
    {
        $prodiData = $this->getProdi(); // Mendapatkan data dari getProdi()

        if ($prodiData === null) {
            // Jika tidak ada data dari layanan lain, tampilkan pesan kesalahan
            return view('admin.error')->with('message', 'Service tidak tersedia. Silakan coba lagi nanti.');
        }

        // Mengambil semua profil dari database
        $prodi = Prodi::all();

        if ($prodi->isEmpty()) {
            // Jika tidak ada profil, buat profil baru dengan data dari getProdi()
            foreach ($prodiData as $key => $value) {
                $prodi = new Prodi();
                $prodi->$key = $value;
                $prodi->save();
            }
        } else {
            // Update profil yang sudah ada dengan data dari getProdi()
            foreach ($prodi as $item) {
                $item->update($prodiData);
            }
        }

        return view('admin.prodi.index', compact('prodi')); // Menampilkan halaman dengan data prodi
    }


    /**
     * Menampilkan form untuk membuat program studi baru.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('admin.prodi.create');
    }

    /**
     * Menyimpan program studi baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image',
            'sejarah' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'lulusan' => 'nullable|string',
            'kurikulum' => 'nullable|string',
            'teks_dosen' => 'nullable|string',
        ]);

        $slug = Str::slug($request->nama);
        $foto = null;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $image->storeAs('public/prodi', $image->hashName());
            $foto = $image->hashName();
        }

        Prodi::create([
            'nama' => $request->nama,
            'judul' => $request->judul,
            'slug' => $slug,
            'foto' => $foto,
            'sejarah' => $request->sejarah,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'lulusan' => $request->lulusan,
            'kurikulum' => $request->kurikulum,
            'teks_dosen' => $request->teks_dosen,
        ]);

        return redirect()->route('admin.prodi.index')->with('success', 'Program studi berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit program studi.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $prodi = Prodi::findOrFail($id);
        return view('admin.prodi.edit', compact('prodi'));
    }

    /**
     * Memperbarui program studi di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $client = new Client(['base_uri' => 'http://localhost:8003']); // Initialize Guzzle client

        // Validate the request
        $request->validate([
            'nama' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'subjudul' => 'nullable|string|max:255',
            'foto' => 'nullable|image',
            'sejarah' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'lulusan' => 'nullable|string',
            'kurikulum' => 'nullable|string',
            'teks_dosen' => 'nullable|string',
        ]);

        // Find the existing Prodi record
        $prodi = Prodi::find($id);

        // If not found, return an error
        if (!$prodi) {
            return redirect()->back()->with('error', 'Prodi not found');
        }

        // Prepare data for the request
        $data = $request->only([
            'nama', 'judul', 'subjudul', 'sejarah', 'visi', 'misi',
            'lulusan', 'kurikulum', 'teks_dosen'
        ]);

        $slug = Str::slug($request->nama);
        $data['slug'] = $slug;

        // Handle file upload if present
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/prodi', $filename);
            $data['foto'] = 'public/prodi/' . $filename;
        } else {
            // Use existing photo if no new file is uploaded
            $data['foto'] = $prodi->foto;
        }

        try {
            // Send request to Go service with PUT method
            $response = $client->request('PUT', "admin/prodi/update/$id", [
                RequestOptions::JSON => $data,
            ]);

            if ($response->getStatusCode() == 200) {
                // Update local database if the request to the Go service is successful
                $responseBody = json_decode($response->getBody(), true);
                if ($responseBody['success']) {
                    $prodi->update($data);
                    return redirect()->route('admin.prodi.index')->with('success', 'Program studi berhasil diperbarui.');
                } else {
                    return redirect()->back()->with('error', 'Failed to update program studi');
                }
            } else {
                return redirect()->back()->with('error', 'Failed to update program studi');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update program studi: ' . $e->getMessage());
        }
    }



    /**
     * Menghapus program studi dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();

        return redirect()->route('admin.prodi.index')->with('success', 'Program studi berhasil dihapus.');
    }
}
