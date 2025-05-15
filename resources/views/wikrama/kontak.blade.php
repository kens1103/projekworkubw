@extends('layouts.app')

@section('content')

<!-- Hero Section Full Width untuk About Page -->
<section class="bg-light" id="about">
  <div class="position-relative w-100 overflow-hidden" style="height: 450px;">
    <img src="/img/header.jpg" class="w-100 h-100 object-fit-cover" alt="About Image">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5);"></div>
    <div class="position-absolute top-50 start-50 translate-middle text-white text-center" data-aos="fade-up">
      <h1 class="display-5 fw-bold">Kontak Kami</h1>
      <p class="fs-6 mt-3">Hubungi UBW TeFa Wikrama 1 Garut untuk Informasi, Konsultasi, atau Kerjasama.</p>
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
      <div class="col-md-4">
        <div class="d-flex flex-column align-items-center">
          <i class="bi bi-telephone-fill fs-1 text-success mb-2"></i>
          <h5 class="fw-bold">Telepon</h5>
          <p class="mb-0">{{ $kontak->telepon ?? '-' }}</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="d-flex flex-column align-items-center">
          <i class="bi bi-envelope-fill fs-1 text-success mb-2"></i>
          <h5 class="fw-bold">Email</h5>
          <p class="mb-0">{{ $kontak->email ?? '-' }}</p>
        </div>
      </div>
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
    <div class="rounded-4 overflow-hidden shadow" style="height: 500px; width: 1000px;">
      <iframe
        src="https://maps.google.com/maps?q={{ urlencode($kontak->alamat) }}&output=embed"
        width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy">
      </iframe>
    </div>
  </div>
</section>

@if(session('success'))
<!-- Modal Pop-up Berhasil -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header border-0">
        <h5 class="modal-title w-100 text-success" id="successModalLabel">Berhasil!</h5>
      </div>
      <div class="modal-body">
        {{ session('success') }}
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const successModal = new bootstrap.Modal(document.getElementById('successModal'));
    successModal.show();

    setTimeout(() => {
      successModal.hide();
    }, 3000);
  });
</script>
@endif

@endsection
