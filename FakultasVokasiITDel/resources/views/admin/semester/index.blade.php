@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Semester') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('admin.semester.create') }}" class="btn-sm btn-primary shadow">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Semester
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Prodi</th>
                            <th>Semester</th>
                            <th>Kode</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($semesters as $semester)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $semester->prodi->nama }}</td>
                                <td>{{ $semester->note }}</td>
                                <td>{{ $semester->kode }}</td>
                                <td>{{ $semester->matkul }}</td>
                                <td>{{ $semester->sks }}</td>
                                <td>
                                    <a type="button" class="btn btn-warning"
                                        href="{{ route('admin.semester.edit', $semester->id) }}"><i
                                            class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.semester.destroy', $semester->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
