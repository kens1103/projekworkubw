<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ url('/') }}">
    <img src="{{ asset('img/logo.jpg') }}" alt="Logo Wisaga" height="40" class="me-2">
    WISAGA
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a></li>
        <li class="nav-item"><a class="nav-link {{ Request::is('tentang') ? 'active' : '' }}" href="{{ url('/tentang') }}">Tentang</a></li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('produk') ? 'active' : '' }}" href="{{ url('/produk') }}">Produk & Layanan</a>
        </li>
        <li class="nav-item"><a class="nav-link {{ Request::is('portofolio') ? 'active' : '' }}" href="{{ url('/portofolio') }}">Portofolio</a></li>
        <li class="nav-item"><a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="{{ url('/kontak') }}">Kontak</a></li>
      </ul>
    </div>
  </div>
</nav>
