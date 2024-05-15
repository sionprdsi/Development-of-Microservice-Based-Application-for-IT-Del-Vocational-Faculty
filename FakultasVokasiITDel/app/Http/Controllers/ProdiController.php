<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Prodi;
use GuzzleHttp\Client;
use App\Models\Prestasi;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Models\Profil; // Tambahkan use statement ini

class ProdiController extends Controller
{
    public function index(Request $request)
    {
        $prodi = $this->getProdi();
        $prodi = Prodi::all();
        $news = Prestasi::orderBy('created_at', 'desc')->take(3)->get();
        $detail = null;
        $semester = null;
        $dosen = null;
        $data_semester = array('Semester 1', 'Semester 2', 'Semester 3', 'Semester 4', 'Semester 5', 'Semester 6', 'Semester 7', 'Semester 8');

        // Ambil data profil
        $profil = Profil::first(); // Atau gunakan metode lain sesuai dengan model Profil Anda

        if ($request->has('q')) {
            $slug = $request->input('q');
            $detail = Prodi::where('slug', $slug)->first();

            if ($detail) {
                $semester = Semester::where('prodi_id', $detail->id)->get();
                $dosen = Dosen::where('prodi_id', $detail->id)->get();
            } else {
                $detail = null;
            }
        }

        return view('prodi', compact('prodi', 'detail', 'semester', 'dosen', 'news', 'data_semester', 'profil'));
    }

    private function getProdi()
    {
        $client = new Client(['base_uri' => 'http://localhost:8003']);

        try {
            // Lakukan permintaan HTTP menggunakan proxy ke port 8002
            $response = $client->get('/admin/prodi');

            // Mendapatkan respons JSON
            $prodiData = json_decode($response->getBody(), true);

            $prodi = new Prodi();
            foreach ($prodiData as $key => $value) {
                $prodi->$key = $value;
            }

            return $prodi;

        } catch (\Exception $e) {
            // Menangkap error jika service tidak tersedia
            $prodi = new Prodi();
            $prodi->nama = "Service tidak tersedia. Silakan coba lagi nanti.";
            return $prodi;
        }
    }
}
