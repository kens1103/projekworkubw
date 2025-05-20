@extends('layouts.admin.app')

@push('styles')
<style>
    /* Styling seperti di index jika perlu */
</style>
@endpush

@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-bold">Edit Portofolio</h2>

    <form action="{{ route('admin.portofolio.update', $portofolio->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title', $portofolio->title) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" rows="3" class="form-control" required>{{ old('description', $portofolio->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Utama Saat Ini</label><br>
            <img src="{{ asset($portofolio->image) }}" alt="Foto Utama" style="width: 150px; border-radius: 8px;">
        </div>

        <div class="mb-3">
            <label class="form-label">Ganti Foto Utama (opsional)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label class="form-label">File PDF Saat Ini</label><br>
            @if($portofolio->pdf_path)
                <a href="{{ asset($portofolio->pdf_path) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                    Lihat PDF
                </a>
            @else
                <span class="text-muted">Tidak ada PDF</span>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Ganti / Upload PDF Baru (opsional)</label>
            <input type="file" name="pdf_path" class="form-control" accept="application/pdf">
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Produk Tambahan Saat Ini</label><br>
            @foreach ($portofolio->additionalImages as $img)
                <img src="{{ asset($img->image) }}" alt="Tambahan" width="60" height="60" class="border rounded me-1 mb-1">
            @endforeach
        </div>

        <div class="mb-3">
            <label class="form-label">Tambah Foto Produk Tambahan Baru</label>
            <input type="file" name="images[]" class="form-control" multiple accept="image/*">
        </div>

        <div class="mb-3">
            <a href="{{ route('admin.portofolio.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Perbarui</button>
        </div>
    </form>
</div>
@endsection
