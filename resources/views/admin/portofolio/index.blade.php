@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h2>Daftar Portofolio</h2>

    <!-- Tombol untuk memicu modal -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Foto</button>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($portofolios as $item)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset($item->image) }}" class="card-img-top" alt="Portofolio">
                    <div class="card-body text-center">
                        <p class="mb-1 text-muted">{{ $item->category ?? 'Karya' }}</p>
                        <form action="{{ route('admin.portofolio.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Modal Tambah Foto -->
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
              <div class="mb-3">
                  <label for="category" class="form-label">Kategori</label>
                  <input class="form-control" type="text" name="category" id="category" placeholder="Contoh: Web, Desain, App, dll">
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
