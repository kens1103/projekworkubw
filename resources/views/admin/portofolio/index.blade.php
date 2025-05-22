@extends('layouts.admin.app')

@push('styles')
<style>
    table img {
        object-fit: cover;
        height: 40px;
        width: 50px;
        border-radius: 6px;
    }

    .table td, .table th {
        vertical-align: middle;
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
            <thead class="text-center">
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
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ Str::limit($item->description, 60) }}</td>
                    <td class="text-center">
                        <img src="{{ asset($item->image) }}" alt="Utama">
                    </td>
                    <td class="text-center">
                        @if($item->additionalImages->count())
                            @foreach ($item->additionalImages as $img)
                                <img src="{{ asset($img->image) }}" alt="Tambahan" class="border rounded me-1 mb-1">
                            @endforeach
                        @else
                            <span class="badge bg-secondary">Kosong</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($item->pdf_path)
                            <a href="{{ asset($item->pdf_path) }}" target="_blank" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-file-earmark-pdf-fill"></i> PDF
                            </a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td class="text-center">
                        {{-- Tombol aksi (jika mau edit/hapus nanti) --}}
                        <span class="text-muted">-</span>
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
                            <label class="form-label">File PDF (Katalog Produk)</label>
                            <input type="file" name="pdf_path" class="form-control" accept="application/pdf">
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
