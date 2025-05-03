@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-bold">Edit Produk</h2>

    <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul Produk</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $produk->title }}" required>
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar Produk Saat Ini</label><br>
            <img src="{{ asset('storage/' . $produk->image) }}" width="200" class="mb-2">
            <input type="file" class="form-control" id="image" name="image">
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
