@extends('layouts.admin.app')

@section('content')
    <h2>Selamat Datang, Admin!</h2>
    <p class="text-muted">Kelola aplikasi Anda dengan mudah dari sini.</p>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total User</h5>
                    <p class="card-text fs-3">120</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Gambar</h5>
                    <p class="card-text fs-3">58</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Komentar</h5>
                    <p class="card-text fs-3">210</p>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-info mt-4">
        <strong>Info!</strong> Pastikan untuk memoderasi semua gambar dan komentar secara rutin yaa.
    </div>
@endsection
