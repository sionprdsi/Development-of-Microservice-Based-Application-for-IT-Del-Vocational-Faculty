@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Berita</h1>
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
                <form action="{{ route('admin.prestasi.update', $prestasi->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" value="{{ $prestasi->judul }}"
                            placeholder="Masukkan judul prestasi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" id="foto" accept="image/*" placeholder="Upload foto"
                            class="form-control">
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
                    </div>
                    <div class="form-group">
                        <label for="konten">Konten</label>
                        <textarea name="konten" id="konten" rows="5" placeholder="Masukkan detail prestasi" class="form-control"
                            required>{{ $prestasi->konten }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" name="link" id="link" value="{{ $prestasi->link }}"
                            placeholder="Masukkan link terkait prestasi" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Perbarui
                    </button>
                </form>
            </div>
        </div>

    </div>

@endsection
