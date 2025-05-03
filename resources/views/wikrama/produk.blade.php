<!-- resources/views/wikrama/produk.blade.php -->
@extends('layouts.app')
<style>
  .img-hover-zoom-dark {
    transition: transform 0.5s ease, filter 0.5s ease;
  }
  .img-hover-zoom-dark:hover {
    transform: scale(1.05);
    filter: brightness(85%);
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
          <h1 class="display-5 fw-bold">Produk & Layanan Kami</h1>
          <p class="fs-6 mt-3">UBW TEFA Wikrama Satu Garut, mitra tepat untuk solusi dan inovasi.</p>
        </div>
  </div>
</section>

<!-- Products Section -->
<section class="py-5">
  <div class="container">
    <h2 class="section-title text-center mb-5 fw-bold">Produk & Layanan Unggulan kami</h2>
    <div class="row">
      
      <!-- Produk 1 -->
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card h-100 shadow rounded-4">
          <div class="overflow-hidden rounded-top-4" style="height: 180px;">
              <img src="/img/molis.jpg" class="w-100 h-100 object-fit-cover img-hover-zoom-dark" alt="Produk 1">
          </div>
          <div class="card-body">
            <h5 class="card-title fw-bold">UNITED E Motor - TeFa PMN</h5>
          </div>
        </div>
      </div>

      <!-- Produk 2 -->
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card h-100 shadow rounded-4">
          <div class="overflow-hidden rounded-top-4" style="height: 180px;">
            <img src="/img/marketing.jpg" class="w-100 h-100 object-fit-cover img-hover-zoom-dark" alt="Produk 2">
          </div>
          <div class="card-body">
            <h5 class="card-title fw-bold">Jasa Digital Marketing - TeFa PMN</h5>
          </div>
        </div>
      </div>

      <!-- Produk 3 -->
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card h-100 shadow rounded-4">
          <div class="overflow-hidden rounded-top-4" style="height: 180px;">
            <img src="/img/wikramart.jpg" class="w-100 h-100 object-fit-cover img-hover-zoom-dark" alt="Produk 3">
          </div>
          <div class="card-body">
            <h5 class="card-title fw-bold">Wikramart - TeFa PMN</h5>
          </div>
        </div>
      </div>

      <!-- Produk 4 -->
<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
  <div class="card h-100 shadow rounded-4">
    <div class="overflow-hidden rounded-top-4" style="height: 180px;">
      <img src="/img/website.jpg" class="w-100 h-100 object-fit-cover img-hover-zoom-dark" alt="Produk 4">
    </div>
    <div class="card-body">
      <h5 class="card-title fw-bold text-sm">Website Interaktif - TeFa PPLG</h5>
    </div>
  </div>
</div>

 <!-- Produk 4 -->
 <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
  <div class="card h-100 shadow rounded-4">
    <div class="overflow-hidden rounded-top-4" style="height: 180px;">
      <img src="/img/uiux.jpg" class="w-100 h-100 object-fit-cover img-hover-zoom-dark" alt="Produk 4">
    </div>
    <div class="card-body">
      <h5 class="card-title fw-bold text-sm">UI/UX Design - TeFa PPLG</h5>
    </div>
  </div>
</div>

<!-- Produk 4 -->
<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
  <div class="card h-100 shadow rounded-4">
    <div class="overflow-hidden rounded-top-4" style="height: 180px;">
      <img src="/img/informasi.jpg" class="w-100 h-100 object-fit-cover img-hover-zoom-dark" alt="Produk 4">
    </div>
    <div class="card-body">
      <h5 class="card-title fw-bold text-sm">Sistem Informasi - TeFa PPLG</h5>
    </div>
  </div>
</div>

 <!-- Produk 4 -->
 <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
  <div class="card h-100 shadow rounded-4">
    <div class="overflow-hidden rounded-top-4" style="height: 180px;">
      <img src="/img/instalasi.jpg" class="w-100 h-100 object-fit-cover img-hover-zoom-dark" alt="Produk 4">
    </div>
    <div class="card-body">
      <h5 class="card-title fw-bold text-sm">Instalasi Jaringan Hotspot - TeFa TJKT</h5>
    </div>
  </div>
</div>

 <!-- Produk 4 -->
 <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
  <div class="card h-100 shadow rounded-4">
    <div class="overflow-hidden rounded-top-4" style="height: 180px;">
      <img src="/img/internet.jpg" class="w-100 h-100 object-fit-cover img-hover-zoom-dark" alt="Produk 4">
    </div>
    <div class="card-body">
      <h5 class="card-title fw-bold text-sm">Membangun Jaringan Internet - TeFa TJKT</h5>
    </div>
  </div>
</div>

 <!-- Produk 4 -->
 <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
  <div class="card h-100 shadow rounded-4">
    <div class="overflow-hidden rounded-top-4" style="height: 180px;">
      <img src="/img/fiber.jpg" class="w-100 h-100 object-fit-cover img-hover-zoom-dark" alt="Produk 4">
    </div>
    <div class="card-body">
      <h5 class="card-title fw-bold text-sm">Instalasi Fiber Optik - TeFa TJKT</h5>
    </div>
  </div>
</div>

 <!-- Produk 4 -->
 <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
  <div class="card h-100 shadow rounded-4">
    <div class="overflow-hidden rounded-top-4" style="height: 180px;">
      <img src="/img/hotel.jpg" class="w-100 h-100 object-fit-cover img-hover-zoom-dark" alt="Produk 4">
    </div>
    <div class="card-body">
      <h5 class="card-title fw-bold text-sm">Insitu Hotel - TeFa HTL</h5>
    </div>
  </div>
</div>

<!-- Produk 4 -->
<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
  <div class="card h-100 shadow rounded-4">
    <div class="overflow-hidden rounded-top-4" style="height: 180px;">
      <img src="/img/hotel.jpg" class="w-100 h-100 object-fit-cover img-hover-zoom-dark" alt="Produk 4">
    </div>
    <div class="card-body">
      <h5 class="card-title fw-bold text-sm">Insitu Hotel - TeFa HTL</h5>
    </div>
  </div>
</div>

<!-- Produk 4 -->
<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
  <div class="card h-100 shadow rounded-4">
    <div class="overflow-hidden rounded-top-4" style="height: 180px;">
      <img src="/img/hotel.jpg" class="w-100 h-100 object-fit-cover img-hover-zoom-dark" alt="Produk 4">
    </div>
    <div class="card-body">
      <h5 class="card-title fw-bold text-sm">Insitu Hotel - TeFa HTL</h5>
    </div>
  </div>
</div>

<!-- Produk 4 --> 
<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
  <div class="card h-100 shadow rounded-4">
    <div class="overflow-hidden rounded-top-4" style="height: 180px;">
      <img src="/img/hotel.jpg" class="w-100 h-100 object-fit-cover img-hover-zoom-dark" alt="Produk 4">
    </div>
    <div class="card-body">
      <h5 class="card-title fw-bold text-sm">Insitu Hotel - TeFa HTL</h5>
    </div>
  </div>
</div>

<!-- Produk 4 -->
<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
  <div class="card h-100 shadow rounded-4">
    <div class="overflow-hidden rounded-top-4" style="height: 180px;">
      <img src="/img/hotel.jpg" class="w-100 h-100 object-fit-cover img-hover-zoom-dark" alt="Produk 4">
    </div>
    <div class="card-body">
      <h5 class="card-title fw-bold text-sm">Insitu Hotel - TeFa HTL</h5>
    </div>
  </div>
</div>


    </div>
  </div>
</section>
