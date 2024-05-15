@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Semester</h1>
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
                <form action="{{ route('admin.semester.update', $semester->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="prodi_id">Program Studi</label>
                        <select name="prodi_id" id="prodi_id" class="form-control" required>
                            @foreach ($prodis as $p)
                                <option value="{{ $p->id }}" {{ $semester->prodi_id == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="note">Semester</label>
                        <select name="note" id="note" class="form-control" required>
                            @for ($i = 1; $i <= 8; $i++)
                                <option value="Semester {{ $i }}"
                                    {{ $semester->note == "Semester $i" ? 'selected' : '' }}>Semester {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" class="form-control" id="kode" name="kode"
                            value="{{ $semester->kode }}" required>
                    </div>
                    <div class="form-group">
                        <label for="matkul">Mata Kuliah</label>
                        <input type="text" class="form-control" id="matkul" name="matkul"
                            value="{{ $semester->matkul }}" required>
                    </div>
                    <div class="form-group">
                        <label for="sks">SKS</label>
                        <input type="number" class="form-control" id="sks" name="sks"
                            value="{{ $semester->sks }}" required>
                    </div>
                    <div class="form-group">
                        <label for="teori">Teori</label>
                        <input type="number" class="form-control" id="teori" name="teori"
                            value="{{ $semester->teori }}" required>
                    </div>
                    <div class="form-group">
                        <label for="praktikum">Praktikum</label>
                        <input type="number" class="form-control" id="praktikum" name="praktikum"
                            value="{{ $semester->praktikum }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Perbarui
                    </button>
                </form>
            </div>
        </div>

    </div>

@endsection
