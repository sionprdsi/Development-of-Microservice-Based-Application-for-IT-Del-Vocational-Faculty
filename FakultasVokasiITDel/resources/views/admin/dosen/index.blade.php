@extends('layouts.admin')

@section('main-content')
    <!-- Judul Halaman -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Daftar Dosen') }}</h1>

    <!-- Notifikasi Sukses -->
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Notifikasi Status -->
    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <!-- Tabel Data Dosen -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('admin.dosen.create') }}" class="btn-sm btn-primary shadow">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Dosen
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dosen</th>
                            <th>Program Studi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($dosen as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->prodi->nama }}</td>
                                <td>
                                    <a type="button" class="btn btn-warning"
                                        href="{{ route('admin.dosen.edit', $item->id) }}"><i class="fas fa-edit"></i>
                                    </a>
                                    <a type="button" class="btn btn-danger"
                                        href="{{ route('admin.dosen.destroy', $item->id) }}"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                            class="fas fa-trash"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
