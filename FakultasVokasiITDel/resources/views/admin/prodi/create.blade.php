@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Program Studi</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('admin.prodi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Program Studi</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan nama program studi"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" placeholder="Masukkan judul program studi"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="subjudul">Subjudul</label>
                        <input type="text" name="subjudul" id="subjudul" placeholder="Masukkan subjudul program studi"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" id="foto" accept="image/*" placeholder="Upload foto"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="sejarah">Sejarah</label>
                        <textarea name="sejarah" id="sejarah" rows="5" placeholder="Masukkan sejarah program studi"
                            class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="visi">Visi</label>
                        <textarea name="visi" id="visi" rows="3" placeholder="Masukkan visi program studi" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="misi">Misi</label>
                        <textarea name="misi" id="misi" rows="3" placeholder="Masukkan misi program studi" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="lulusan">Lulusan</label>
                        <textarea name="lulusan" id="lulusan" rows="3" placeholder="Masukkan informasi tentang lulusan program studi"
                            class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kurikulum">Kurikulum</label>
                        <textarea name="kurikulum" id="kurikulum" rows="3"
                            placeholder="Masukkan informasi tentang kurikulum program studi" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="teks_dosen">Teks Dosen</label>
                        <textarea name="teks_dosen" id="teks_dosen" rows="3" placeholder="Masukkan informasi tentang dosen program studi"
                            class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>
                </form>
            </div>
        </div>

    </div>

@endsection
