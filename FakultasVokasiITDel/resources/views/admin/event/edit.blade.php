@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Event</h1>
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
                <form action="{{ route('admin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Event</label>
                        <input type="text" name="nama" id="nama" value="{{ $event->nama }}"
                            placeholder="Masukkan nama event" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="detail">Detail Event</label>
                        <textarea name="detail" id="detail" rows="5" placeholder="Masukkan detail event" class="form-control"
                            required>{{ $event->detail }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal Event</label>
                        <input type="date" name="tanggal" id="tanggal" value="{{ $event->tanggal }}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" value="{{ $event->keterangan }}"
                            placeholder="Masukkan keterangan tambahan" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Perbarui
                    </button>
                </form>
            </div>
        </div>

    </div>

@endsection
