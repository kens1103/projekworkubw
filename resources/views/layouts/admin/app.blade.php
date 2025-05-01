<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- GLightbox CSS -->
    <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fa;
            overflow-x: hidden;
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
        .content-wrapper {
            flex-grow: 1;
            padding: 30px;
        }
        .card {
            border-radius: 12px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        {{-- Sidebar --}}
        <div class="col-md-2 sidebar">
            <h4 class="text-center mb-4">Admin Panel</h4>
            <a href="#">Dashboard</a>
            <a href="{{ route('admin.home.edit') }}">Home</a>
            <a href="{{ route('admin.about.edit') }}">Tentang</a>
            <a href="#">Produk & Layanan</a>
            <a href="#">Portofolio</a>
            <a href="#">Kontak</a>
            <form action="{{ route('logout') }}" method="POST" class="mt-5">
                @csrf
                <button type="submit" class="btn btn-link text-danger p-0" style="text-decoration: none;">
                    Logout
                </button>
            </form>
        </div>

        {{-- Main Content --}}
        <div class="col-md-10 content-wrapper">
            @yield('content')
        </div>
    </div>

    <!-- JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
