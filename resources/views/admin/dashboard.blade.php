@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Dashboard Admin</h2>

    <!-- Konten Inovatif, Kolaboratif, Global Mindset -->
    <div class="row mb-5">
        @foreach ($contents as $content)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>{{ $content->title }}</h5>
                        <p>{{ $content->description }}</p>

                        <!-- Edit Konten -->
                        <form action="{{ route('admin.updateContent', $content->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="title" value="{{ $content->title }}" class="form-control mb-2">
                            <textarea name="description" class="form-control">{{ $content->description }}</textarea>
                            <button type="submit" class="btn btn-warning mt-2">Update</button>
                        </form>

                        <!-- Hapus Konten -->
                        <form action="{{ route('admin.deleteContent', $content->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Tambah Konten Baru -->
        <div class="col-md-4">
            <form action="{{ route('admin.addContent') }}" method="POST">
                @csrf
                <input type="text" name="title" class="form-control mb-2" placeholder="Judul">
                <textarea name="description" class="form-control" placeholder="Deskripsi"></textarea>
                <button type="submit" class="btn btn-success mt-2">Tambah Konten</button>
            </form>
        </div>
    </div>

    <!-- Foto Portofolio -->
    <div class="row">
        @foreach ($portofolios as $portofolio)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ Storage::url($portofolio->image) }}" class="card-img-top" alt="Portofolio Image">
                    <div class="card-body">
                        <!-- Hapus Foto -->
                        <form action="{{ route('admin.deletePortofolio', $portofolio->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus Foto</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Tambah Foto Baru -->
        <div class="col-md-4">
            <form action="{{ route('admin.addPortofolio') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" class="form-control mb-2">
                <button type="submit" class="btn btn-success mt-2">Tambah Foto</button>
            </form>
        </div>
    </div>
</div>
@endsection
