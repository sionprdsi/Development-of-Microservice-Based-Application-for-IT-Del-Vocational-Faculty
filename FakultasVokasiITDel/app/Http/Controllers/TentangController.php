<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Profil;
use GuzzleHttp\Client;

use App\Models\Tentang;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index(Request $request)
    {
        $prodi = Prodi::all();
        $tentang = $this->getTentang();
        $profil = Profil::first(); // Tambahkan ini untuk mengambil data profil
        return view('tentang', compact('tentang', 'prodi', 'profil')); // Tambahkan $profil ke dalam compact
    }

    private function getTentang()
    {
        $client = new Client(['base_uri' => 'http://localhost:8002']);

        try {
            // Lakukan permintaan HTTP menggunakan proxy ke port 8002
            $response = $client->get('/admin/tentang');

            // Mendapatkan respons JSON
            $tentangData = json_decode($response->getBody(), true);

            $tentang = new Tentang();
            foreach ($tentangData as $key => $value) {
                $tentang->$key = $value;
            }

            return $tentang;

        } catch (\Exception $e) {
            // Menangkap error jika service tidak tersedia
            $tentang = new Tentang();
            $tentang->nama = "Service tidak tersedia. Silakan coba lagi nanti.";
            return $tentang;
        }
    }
}
