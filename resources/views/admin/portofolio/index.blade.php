@extends('layouts.admin.app')

@push('styles')

<style>
    table img {
        object-fit: cover;
        height: 60px;
        width: 80px;
        border-radius: 8px;
    }
    .table td, .table th {
        vertical-align: middle;
    }
</style>

@endpush

@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-bold">Manajemen Portofolio</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- TOMBOL TAMBAH FOTO -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
        Tambah Foto
    </button>

    <!-- TABEL SCROLL -->
    <div class="table-responsive shadow-sm rounded-4 border" style="max-height: 500px; overflow-y: auto;">
        <table class="table align-middle table-striped table-hover mb-0">
            <thead class="table-light text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($portofolios as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">
                            <img src="{{ asset($item->image) }}" alt="Portofolio" class="rounded shadow-sm border" width="80">
                        </td>
                        <td class="text-center">
                            <form action="{{ route('admin.portofolio.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- MODAL TAMBAH FOTO -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.portofolio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Tambah Foto Portofolio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="image" class="form-label">Foto</label>
                            <input class="form-control" type="file" name="image" id="image" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
