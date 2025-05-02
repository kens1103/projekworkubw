@extends('layouts.admin.app')
<style>
    .fade {
        opacity: 0;
        transition: opacity 0.5s ease-out;
    }
</style>
@section('content')
<div class="container py-4">
    <h3>Pesan Masuk</h3>

    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    @if($pesans->count() > 0)
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Dikirim Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesans as $pesan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pesan->name }}</td>
                    <td>{{ $pesan->email }}</td>
                    <td>{{ $pesan->message }}</td>
                    <td>{{ $pesan->created_at->format('d M Y, H:i') }}</td>
                    <td>
                        <form action="{{ route('pesan.destroy', $pesan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <div class="alert alert-info mt-4">Belum ada pesan yang masuk.</div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    // Hilangkan alert setelah 3 detik
    setTimeout(function () {
        const alert = document.getElementById('success-alert');
        if (alert) {
            alert.classList.add('fade');
            setTimeout(() => alert.remove(), 500); // Tunggu transisi
        }
    }, 3000);
</script>
@endpush

