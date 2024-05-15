@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Profil Kampus') }}</h1>

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

        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-body">

                    <form method="POST" action="{{ route('admin.profil.update', $profil->id) }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nama">Nama Kampus<span class="small text-danger">*</span></label>
                                        <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Kampus" value="{{ $profil->nama }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="alamat">Alamat<span class="small text-danger">*</span></label>
                                        <textarea id="alamat" class="form-control" name="alamat" placeholder="Alamat Kampus">{{ $profil->alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="kode_pos">Kode Pos<span class="small text-danger">*</span></label>
                                        <input type="text" id="kode_pos" class="form-control" name="kode_pos" placeholder="Kode Pos" value="{{ $profil->kode_pos }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="telepon">Telepon<span class="small text-danger">*</span></label>
                                        <input type="number" id="telepon" class="form-control" name="telepon" placeholder="Telepon" value="{{ $profil->telepon }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="email">Email<span class="small text-danger">*</span></label>
                                        <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="{{ $profil->email }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="karir">Email Karir<span class="small text-danger">*</span></label>
                                        <input type="email" id="karir" class="form-control" name="karir" placeholder="Email Karir" value="{{ $profil->karir }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="logo">Logo<span class="small text-danger">*</span></label>
                                        <input type="file" id="logo" class="form-control" name="logo" placeholder="Logo">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="video">Video<span class="small text-danger">*</span></label>
                                        <input type="file" id="video" class="form-control" name="video" placeholder="Video">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="peta">Link Embeded Google Maps<span class="small text-danger">*</span></label>
                                        <textarea id="peta" class="form-control" name="peta" placeholder="Link Embeded Google Maps">{{ $profil->peta }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="kenapa_vokasi">Kenapa Memilih Vokasi?<span class="small text-danger">*</span></label>
                                        <textarea id="kenapa_vokasi" class="form-control" name="kenapa_vokasi" placeholder="Kenapa Memilih Vokasi">{{ $profil->kenapa_vokasi }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="facebook">Facebook<span class="small text-danger">*</span></label>
                                        <input type="text" id="facebook" class="form-control" name="facebook" placeholder="Facebook" value="{{ $profil->facebook }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class "form-group focused">
                                        <label class="form-control-label" for="twitter">Twitter<span class="small text-danger">*</span></label>
                                        <input type="text" id="twitter" class="form-control" name="twitter" placeholder="Twitter" value="{{ $profil->twitter }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="youtube">Youtube<span class="small text-danger">*</span></label>
                                        <input type="text" id="youtube" class="form-control" name="youtube" placeholder="Youtube" value="{{ $profil->youtube }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="instagram">Instagram<span class="small text-danger">*</span></label>
                                        <input type="text" id="instagram" class="form-control" name="instagram" placeholder="Instagram" value="{{ $profil->instagram }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
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

    </div>
@endsection
