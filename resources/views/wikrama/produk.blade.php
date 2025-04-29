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

<!-- Hero Section for Produk Page -->
<section class="py-5 bg-light" id="produk">
  <div class="container text-center">
    <h1 class="display-4 fw-bold">Produk & Layanan Kami</h1>
    <p class="lead">"Bersama UBW TEFA Wikrama Satu Garut, mari ciptakan kolaborasi untuk masa depan yang lebih baik. Hubungi kami untuk informasi lebih lanjut atau kerja sama!"</p>
  </div>
</section>

<!-- Products Section -->
<section class="py-5">
  <div class="container">
    <h2 class="section-title text-center mb-5 fw-bold">Produk Unggulan</h2>
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
