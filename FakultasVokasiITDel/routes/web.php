<?php

use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\TentangController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EventController as ControllersEventController;
use App\Http\Controllers\ProdiController as ControllersProdiController;
use App\Http\Controllers\TentangController as ControllersTentangController;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


use Illuminate\Support\Facades\Http;

// Rute untuk mengambil data profil dari server Golang
// Route::any('/admin/profil', function () {
//     // Mengirim HTTP request ke endpoint Golang
//     $response = Http::get('http://localhost:8001/admin/profil');

//     // Mengembalikan respons dari server Golang tanpa pemrosesan tambahan
//     return $response->body();
// })->name('admin.profil');

// // Rute untuk melakukan update profil ke server Golang
// Route::any('/admin/profil/update', function (Request $request) {
//     // Mengirim HTTP request ke endpoint Golang
//     $response = Http::put('http://localhost:8001/admin/profil/update', $request->all());

//     // Mengembalikan respons dari server Golang tanpa pemrosesan tambahan
//     return $response->body();
// })->name('admin.profil.update');

// Route::get('/admin/profil', [ProfilController::class, 'index'])->name('admin.profil');
// Route::put('/admin/profil/update', [ProfilController::class, 'update'])->name('admin.profil.update');

// // Beranda
// Route::get('/admin/profil', [ProfilController::class, 'index'])->name('admin.profil');
// // Update profil menggunakan metode PUT
// Route::put('/admin/profil/update', [ProfilController::class, 'update'])->name('admin.profil.update');
// Route::put('/admin/profil/update/{id}', [ProfilController::class, 'update']);
// Route::put('/admin/profil/{id}/update', [ProfilController::class, 'update'])->name('admin.profil.update');


// Routes
// Beranda
Route::get('/admin/profil', [ProfilController::class, 'index'])->name('admin.profil');
// Update profil menggunakan metode PUT
Route::put('/admin/profil/{id}/update', [ProfilController::class, 'update'])->name('admin.profil.update');
// Buat profil baru menggunakan metode POST
Route::post('/admin/profil/create', [ProfilController::class, 'create'])->name('admin.profil.create');
// Hapus profil menggunakan metode DELETE
Route::delete('/admin/profil/{id}', [ProfilController::class, 'delete'])->name('admin.profil.delete');
// Simpan profil baru menggunakan metode POST
Route::post('/admin/profil/store', [ProfilController::class, 'store'])->name('admin.profil.store');
// -- ---------------------------------------------------------------------------------------------------------

// tentang
Route::get('/admin/tentang', [TentangController::class, 'index'])->name('admin.tentang');
// Update admin menggunakan metode PUT
Route::put('/admin/tentang/{id}/update', [TentangController::class, 'update'])->name('admin.tentang.update');

// // tentang
// Route::get('/admin/tentang', function () {
//     // Mengambil data tentang dari microservice Golang
//     $response = Http::get('http://localhost:8002/admin/tentang');
//     $tentang = $response->json();

//     // Render the view and pass the fetched data
//     return view('admin.tentang.index', compact('tentang'));
// })->name('admin.tentang');

// // Mengupdate data tentang
// Route::put('/admin/tentang/update', function (Request $request) {
//     // Mengirim permintaan PUT ke microservice Golang untuk memperbarui data tentang
//     $response = Http::put('http://localhost:8002/admin/tentang', $request->all());

//     // Redirect back with the response body
//     return redirect()->back()->with('message', $response->body());
// })->name('admin.tentang.update');


// -- ---------------------------------------------------------------------------------------------------------


//prodi
Route::get('/admin/prodi', [ProdiController::class, 'index'])->name('admin.prodi');
Route::get('/admin/prodi/create', [ProdiController::class, 'create'])->name('admin.prodi.create');
Route::post('/admin/prodi', [ProdiController::class, 'store'])->name('admin.prodi.store');
Route::get('/admin/prodi/{prodi}/edit', [ProdiController::class, 'edit'])->name('admin.prodi.edit');
Route::put('/admin/prodi/{prodi}', [ProdiController::class, 'update'])->name('admin.prodi.update');
Route::delete('/admin/prodi/{prodi}', [ProdiController::class, 'destroy'])->name('admin.prodi.destroy');
// Update admin menggunakan metode PUT
Route::put('/admin/prodi/{id}/update', [ProdiController::class, 'update'])->name('admin.prodi.update');
// Route::get('/admin/prodi', function () {
//     return redirect('http://localhost:8003/admin/prodi');
// })->name('admin.prodi');







// routes/web.php
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/tentang', [ControllersTentangController::class, 'index'])->name('tentang');
Route::get('/prodi', [ControllersProdiController::class, 'index'])->name('prodi');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/event', [ControllersEventController::class, 'index'])->name('event');

// routes/auth
Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate'])->name('auth')->middleware('guest');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//home/admin
Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home');

//profil atau beranda/admin
// Route::get('/admin/profil', [ProfilController::class, 'index'])->name('admin.profil');
// Route::put('/admin/profil/update', [ProfilController::class, 'update'])->name('admin.profil.update');

// tentang/admin
// Route::get('/admin/tentang', [TentangController::class, 'index'])->name('admin.tentang');
// Route::post('/admin/tentang/update', [TentangController::class, 'update'])->name('admin.tentang.update');

//prestasi
Route::get('/admin/prestasi', [PrestasiController::class, 'index'])->name('admin.prestasi');
Route::get('/admin/prestasi/create', [PrestasiController::class, 'create'])->name('admin.prestasi.create');
Route::post('/admin/prestasi', [PrestasiController::class, 'store'])->name('admin.prestasi.store');
Route::get('/admin/prestasi/{prestasi}/edit', [PrestasiController::class, 'edit'])->name('admin.prestasi.edit');
Route::put('/admin/prestasi/{prestasi}', [PrestasiController::class, 'update'])->name('admin.prestasi.update');
Route::delete('/admin/prestasi/{prestasi}', [PrestasiController::class, 'destroy'])->name('admin.prestasi.destroy');

//galeri
Route::get('/admin/galeri', [GaleriController::class, 'index'])->name('admin.galeri');
Route::get('/admin/galeri/create', [GaleriController::class, 'create'])->name('admin.galeri.create');
Route::post('/admin/galeri', [GaleriController::class, 'store'])->name('admin.galeri.store');
Route::delete('/admin/galeri/{galeri}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');

//semester
Route::get('/admin/semester', [SemesterController::class, 'index'])->name('admin.semester');
Route::get('/admin/semester/create', [SemesterController::class, 'create'])->name('admin.semester.create');
Route::post('/admin/semester', [SemesterController::class, 'store'])->name('admin.semester.store');
Route::get('/admin/semester/{semester}/edit', [SemesterController::class, 'edit'])->name('admin.semester.edit');
Route::put('/admin/semester/{semester}', [SemesterController::class, 'update'])->name('admin.semester.update');
Route::delete('/admin/semester/{semester}', [SemesterController::class, 'destroy'])->name('admin.semester.destroy');

//dosen
Route::get('/admin/dosen', [DosenController::class, 'index'])->name('admin.dosen');
Route::get('/admin/dosen/create', [DosenController::class, 'create'])->name('admin.dosen.create');
Route::post('/admin/dosen', [DosenController::class, 'store'])->name('admin.dosen.store');
Route::get('/admin/dosen/{dosen}/edit', [DosenController::class, 'edit'])->name('admin.dosen.edit');
Route::put('/admin/dosen/{dosen}', [DosenController::class, 'update'])->name('admin.dosen.update');
Route::delete('/admin/dosen/{dosen}', [DosenController::class, 'destroy'])->name('admin.dosen.destroy');

//dosen
Route::get('/admin/event', [EventController::class, 'index'])->name('admin.event');
Route::get('/admin/event/create', [EventController::class, 'create'])->name('admin.event.create');
Route::post('/admin/event', [EventController::class, 'store'])->name('admin.event.store');
Route::get('/admin/event/{event}/edit', [EventController::class, 'edit'])->name('admin.event.edit');
Route::put('/admin/event/{event}', [EventController::class, 'update'])->name('admin.event.update');
Route::delete('/admin/event/{event}', [EventController::class, 'destroy'])->name('admin.event.destroy');
