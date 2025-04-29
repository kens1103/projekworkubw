<!-- resources/views/wikrama/portofolio.blade.php -->
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

<!-- Hero Section for Portfolio Page -->
<section class="py-5 bg-light" id="portfolio">
  <div class="container text-center">
    <h1 class="display-4 fw-bold">Portofolio Kami</h1>
    <p class="lead">Berikut adalah beberapa proyek terbaik yang telah kami kerjakan.</p>
  </div>
</section>

<!-- Portfolio Filter Section -->
<section class="py-5">
  <div class="container">
    <div class="section-title text-center mb-5">
      <h2 class="fw-bold">Filter Portfolio</h2>
    </div>

    <!-- Portfolio Gallery -->
    <div class="row portfolio-container g-4">
      
      <!-- Portfolio Item 1 -->
      <div class="col-lg-4 col-md-6 portfolio-item app" data-aos="fade-up">
        <div class="portfolio-wrap">
          <img src="/img/molis.jpg" alt="Aplikasi 1">
          <div class="portfolio-info text-center">
            <a href="/img/molis.jpg" class="glightbox" title="Aplikasi 1">
              <h4>coba coba</h4>
              <p>App</p>
            </a>
          </div>
        </div>
      </div>

      <!-- Portfolio Item 2 -->
      <div class="col-lg-4 col-md-6 portfolio-item web" data-aos="fade-up" data-aos-delay="100">
        <div class="portfolio-wrap">
          <img src="/img/ruangpmn.jpg" alt="Website 1">
          <div class="portfolio-info text-center">
            <a href="/img/ruangpmn.jpg" class="glightbox" title="Website 1">
              <h4>Website 1</h4>
              <p>Web</p>
            </a>
          </div>
        </div>
      </div>

      <!-- Portfolio Item 3 -->
      <div class="col-lg-4 col-md-6 portfolio-item design" data-aos="fade-up" data-aos-delay="200">
        <div class="portfolio-wrap">
          <img src="/img/ruangtjkt.jpg" alt="Desain 1">
          <div class="portfolio-info text-center">
            <a href="/img/ruangtjkt.jpg" class="glightbox" title="Desain 1">
              <h4>Desain 1</h4>
              <p>Design</p>
            </a>
          </div>
        </div>
      </div>

      <!-- Portfolio Item 4 -->
      <div class="col-lg-4 col-md-6 portfolio-item app" data-aos="fade-up" data-aos-delay="300">
        <div class="portfolio-wrap">
          <img src="/img/satpam.jpg" alt="Aplikasi 2">
          <div class="portfolio-info text-center">
            <a href="/img/satpam.jpg" class="glightbox" title="Aplikasi 2">
              <h4>Aplikasi 2</h4>
              <p>App</p>
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection
