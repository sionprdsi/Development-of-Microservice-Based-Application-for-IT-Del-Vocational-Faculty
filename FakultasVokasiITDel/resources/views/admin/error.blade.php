@extends('layouts.admin')

@section('main-content')
    <div class="alert alert-danger" role="alert">
        <strong>Error:</strong> {{ $message }}
    </div>
@endsection
