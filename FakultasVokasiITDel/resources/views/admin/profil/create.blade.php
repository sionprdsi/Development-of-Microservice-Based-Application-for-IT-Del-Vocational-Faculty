@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Tambah Profil Kampus') }}</h1>

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
                    <form method="POST" action="{{ route('admin.profil.store') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf

                        <!-- Tambahkan form untuk membuat profil di sini -->
                        <div class="col-12">
                            <div class="form-group focused">
                                <label class="form-control-label" for="nama">Nama Kampus<span class="small text-danger">*</span></label>
                                <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Kampus" value="{{ $profil->nama }}">
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
