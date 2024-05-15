@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Program Studi') }}</h1>

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
            <a href="{{ route('admin.prodi.create') }}" class="btn-sm btn-primary shadow">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Program Studi
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Prodi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @if($prodi && $prodi->count() > 0)
                            @foreach ($prodi as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <a href="{{ route('admin.prodi.edit', $item->id) }}" class="btn btn-warning btn-xs">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('admin.prodi.destroy', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">Tidak ada data program studi.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
