<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f7fa;
        }
        .sidebar {
            height: 100vh;
            background: #343a40;
            color: white;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            padding: 30px;
        }
        .card {
            border-radius: 12px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <h4 class="text-center mb-4">Admin Panel</h4>
            <a href="#">Dashboard</a>
            <a href="{{ route('admin.home.edit') }}">Home</a>
            <a href="#">Tentang</a>
            <a href="#">Produk & layanan</a>
            <a href="#">Portofolio</a>
            <a href="#">Kontak</a>
            <form action="{{ route('logout') }}" method="POST" class="mt-5">
    @csrf
    <button type="submit" class="btn btn-link text-danger p-0" style="text-decoration: none;">
        Logout
    </button>
</form>

        </div>

        <!-- Content -->
        <div class="col-md-10 content">
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
        </div>
    </div>
</div>
</body>
</html>
