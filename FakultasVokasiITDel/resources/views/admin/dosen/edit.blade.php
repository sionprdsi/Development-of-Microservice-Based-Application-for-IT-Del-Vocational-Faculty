@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Dosen</h1>
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
                <form action="{{ route('admin.dosen.update', $dosen->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Dosen</label>
                        <input type="text" name="nama" id="nama" value="{{ $dosen->nama }}" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="prodi_id">Program Studi</label>
                        <select name="prodi_id" id="prodi_id" class="form-control" required>
                            @foreach ($prodi as $p)
                                <option value="{{ $p->id }}" {{ $dosen->prodi_id == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Perbarui
                    </button>
                </form>
            </div>
        </div>

    </div>

@endsection
