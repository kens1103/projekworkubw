@extends('layouts.admin.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Edit Konten Home</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @foreach($home as $index => $item)
        <div class="accordion mb-3" id="accordionHome">
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $item->id }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $item->id }}" aria-expanded="false" aria-controls="collapse{{ $item->id }}">
                        Konten {{ $index + 1 }}
                    </button>
                </h2>
                <div id="collapse{{ $item->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $item->id }}" data-bs-parent="#accordionHome">
                    <div class="accordion-body">
                        <form action="{{ route('admin.home.update.single', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <label class="form-label">Judul</label>
                            <input type="text" name="title" class="form-control" value="{{ $item->title }}" required>

                            <label class="form-label mt-3">Deskripsi</label>
                            <textarea name="description" class="form-control" rows="3" required>{{ $item->description }}</textarea>

                            <label class="form-label mt-3">Foto</label>
                            @if($item->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Foto Konten" width="120" class="img-thumbnail">
                                </div>
                            @endif
                            <input type="file" name="image" class="form-control">
                            <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
