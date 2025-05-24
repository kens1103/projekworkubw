<!-- SIDEBAR -->
<nav class="d-flex flex-column vh-100 sidebar" id="sidebar" style="background: #343a40;">
    <div class="p-3 border-bottom d-flex justify-content-between align-items-center text-white">
        <h4 class="fw-bold mb-0">Panel Admin</h4>
        <button class="btn btn-sm d-md-none text-white" type="button" data-bs-toggle="collapse" data-bs-target="#menuCollapse" aria-controls="menuCollapse" aria-expanded="true" aria-label="Toggle navigation">
            <i class="bi bi-list fs-3"></i>
        </button>
    </div>

    <div class="collapse d-md-block show" id="menuCollapse">
        <ul class="nav nav-pills flex-column mb-auto">
            <li><a href="{{ route('admin.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
            <li><a href="{{ route('admin.home.edit') }}" class="nav-link text-white">Beranda</a></li>
            <li><a href="{{ route('admin.about.edit') }}" class="nav-link text-white">Tentang</a></li>
            
            <!-- DROPDOWN KONTAK -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Produk & Layanan
                </a>
                <ul class="dropdown-menu" style="background-color: grey;">
                    <li><a class="dropdown-item" href="">Edit Promosi</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.produk.index') }}">Galeri</a></li>
                </ul>
            </li>

            <li><a href="{{ route('admin.portofolio.index') }}" class="nav-link text-white">Portofolio</a></li>

            <!-- DROPDOWN KONTAK -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Kontak
                </a>
                <ul class="dropdown-menu" style="background-color: grey;">
                    <li><a class="dropdown-item" href="{{ route('admin.kontak.edit') }}">Edit Konten Kontak</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.kontak.pesan') }}">Lihat Pesan Masuk</a></li>
                </ul>
            </li>

            <!-- LOGOUT -->
            <li class="mt-4 px-3">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link text-danger p-0" style="text-decoration: none;">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>
