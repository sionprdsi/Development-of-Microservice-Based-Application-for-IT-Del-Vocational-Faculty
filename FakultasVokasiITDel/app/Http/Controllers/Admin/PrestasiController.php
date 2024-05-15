<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestasi; // Pastikan model Prestasi sudah ada

class PrestasiController extends Controller
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
     * Menampilkan halaman daftar prestasi.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $prestasi = Prestasi::all();
        return view('admin.prestasi.index', compact('prestasi'));
    }

    /**
     * Menampilkan form untuk membuat prestasi baru.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('admin.prestasi.create');
    }

    /**
     * Menyimpan prestasi baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'link' => 'required|string',
            'foto' => 'required|image',
            'konten' => 'required|string'
        ]);

        if ($request->hasFile('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('public/prestasi');
        }

        Prestasi::create($validatedData);
        return redirect()->route('admin.prestasi')->with('success', 'Prestasi berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit prestasi.
     *
     * @param  Prestasi $prestasi
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Prestasi $prestasi)
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    /**
     * Memperbarui prestasi dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Prestasi $prestasi
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Prestasi $prestasi)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'link' => 'required|string',
            'foto' => 'image',
            'konten' => 'required|string'
        ]);

        if ($request->hasFile('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('public/prestasi');
        }

        $prestasi->update($validatedData);
        return redirect()->route('admin.prestasi')->with('success', 'Prestasi berhasil diperbarui.');
    }

    /**
     * Menghapus prestasi dari database.
     *
     * @param  Prestasi $prestasi
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Prestasi $prestasi)
    {
        $prestasi->delete();
        return redirect()->route('admin.prestasi')->with('success', 'Prestasi berhasil dihapus.');
    }
}
