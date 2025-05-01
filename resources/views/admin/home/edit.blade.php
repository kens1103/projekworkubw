@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Edit Konten Home</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.home.update') }}" method="POST">
        @csrf

        <!-- Konten 1 -->
        <div class="mb-3">
            <label for="icon1" class="form-label">Icon</label>
            <input type="text" class="form-control" id="icon1" name="home[0][icon]" value="{{ $home[0]->icon }}" required>

            <label for="title1" class="form-label mt-3">Judul</label>
            <input type="text" class="form-control" id="title1" name="home[0][title]" value="{{ $home[0]->title }}" required>

            <label for="description1" class="form-label mt-3">Deskripsi</label>
            <textarea class="form-control" id="description1" name="home[0][description]" rows="3" required>{{ $home[0]->description }}</textarea>
        </div>

        <!-- Konten 2 -->
        <div class="mb-3">
            <label for="icon2" class="form-label">Icon</label>
            <input type="text" class="form-control" id="icon2" name="home[1][icon]" value="{{ $home[1]->icon }}" required>

            <label for="title2" class="form-label mt-3">Judul</label>
            <input type="text" class="form-control" id="title2" name="home[1][title]" value="{{ $home[1]->title }}" required>

            <label for="description2" class="form-label mt-3">Deskripsi</label>
            <textarea class="form-control" id="description2" name="home[1][description]" rows="3" required>{{ $home[1]->description }}</textarea>
        </div>

        <!-- Konten 3 -->
        <div class="mb-3">
            <label for="icon3" class="form-label">Icon</label>
            <input type="text" class="form-control" id="icon3" name="home[2][icon]" value="{{ $home[2]->icon }}" required>

            <label for="title3" class="form-label mt-3">Judul</label>
            <input type="text" class="form-control" id="title3" name="home[2][title]" value="{{ $home[2]->title }}" required>

            <label for="description3" class="form-label mt-3">Deskripsi</label>
            <textarea class="form-control" id="description3" name="home[2][description]" rows="3" required>{{ $home[2]->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
