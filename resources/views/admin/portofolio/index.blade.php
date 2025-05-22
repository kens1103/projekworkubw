@extends('layouts.admin.app')

@push('styles')
<style>
    table img {
        object-fit: cover;
        height: 5px;   /* ukuran lebih kecil */
        width: auto;    /* lebar menyesuaikan proporsi */
        border-radius: 6px;
        border: 1px solid #ddd;
    }

    .table td,
    .table th {
        vertical-align: middle;
        text-align: center;
    }

    .modal-lg {
        max-width: 900px;
    }

    .form-label {
        font-weight: 500;
    }

    .table thead th {
        background-color: #f8f9fa;
        font-weight: 600;
    }

    .table td .btn {
        margin: 0 2px;
    }

    .img-container {
        display: flex;
        flex-wrap: wrap;
        gap: 4px;
        justify-content: center;
    }

    .img-container img {
        width: 35px;    /* sesuaikan ukuran gambar tambahan */
        height: 35px;
        object-fit: cover;
        border-radius: 4px;
        border: 1px solid #ccc;
    }
</style>
@endpush

@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-bold text-primary">📁 Manajemen Portofolio</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <button class="btn btn-success mb-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#createModal">
        <i class="bi bi-plus-circle me-1"></i> Tambah Portofolio
    </button>

    <div class="table-responsive shadow-sm rounded-4 border" style="max-height: 600px; overflow-y: auto;">
        <table class="table table-hover table-striped align-middle mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Foto Utama</th>
                    <th>Tambahan</th>
                    <th>PDF</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($portofolios as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td class="text-start">{{ $item->title }}</td>
                    <td class="text-start">{{ Str::limit($item->description, 60) }}</td>
                    <td>
                        <img src="{{ asset($item->image) }}" alt="Utama">
                    </td>
                    <td>
                        @if($item->additionalImages->count())
                            <div class="img-container">
                                @foreach ($item->additionalImages as $img)
                                    <img src="{{ asset($img->image) }}" alt="Tambahan">
                                @endforeach
                            </div>
                        @else
                            <span class="badge bg-secondary">Kosong</span>
                        @endif
                    </td>
                    <td>
                        @if ($item->pdf_path)
                            <a href="{{ asset($item->pdf_path) }}" target="_blank" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-file-earmark-pdf-fill"></i> Lihat
                            </a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.portofolio.edit', $item->id) }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <form action="{{ route('admin.portofolio.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Belum ada portofolio.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin.portofolio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content border-0 shadow rounded-4">
                    <div class="modal-header bg-light border-bottom-0">
                        <h5 class="modal-title fw-semibold">Tambah Portofolio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="title" class="form-control" placeholder="Masukkan judul portofolio..." required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="description" rows="3" class="form-control" placeholder="Deskripsi singkat portofolio..." required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto Utama</label>
                            <input type="file" name="image" class="form-control" accept="image/*" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto Tambahan</label>
                            <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                        </div>
                    </div>

                    <div class="modal-footer bg-light border-top-0">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
