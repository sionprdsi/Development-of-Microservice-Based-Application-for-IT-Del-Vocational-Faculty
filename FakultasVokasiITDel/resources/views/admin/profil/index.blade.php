@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-black"
        style="font-size: 24px; font-weight: bold; color: #ffff; text-transform: uppercase; margin-bottom: 10px;
    background-color: #4C74DC; padding: 10px 20px; border-radius: 8px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
        {{ __('Halaman Beranda Kampus') }}
    </h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-11">
            <div class="card shadow mb-4" style="border-top: 5px solid #1cc88a;">
                <div class="card-body">
                    <h2 style="font-size: 200%; font-weight: bold; color: #333;">{{ __('Bagian Isi Halaman Beranda Kampus') }}</h2>
                        <form method="POST" action="{{ route('admin.profil.update', $profil->id) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="nama"
                                                style="font-weight: bold; margin-top:3%">Nama Kampus<span
                                                    class="small text-danger">*</span></label>
                                            <input type="text" id="nama" class="form-control" name="nama"
                                                placeholder="Nama Kampus" value="{{ $profil->nama ?? '' }}">
                                            <div id="namaError" class="text-danger" style="font-size: 12px;"></div>
                                        </div>
                                    </div>
                                    <!-- Other form fields go here -->
                                    <div class="col-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="logo"
                                                style="font-weight: bold;">Logo<span
                                                    class="small text-danger">*</span></label>
                                            <input type="file" id="logo" class="form-control" name="logo"
                                                placeholder="Logo">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="video"
                                                style="font-weight: bold;">Video<span
                                                    class="small text-danger">*</span></label>
                                            <input type="file" id="video" class="form-control" name="video"
                                                placeholder="Video">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group focused" style="margin-bottom: 20px;">
                                            <label class="form-control-label" for="peta" style="font-weight: bold;">Link
                                                Embeded Google Maps<span class="small text-danger">*</span></label>
                                            <textarea id="peta" class="form-control" name="peta" placeholder="Link Embeded Google Maps"
                                                style="width: 100%; padding: 20px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px; height: 200px;">{{ $profil->peta ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group focused" style="margin-bottom: 20px;">
                                            <label class="form-control-label" for="kenapa_vokasi"
                                                style="font-weight: bold;">Kenapa Memilih Vokasi?<span
                                                    class="small text-danger">*</span></label>
                                            <textarea id="kenapa_vokasi" class="form-control" name="kenapa_vokasi" placeholder="Kenapa Memilih Vokasi"
                                                style="width: 100%; padding: 20px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px; height: 250px;">{{ $profil->kenapa_vokasi ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <h2 style="font-size: 200%; font-weight: bold; color: #333;">{{ __('Bagian Footer dan Header Halaman Beranda Kampus') }}</h2>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="alamat"
                                                style="font-weight: bold; margin-top:3%">Alamat<span
                                                    class="small text-danger">*</span></label>
                                            <textarea id="alamat" class="form-control" name="alamat" placeholder="Alamat Kampus"
                                                style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px; height: 150px;">{{ $profil->alamat ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="kode_pos" style="font-weight: bold;">Kode
                                                Pos<span class="small text-danger">*</span></label>
                                            <input type="text" id="kode_pos" class="form-control" name="kode_pos"
                                                placeholder="Kode Pos" value="{{ $profil->kode_pos ?? '' }}"
                                                style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
                                            <div id="kodePosError" class="text-danger" style="font-size: 12px;"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="telepon"
                                                style="font-weight: bold;">Telepon<span
                                                    class="small text-danger">*</span></label>
                                            <input type="text" id="telepon" class="form-control" name="telepon"
                                                placeholder="Telepon" value="{{ $profil->telepon ?? '' }}"
                                                style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
                                            <div id="teleponError" class="text-danger" style="font-size: 12px;"></div>
                                        </div>
                                    </div>
                                    <!-- Repeat the pattern for other form fields -->
                                    <div class="col-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="email"
                                                style="font-weight: bold;">Email<span
                                                    class="small text-danger">*</span></label>
                                            <input type="text" id="email" class="form-control" name="email"
                                                placeholder="Email" value="{{ $profil->email ?? '' }}"
                                                style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
                                            <div id="emailError" class="text-danger" style="font-size: 12px;"></div>
                                        </div>
                                    </div>
                                    <!-- Repeat the pattern for other form fields -->
                                    <div class="col-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="karir" style="font-weight: bold;">Email
                                                Karir<span class="small text-danger">*</span></label>
                                            <input type="email" id="karir" class="form-control" name="karir"
                                                placeholder="Email Karir" value="{{ $profil->karir ?? '' }}"
                                                style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="facebook"
                                                style="font-weight: bold;">Facebook<span
                                                    class="small text-danger">*</span></label>
                                            <input type="text" id="facebook" class="form-control" name="facebook"
                                                placeholder="Facebook" value="{{ $profil->facebook ?? '' }}"
                                                style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="twitter"
                                                style="font-weight: bold;">Twitter<span
                                                    class="small text-danger">*</span></label>
                                            <input type="text" id="twitter" class="form-control" name="twitter"
                                                placeholder="Twitter" value="{{ $profil->twitter ?? '' }}"
                                                style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="youtube"
                                                style="font-weight: bold;">Youtube<span
                                                    class="small text-danger">*</span></label>
                                            <input type="text" id="youtube" class="form-control" name="youtube"
                                                placeholder="Youtube" value="{{ $profil->youtube ?? '' }}"
                                                style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="instagram"
                                                style="font-weight: bold;">Instagram<span
                                                    class="small text-danger">*</span></label>
                                            <input type="text" id="instagram" class="form-control" name="instagram"
                                                placeholder="Instagram" value="{{ $profil->instagram ?? '' }}"
                                                style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>



        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("submitBtn").addEventListener("click", function() {
                    var kodePos = document.getElementById("kode_pos").value;
                    var telepon = document.getElementById("telepon").value;
                    var email = document.getElementById("email").value;

                    // Validasi Kode Pos (hanya angka)
                    if (!/^\d+$/.test(kodePos)) {
                        document.getElementById("kodePosError").innerText = "Kode Pos harus berupa angka.";
                        return;
                    } else {
                        document.getElementById("kodePosError").innerText = "";
                    }

                    // Validasi Telepon (hanya angka)
                    if (!/^\d+$/.test(telepon)) {
                        document.getElementById("teleponError").innerText = "Telepon harus berupa angka.";
                        return;
                    } else {
                        document.getElementById("teleponError").innerText = "";
                    }

                    // Validasi Email
                    if (!isValidEmail(email)) {
                        document.getElementById("emailError").innerText =
                            "Email harus memiliki format yang valid.";
                        return;
                    } else {
                        document.getElementById("emailError").innerText = "";
                    }

                    // Submit form jika validasi berhasil
                    document.getElementById("profilForm").submit();
                });

                // Fungsi untuk memeriksa format email yang valid
                function isValidEmail(email) {
                    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
                }

                // Validasi Kode Pos saat pengguna mengetik
                document.getElementById("kode_pos").addEventListener("input", function() {
                    var kodePos = this.value;
                    if (!/^\d+$/.test(kodePos)) {
                        document.getElementById("kodePosError").innerText = "Kode Pos harus berupa angka.";
                    } else {
                        document.getElementById("kodePosError").innerText = "";
                    }
                });

                // Validasi Telepon saat pengguna mengetik
                document.getElementById("telepon").addEventListener("input", function() {
                    var telepon = this.value;
                    if (!/^\d+$/.test(telepon)) {
                        document.getElementById("teleponError").innerText = "Telepon harus berupa angka.";
                    } else {
                        document.getElementById("teleponError").innerText = "";
                    }
                });

                // Validasi Email saat pengguna mengetik
                document.getElementById("email").addEventListener("input", function() {
                    var email = this.value;
                    if (!isValidEmail(email)) {
                        document.getElementById("emailError").innerText =
                            "Email harus memiliki format yang valid.";
                    } else {
                        document.getElementById("emailError").innerText = "";
                    }
                });
            });

            // Kampus
            // Mendapatkan elemen form dan menambahkan event listener
            document.querySelector('form').addEventListener('submit', function(event) {
                // Mendapatkan nilai input nama kampus
                var namaKampus = document.getElementById('nama').value.trim();

                // Jika nama kampus kosong, tampilkan pesan kesalahan dan hentikan pengiriman formulir
                if (namaKampus === '') {
                    document.getElementById('namaError').innerText = 'Nama Kampus wajib diisi.';
                    event.preventDefault(); // Menghentikan pengiriman formulir
                }
            });
        </script>

    @endsection
