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
      
      <!-- Example Product 1 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow rounded-4">
          <div class="overflow-hidden rounded-top-4" style="height: 250px;">
              <img src="/img/molis.jpg" class="w-100 h-100 object-fit-cover img-hover-zoom-dark" alt="Produk 1">
          </div>
          <div class="card-body">
            <h5 class="card-title fw-bold">Produk 1</h5>
            <p class="card-text">Deskripsi singkat mengenai produk 1.</p>
          </div>
        </div>
      </div>

      <!-- Example Product 2 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow rounded-4">
          <div class="overflow-hidden rounded-top-4" style="height: 250px;">
            <img src="/img/satpam.jpg" class="w-100 h-100 object-fit-cover img-hover-zoom-dark" alt="Produk 2">
          </div>
          <div class="card-body">
            <h5 class="card-title fw-bold">Produk 2</h5>
            <p class="card-text">Deskripsi singkat mengenai produk 2.</p>
          </div>
        </div>
      </div>

      <!-- Example Product 3 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow rounded-4">
          <div class="overflow-hidden rounded-top-4" style="height: 250px;">
            <img src="/img/ruangtjkt.jpg" class="w-100 h-100 object-fit-cover img-hover-zoom-dark" alt="Produk 3">
          </div>
          <div class="card-body">
            <h5 class="card-title fw-bold">Produk 3</h5>
            <p class="card-text">Deskripsi singkat mengenai produk 3.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection
