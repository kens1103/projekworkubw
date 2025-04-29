<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ url('/') }}">WISAGA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link {{ Request::is('tentang') ? 'active' : '' }}" href="{{ url('/tentang') }}">Tentang</a></li>
        <li class="nav-item"><a class="nav-link {{ Request::is('produk') ? 'active' : '' }}" href="{{ url('/produk') }}">Produk & Layanan</a></li>
        <li class="nav-item"><a class="nav-link {{ Request::is('portofolio') ? 'active' : '' }}" href="{{ url('/portofolio') }}">Portofolio</a></li>
        <li class="nav-item"><a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="{{ url('/kontak') }}">Kontak</a></li>
      </ul>
    </div>
  </div>
</nav>
