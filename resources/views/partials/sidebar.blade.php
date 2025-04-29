<!-- Sidebar -->
<nav class="d-flex flex-column vh-100" id="sidebar">
    <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
        <h3 class="fw-bold mb-0">Admin</h3>
        <button class="btn btn-sm d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#menuCollapse" aria-controls="menuCollapse" aria-expanded="true" aria-label="Toggle navigation">
            <i class="bi bi-list fs-3"></i>
        </button>
    </div>

    <div class="collapse d-md-block show" id="menuCollapse">
        <ul class="nav nav-pills flex-column mb-auto">

            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : 'text-dark' }}">
                    <i class="bi bi-house-door"></i> Dashboard
                </a>
            </li>

            <!-- Kelola Konten -->
            <li>
                <a class="nav-link text-dark d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#kontenCollapse" role="button" aria-expanded="false" aria-controls="kontenCollapse">
                    <span><i class="bi bi-pencil-square"></i> Kelola Konten</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
                <div class="collapse" id="kontenCollapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal small ps-4">
                        <li><a href="{{ route('admin.content.index') }}" class="nav-link text-dark">Daftar Konten</a></li>
                        <li><a href="{{ route('admin.content.index') }}" class="nav-link text-dark">Tambah Konten</a></li>
                    </ul>
                </div>
            </li>

            <!-- Kelola Portofolio -->
            <li>
                <a class="nav-link text-dark d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#portofolioCollapse" role="button" aria-expanded="false" aria-controls="portofolioCollapse">
                    <span><i class="bi bi-images"></i> Kelola Portofolio</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
                <div class="collapse" id="portofolioCollapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal small ps-4">
                        <li><a href="{{ route('admin.portofolio.index') }}" class="nav-link text-dark">Daftar Foto</a></li>
                        <li><a href="{{ route('admin.portofolio.create') }}" class="nav-link text-dark">Tambah Foto</a></li>
                    </ul>
                </div>
            </li>

            <!-- Logout -->
            <li class="mt-3">
                <a class="nav-link text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
                <form id="logout-form" action="" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

        </ul>
    </div>
</nav>
