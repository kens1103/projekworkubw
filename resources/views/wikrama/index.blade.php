@extends('layouts.app')

<style>
  .portfolio-wrap {
    overflow: hidden;
    border-radius: 1rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    position: relative;
    transition: transform 0.5s ease, filter 0.5s ease;
  }
  .portfolio-wrap img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    transition: transform 0.5s ease, filter 0.5s ease;
    border-radius: 1rem;
  }
  .portfolio-wrap:hover img {
    transform: scale(1.05);
    filter: brightness(85%);
  }
  .portfolio-info {
    position: absolute;
    bottom: 0;
    background: rgba(0,0,0,0.6);
    width: 100%;
    padding: 15px;
    border-bottom-left-radius: 1rem;
    border-bottom-right-radius: 1rem;
    opacity: 0;
    transition: all 0.3s ease;
  }
  .portfolio-wrap:hover .portfolio-info {
    opacity: 1;
  }
  .portfolio-info h4, .portfolio-info p {
    color: #fff;
    margin: 0;
  }
  .portfolio-info a {
    text-decoration: none;
  }
  .glightbox {
    color: #212529;
    transition: color 0.3s ease;
  }
  .glightbox h4 {
    font-size: 18px;
    margin-bottom: 4px;
    color: #212529;
  }
  .glightbox p {
    font-size: 14px;
    color: #212529;
  }
</style>

@section('content')

<!-- HERO SECTION -->
<section class="hero" id="hero" style="padding-top: 100px;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
        <h1 class="display-4 fw-bold">UBW TeFa Wisaga</h1>
        <p class="lead">Wadah kolaborasi, karya nyata siswa berbasis Teaching Factory.</p>
        <a href="{{ url('/tentang') }}" class="btn btn-outline-success rounded-pill btn-lg me-3">Tentang Kami</a>
      </div>
      <div class="col-md-6 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="300">
        <img src="/img/index.png" alt="Hero Image" class="floating-image img-fluid">
      </div>
    </div>
  </div>
</section>

<!-- TENTANG SECTION -->
<section id="tentang" class="py-5">
  <a href="{{ url('/tentang') }}" style="text-decoration: none; color: inherit;">
    <div class="row align-items-center mb-5">
      <div class="col-lg-6 text-center" data-aos="fade-right">
        <img src="/img/produklayanan.jpg" alt="Tentang Kami" class="img-fluid rounded-4">
      </div>
      <div class="col-lg-6" data-aos="fade-left">
        <h2 class="fw-bold mb-4">Tentang Kami</h2>
        <p class="lead text-muted">
          Wikrama 1 Garut bertujuan memberdayakan masyarakat melalui inovasi dan kolaborasi usaha lokal. 
          Kami menyediakan berbagai layanan digital untuk membantu Anda berkembang secara online, 
          dari pengembangan website hingga pemasaran digital.
        </p>
      </div>
    </div>
  </a>
</section>

<!-- KONTEN JURUSAN -->
<section class="py-5" id="konten-home">
  <div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4">
      @foreach($homes as $home)
        <div class="col" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 + 100 }}">
          <div class="p-4 border rounded-4 shadow-sm h-100 text-center">
            @if($home->image)
              <img src="{{ asset('storage/' . $home->image) }}" class="mb-3 img-fluid rounded" style="height: 100px; object-fit: cover;">
            @endif
            <h5 class="fw-bold">{{ $home->title }}</h5>
            <p class="text-muted">{{ $home->description }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- PRODUK & LAYANAN SECTION -->
<section class="py-5">
  <div class="container" data-aos="fade-up">
    <h2 class="section-title text-center mb-5 fw-bold">Produk & Layanan Unggulan</h2>

    <div class="row g-4">
      @foreach($produks->take(4) as $produk)
        <div class="col-lg-4 col-md-6">
          <div class="card h-100 shadow rounded-4 text-center">
            <div class="overflow-hidden rounded-top-4" style="height: 200px;">
              <img src="{{ asset('storage/' . $produk->image) }}" class="w-100 h-100 object-fit-cover img-hover-zoom-dark" alt="{{ $produk->title }}">
            </div>
            <div class="card-body d-flex flex-column align-items-center">
              <h5 class="card-title fw-bold text-sm mb-2">{{ $produk->title }}</h5>
              <p class="card-text text-muted mb-0">{{ Str::limit($produk->description, 120) }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="text-center mt-4" data-aos="fade-up" data-aos-delay="500">
      <a href="{{ route('produk.index') }}" class="btn btn-outline-dark rounded-pill px-4 py-2">Lihat Lebih Lanjut</a>
    </div>
  </div>
</section>

<!-- PORTOFOLIO SECTION -->
<section class="py-5" id="portfolio">
  <a href="{{ url('/portofolio') }}" style="text-decoration: none; color: inherit;">
    <div class="container">
      <div class="section-title text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold">Portofolio</h2>
        <p class="text-muted">Hasil karya terbaik UBW TeFa Wikrama 1 Garut.</p>
      </div>
      <div class="row g-4">
        @foreach($portofolios->take(6) as $item)
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
            <div class="portfolio-wrap">
              <img src="{{ asset($item->image) }}" alt="Portofolio">
            </div>
          </div>
        @endforeach
      </div>

      <div class="text-center mt-4" data-aos="fade-up" data-aos-delay="500">
        <a href="{{ url('/portofolio') }}" class="btn btn-outline-dark rounded-pill px-4 py-2">Lihat Lebih Lanjut</a>
      </div>
    </div>
  </a>
</section>

@endsection
