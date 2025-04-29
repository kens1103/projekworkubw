@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Daftar Foto</h2>

    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.portofolio.create') }}" class="btn btn-primary mb-3">
                <i class="bi bi-plus-circle"></i> Tambah Foto
            </a>

            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Foto</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($photos as $photo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $photo->nama }}</td>
                                <td>{{ Str::limit($photo->deskripsi, 50) }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$photo->path) }}" alt="{{ $photo->nama }}" width="100">
                                </td>
                                <td>
                                    <a href="{{ route('admin.portofolio.edit', $photo->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.portofolio.destroy', $photo->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
