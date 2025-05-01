@extends('layouts.admin.app')

@section('content')
    <h1>Edit Konten Home</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.home.update') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Bagian 1 -->
        <div class="card mb-4">
            <h4>Inovatif</h4>
            <div class="form-group mb-3">
                <label>Icon</label>
                <input type="text" name="homes[0][icon]" class="form-control" value="{{ $homes[0]->icon }}">
            </div>

            <div class="form-group mb-3">
                <label>Judul</label>
                <input type="text" name="homes[0][title]" class="form-control" value="{{ $homes[0]->title }}">
            </div>

            <div class="form-group mb-3">
                <label>Deskripsi</label>
                <textarea name="homes[0][description]" class="form-control">{{ $homes[0]->description }}</textarea>
            </div>
        </div>

        <!-- Bagian 2 -->
        <div class="card mb-4">
            <h4>Kolaboratif</h4>
            <div class="form-group mb-3">
                <label>Icon</label>
                <input type="text" name="homes[1][icon]" class="form-control" value="{{ $homes[1]->icon }}">
            </div>

            <div class="form-group mb-3">
                <label>Judul</label>
                <input type="text" name="homes[1][title]" class="form-control" value="{{ $homes[1]->title }}">
            </div>

            <div class="form-group mb-3">
                <label>Deskripsi</label>
                <textarea name="homes[1][description]" class="form-control">{{ $homes[1]->description }}</textarea>
            </div>
        </div>

        <!-- Bagian 3 -->
        <div class="card mb-4">
            <h4>Global Mindset</h4>
            <div class="form-group mb-3">
                <label>Icon</label>
                <input type="text" name="homes[2][icon]" class="form-control" value="{{ $homes[2]->icon }}">
            </div>

            <div class="form-group mb-3">
                <label>Judul</label>
                <input type="text" name="homes[2][title]" class="form-control" value="{{ $homes[2]->title }}">
            </div>

            <div class="form-group mb-3">
                <label>Deskripsi</label>
                <textarea name="homes[2][description]" class="form-control">{{ $homes[2]->description }}</textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
        <a href="{{ url('/') }}" class="btn btn-secondary"><i class="fas fa-eye"></i> Lihat Website</a>
    </form>
@endsection
