@extends('layouts.dashboard')

@section('content')
  <form action="{{ route('admin.home.update', $home->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-label">Judul</label>
      <input type="text" class="form-control" name="title" value="{{ $home->title }}">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Deskripsi</label>
      <textarea class="form-control" name="description">{{ $home->description }}</textarea>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Gambar</label>
      <input type="file" class="form-control" name="image">
      <img src="{{ asset('storage/' . $home->image) }}" width="150" class="mt-2">
    </div>
    <button class="btn btn-primary">Simpan</button>
  </form>
@endsection
