<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Prestasi;
use App\Models\Prodi;
use App\Models\Profil;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        $profil = $this->getProfil();
        $galeri = Galeri::orderBy('created_at', 'desc')->take(10)->get();
        $berita = Prestasi::orderBy('created_at', 'desc')->take(3)->get();
        $prodi = Prodi::all();
        return view('beranda', compact('profil', 'prodi', 'galeri', 'berita'));
    }

    private function getProfil()
    {
        $client = new Client(['base_uri' => 'http://localhost:8001']);

        try {
            // Lakukan permintaan HTTP menggunakan proxy ke port 8001
            $response = $client->get('/admin/profil');

            // Mendapatkan respons JSON
            $profilData = json_decode($response->getBody(), true);

            $profil = new Profil();
            foreach ($profilData as $key => $value) {
                $profil->$key = $value;
            }

            return $profil;
        } catch (\Exception $e) {
            // Menangkap error jika service tidak tersedia
            $profil = new Profil();
            $profil->allert = "Service tidak tersedia. Silakan coba lagi nanti.";
            return $profil;
        }
    }

}
