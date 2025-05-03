@extends('layouts.admin.app')
@push('styles')
<style>
    table img {
        object-fit: cover;
        height: 60px;
        width: 80px;
    }
    .table td, .table th {
        vertical-align: middle;
    }
</style>
@endpush
@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-bold">Manajemen Produk & Layanan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol Tambah Produk -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahProdukModal">
        Tambah Produk
    </button>

    <!-- Tabel Produk -->
    <table class="table align-middle table-striped table-hover shadow-sm border rounded-4 overflow-hidden">
    <thead class="table-light text-center">
        <tr>
            <th scope="col">Judul</th>
            <th scope="col">Gambar</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produks as $produk)
            <tr>
                <td class="text-nowrap">{{ $produk->title }}</td>
                <td class="text-center">
                    <img src="{{ asset('storage/' . $produk->image) }}" alt="Gambar" width="80" class="rounded shadow-sm border">
                </td>
                <td class="text-center">
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('admin.produk.edit', $produk->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>

<!-- Modal Tambah Produk -->
<div class="modal fade" id="tambahProdukModal" tabindex="-1" aria-labelledby="tambahProdukModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="tambahProdukModalLabel">Tambah Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="title" class="form-label">Judul Produk</label>
            <input type="text" name="title" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Gambar Produk</label>
            <input type="file" name="image" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
