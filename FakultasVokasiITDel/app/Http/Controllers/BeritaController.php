<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\Prodi;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $prodi = Prodi::all();
        $cari = $request->input('cari');

        // Ambil hanya 3 berita untuk ditampilkan di halaman pertama
        $berita = Prestasi::orderBy('created_at', 'desc')->paginate(3);

        // Jika ada pencarian, filter berdasarkan judul
        if (!empty($cari)) {
            $berita = Prestasi::where('judul', 'like', '%' . $cari . '%')->orderBy('created_at', 'desc')->paginate(4);
        }

        // Ambil 3 berita terbaru untuk bagian lain di halaman berita
        $news = Prestasi::orderBy('created_at', 'desc')->take(3)->get();

        return view('berita', compact('berita', 'news', 'prodi'));
    }
}
