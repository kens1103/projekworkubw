@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h3>Pesan Masuk</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
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
