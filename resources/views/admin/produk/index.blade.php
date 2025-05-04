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

    <!-- Tabel Produk Scrollable -->
    <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
        <table class="table align-middle table-striped table-hover shadow-sm border rounded-4 overflow-hidden">
            <thead class="table-light text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produks as $produk)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $produk->title }}</td>
                        <td class="text-center">
                            <img src="{{ asset('storage/' . $produk->image) }}" alt="Gambar" width="80" class="rounded shadow-sm border">
                        </td>
                        <td class="text-center">{{ Str::limit($produk->description, 50) }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editProdukModal{{ $produk->id }}">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>

                                <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal Edit Produk -->
                    <div class="modal fade" id="editProdukModal{{ $produk->id }}" tabindex="-1" aria-labelledby="editProdukModalLabel{{ $produk->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold" id="editProdukModalLabel{{ $produk->id }}">Edit Produk</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Judul Produk</label>
                                            <input type="text" name="title" class="form-control" value="{{ $produk->title }}" required>
                                            @error('title')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Gambar Produk</label>
                                            <input type="file" name="image" class="form-control" id="image{{ $produk->id }}" onchange="previewImage({{ $produk->id }})">
                                            @error('image')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror

                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $produk->image) }}" id="previewImage{{ $produk->id }}" class="img-fluid" width="120" alt="Preview Gambar">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="form-label">Deskripsi Produk</label>
                                            <textarea name="description" class="form-control" rows="4">{{ $produk->description }}</textarea>
                                            @error('description')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
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
                @endforeach
            </tbody>
        </table>
    </div>
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
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Produk</label>
                        <textarea name="description" class="form-control" rows="4" required></textarea>
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

@push('scripts')
<script>
    function previewImage(id) {
        var file = document.getElementById('image' + id).files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            document.getElementById('previewImage' + id).src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
</script>
@endpush
