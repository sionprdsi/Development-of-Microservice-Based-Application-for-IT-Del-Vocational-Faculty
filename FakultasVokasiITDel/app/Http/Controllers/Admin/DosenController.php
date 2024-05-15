<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Prodi;

class DosenController extends Controller
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
     * Menampilkan daftar dosen.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dosen = Dosen::with('prodi')->get();
        return view('admin.dosen.index', compact('dosen'));
    }

    /**
     * Menampilkan form untuk membuat dosen baru.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('admin.dosen.create', compact('prodi'));
    }

    /**
     * Menyimpan dosen baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'prodi_id' => 'required|exists:prodis,id',
        ]);

        $dosen = new Dosen($request->all());
        $dosen->save();

        return redirect()->route('admin.dosen')->with('success', 'Dosen berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit dosen.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        $prodi = Prodi::all();
        return view('admin.dosen.edit', compact('dosen', 'prodi'));
    }

    /**
     * Memperbarui dosen di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'prodi_id' => 'required|exists:prodis,id',
        ]);

        $dosen = Dosen::findOrFail($id);
        $dosen->update($request->all());

        return redirect()->route('admin.dosen')->with('success', 'Dosen berhasil diperbarui.');
    }

    /**
     * Menghapus dosen dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();

        return redirect()->route('admin.dosen')->with('success', 'Dosen berhasil dihapus.');
    }
}
