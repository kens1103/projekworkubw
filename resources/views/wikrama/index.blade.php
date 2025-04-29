@extends('layouts.app')
<style>
  /* Style portofolio */
  .portfolio-wrap {
    overflow: hidden;
    border-radius: 1rem; /* Semua sudut membulat */
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    position: relative;
    transition: transform 0.5s ease, filter 0.5s ease;
  }
  .portfolio-wrap img {
    width: 100%;
    height: 220px; /* Ukuran fix semua portofolio */
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
    color: #212529; /* Abu gelap - netral, elegan */
    transition: color 0.3s ease;
  }
  .glightbox h4 {
      font-size: 18px;
      margin-bottom: 4px;
      color: #212529;
  }
  .glightbox p {
      font-size: 14px;
      color: #212529; /* Abu abu muda */
  }
</style>
@section('content')

<section class="hero" id="hero">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
        <h1 class="display-4 fw-bold">UBW TeFa Wisaga</h1>
        <p class="lead">Kami adalah tim desainer berbakat yang membuat website dengan Bootstrap.</p>
        <a href="{{ url('/tentang') }}" class="btn btn-outline-success rounded-pill btn-lg me-3">Tentang Kami</a>
      </div>
      <div class="col-md-6 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="300">
        <img src="/img/index.png" alt="Hero Image" class="floating-image img-fluid">
      </div>
    </div>
  </div>
</section>

<!-- About Section -->
<section id="tentang" class="py-5">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 text-center" data-aos="fade-right">
                <img src="/img/produklayanan.jpg" alt="Tentang Kami" class="img-fluid rounded-4">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h2 class="fw-bold mb-4">Tentang Kami</h2>
                    <p class="lead text-muted">
                    Wikrama Satu Garut bertujuan memberdayakan masyarakat melalui inovasi dan kolaborasi usaha lokal. Kami menyediakan berbagai layanan digital untuk membantu Anda berkembang secara online, dari pengembangan website hingga pemasaran digital.
                    </p>
            </div>
        </div>

    <div class="row text-center g-4">
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="p-4 border rounded-4 shadow-sm h-100">
          <i class="bi bi-lightbulb-fill display-4 text-success mb-3"></i>
          <h5 class="fw-bold">Inovatif</h5>
          <p class="text-muted">Kami selalu membawa ide-ide segar untuk solusi digital Anda.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="p-4 border rounded-4 shadow-sm h-100">
          <i class="bi bi-people-fill display-4 text-success mb-3"></i>
          <h5 class="fw-bold">Kolaboratif</h5>
          <p class="text-muted">Kerjasama tim kami membantu mewujudkan visi Anda dengan maksimal.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
        <div class="p-4 border rounded-4 shadow-sm h-100">
          <i class="bi bi-globe2 display-4 text-success mb-3"></i>
          <h5 class="fw-bold">Global Mindset</h5>
          <p class="text-muted">Kami membangun produk digital yang siap bersaing secara global.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Services Section -->
<section class="py-5" id="services" data-aos="fade-up">
  <div class="container">
    <h2 class="section-title text-center fw-bold mb-5">Produk & Layanan</h2>
    <div class="row text-center gy-4">
      <div class="col-md-3">
        <i class="bi bi-display fs-1 mb-3 text-success"></i>
        <h5>Desain UI/UX</h5>
        <p class="text-muted">Mewujudkan tampilan dan pengalaman pengguna yang optimal dan profesional.</p>
      </div>
      <div class="col-md-3">
        <i class="bi bi-router-fill fs-1 mb-3 text-success"></i>
        <h5>Setup Server dan Router</h5>
        <p class="text-muted">Mendukung kebutuhan jaringan melalui instalasi dan konfigurasi perangkat yang andal.</p>
      </div>
      <div class="col-md-3">
        <i class="bi bi-journal-text fs-1 mb-3 text-success"></i>
        <h5>Administrasi dan Pengarsipan</h5>
        <p class="text-muted">Menata dokumen dan arsip secara sistematis untuk menunjang efektivitas kerja.</p>
      </div>
      <div class="col-md-3">
        <i class="bi bi-door-closed-fill fs-1 mb-3 text-success"></i>
        <h5>Housekeeping</h5>
        <p class="text-muted">Menciptakan ruang yang bersih dan nyaman melalui layanan tata graha yang terstandar.</p>
      </div>
    </div>
  </div>
</section>

<!-- Portfolio Section -->
<section class="py-5 bg-light" id="portfolio">
  <div class="container">
    <div class="section-title text-center mb-5">
      <h2 class="fw-bold">Portofolio</h2>
      <p class="text-muted">Beberapa hasil karya terbaik kami.</p>
    </div>

    <div class="row g-4">
      <!-- Portfolio Preview Item 1 -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up">
        <div class="portfolio-wrap">
          <img src="/img/molis.jpg" alt="Project 1">
        </div>
      </div>

      <!-- Portfolio Preview Item 2 -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="portfolio-wrap">
          <img src="/img/ruangpmn.jpg" alt="Project 2">
        </div>
      </div>

      <!-- Portfolio Preview Item 3 -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="portfolio-wrap">
          <img src="/img/ruangtjkt.jpg" alt="Project 3">
        </div>
      </div>

      <!-- Portfolio Preview Item 4 -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="portfolio-wrap">
          <img src="/img/satpam.jpg" alt="Project 4">
        </div>
      </div>

      <!-- Portfolio Preview Item 5 -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="portfolio-wrap">
          <img src="/img/contoh5.jpg" alt="Project 5">
        </div>
      </div>

      <!-- Portfolio Preview Item 6 -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
        <div class="portfolio-wrap">
          <img src="/img/contoh6.jpg" alt="Project 6">
        </div>
      </div>
    </div>

    <div class="text-center mt-4" data-aos="fade-up" data-aos-delay="600">
      <a href="{{ url('/portofolio') }}" class="btn btn-outline-dark rounded-pill px-4 py-2">
        Lihat Semua
      </a>
    </div>
  </div>
</section>

@endsection
