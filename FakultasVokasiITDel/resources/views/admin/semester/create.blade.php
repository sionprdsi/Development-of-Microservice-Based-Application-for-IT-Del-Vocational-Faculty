@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Semester</h1>
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
                <form action="{{ route('admin.semester.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="prodi_id">Program Studi</label>
                        <select name="prodi_id" id="prodi_id" class="form-control" required>
                            @foreach ($prodis as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="note">Semester</label>
                        <select name="note" id="note" class="form-control" required>
                            @for ($i = 1; $i <= 8; $i++)
                                <option value="Semester {{ $i }}">Semester {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" class="form-control" id="kode" name="kode" required>
                    </div>
                    <div class="form-group">
                        <label for="matkul">Mata Kuliah</label>
                        <input type="text" class="form-control" id="matkul" name="matkul" required>
                    </div>
                    <div class="form-group">
                        <label for="sks">SKS</label>
                        <input type="number" class="form-control" id="sks" name="sks" required>
                    </div>
                    <div class="form-group">
                        <label for="teori">Teori</label>
                        <input type="number" class="form-control" id="teori" name="teori" required>
                    </div>
                    <div class="form-group">
                        <label for="praktikum">Praktikum</label>
                        <input type="number" class="form-control" id="praktikum" name="praktikum" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>
                </form>
            </div>
        </div>

    </div>

@endsection
