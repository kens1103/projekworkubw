@extends('layouts.app')

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
          <h1 class="display-5 fw-bold">Kontak Kami</h1>
          <p class="fs-6 mt-3">Hubungi UBW TEFA Wikrama Satu Garut untuk informasi, konsultasi, atau kerja sama.</p>
        </div>
  </div>
</section>

<!-- Contact Form -->
<section class="py-5">
  <div class="container">
    <h3 class="text-center mb-4 fw-bold">Kirim Pesan</h3>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <form method="POST" action="{{ route('kontak.kirim') }}">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Nama Anda</label>
            <input type="text" class="form-control" id="name" name="name" required placeholder="Nama Anda">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email Anda</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="Email Anda">
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Pesan Anda</label>
            <textarea class="form-control" id="message" name="message" rows="5" required placeholder="Pesan Anda"></textarea>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-success rounded-pill px-4">Kirim Pesan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Contact Info Section -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="row text-center g-4">

      <!-- Telepon -->
      <div class="col-md-4">
        <div class="d-flex flex-column align-items-center">
          <i class="bi bi-telephone-fill fs-1 text-success mb-2"></i>
          <h5 class="fw-bold">Telepon</h5>
          <p class="mb-0">{{ $kontak->telepon ?? '-' }}</p>
        </div>
      </div>

      <!-- Email -->
      <div class="col-md-4">
        <div class="d-flex flex-column align-items-center">
          <i class="bi bi-envelope-fill fs-1 text-success mb-2"></i>
          <h5 class="fw-bold">Email</h5>
          <p class="mb-0">{{ $kontak->email ?? '-' }}</p>
        </div>
      </div>

      <!-- Alamat -->
      <div class="col-md-4">
        <div class="d-flex flex-column align-items-center">
          <i class="bi bi-geo-alt-fill fs-1 text-success mb-2"></i>
          <h5 class="fw-bold">Alamat</h5>
          <p class="mb-0">{{ $kontak->alamat ?? '-' }}</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Maps Section -->
<section class="py-5">
  <div class="container d-flex justify-content-center">
    <div class="rounded-4 overflow-hidden shadow" style="height: 500px; width: 1000px;"> <!-- <-- height map nya diperkecil bro -->
      <iframe
        src="https://maps.google.com/maps?q={{ urlencode($kontak->alamat) }}&output=embed"
        width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy">
      </iframe>
    </div>
  </div>
</section>

@endsection
