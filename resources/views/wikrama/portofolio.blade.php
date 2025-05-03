
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
  .portfolio-info h4 {
    color: #fff;
    margin: 0;
  }
  .portfolio-info p {
    color: #6c757d;
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

<!-- Hero Section Full Width untuk About Page -->
<section class="bg-light" id="about">
  <!-- Gambar Full dengan Teks -->
  <div class="position-relative w-100 overflow-hidden" style="height: 450px;">
    <img src="/img/header.jpg" class="w-100 h-100 object-fit-cover" alt="About Image">
      <!-- Overlay hitam transparan -->
      <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5);"></div>
      <!-- Teks di tengah gambar -->
        <div class="position-absolute top-50 start-50 translate-middle text-white text-center" data-aos="fade-up">
          <h1 class="display-5 fw-bold">Portofolio</h1>
          <p class="fs-6 mt-3">Menampilkan hasil karya terbaik dari UBW TEFA Wikrama Satu Garut.</p>
        </div>
  </div>
</section>

<!-- Portfolio Filter Section -->
<section class="py-5">
  <div class="container">
    <div class="section-title text-center mb-5">
      <h2 class="fw-bold">Portofolio</h2>
    </div>

   <!-- Portfolio Gallery -->
   <div class="row portfolio-container g-4">
     @foreach($portofolios as $item)
     <div class="col-lg-4 col-md-6 portfolio-item" data-aos="fade-up">
       <div class="portfolio-wrap">
         <img src="{{ asset($item->image) }}" alt="Portofolio">
         <div class="portfolio-info text-center">
           <a href="{{ asset($item->image) }}" class="glightbox" title="Portofolio">
             <h4>{{ $item->title ?? 'Portofolio' }}</h4>
             <p>{{ $item->category ?? 'Kategori' }}</p>
           </a>
         </div>
       </div>
     </div>
     @endforeach
   </div>

    </div>
  </div>
</section>

@endsection
