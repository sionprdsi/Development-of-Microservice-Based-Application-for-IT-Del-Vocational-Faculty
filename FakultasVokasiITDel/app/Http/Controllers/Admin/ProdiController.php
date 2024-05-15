<?php

namespace App\Http\Controllers\Admin;

use App\Models\Prodi;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\Facades\Log;

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
        $prodiData = $this->getProdi(); // Mendapatkan data dari getTentang()

        if ($prodiData === null) {
            // Jika tidak ada data dari layanan lain, tampilkan pesan kesalahan
            return view('admin.error')->with('message', 'Service tidak tersedia. Silakan coba lagi nanti.');
        }

        $prodi = Prodi::all(); // Mendapatkan profil pertama dari database

        if (!$prodi) {
            // Jika tidak ada profil, buat profil baru dengan data dari getTentang()
            $profil = new Prodi();
            foreach ($prodiData as $key => $value) {
                $prodi->$key = $value;
            }
            $prodi->save();
        } else {
            // Update tentang yang sudah ada dengan data dari getTentang()
            // $prodi->update($prodiData);
        }

        return view('admin.prodi.index', compact('prodi')); // Menampilkan halaman dengan data profil
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

        $prodi = Prodi::findOrFail($id);
        
        $slug = Str::slug($request->nama);
        $foto = $prodi->foto; // Default to existing photo

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $image->storeAs('public/prodi', $image->hashName());
            $foto = $image->hashName();
        }

        $prodi->update([
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

        return redirect()->route('admin.prodi.index')->with('success', 'Program studi berhasil diperbarui.');
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
