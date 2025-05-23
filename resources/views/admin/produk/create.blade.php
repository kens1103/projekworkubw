@extends('layouts.admin.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-bold">Tambah Produk</h2>

    <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Judul Produk --}}
        <div class="mb-3">
            <label for="title" class="form-label">Judul Produk</label>
            <input type="text" class="form-control" id="title" name="title" required>
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Kategori Produk --}}
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori Produk</label>
            <select name="kategori" id="kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="PMN">PMN</option>
                <option value="RPL">PPLG</option>
                <option value="DKV">HTL</option>
                <option value="TKJ">TJKT</option>
            </select>
            @error('kategori')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Gambar Produk --}}
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Produk</label>
            <input type="file" class="form-control" id="image" name="image" required>
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Deskripsi Produk --}}
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi Produk</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
