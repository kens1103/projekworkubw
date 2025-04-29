@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="py-5 bg-light" id="contact">
  <div class="container text-center">
    <h1 class="display-4 fw-bold">Kontak Kami</h1>
    <p class="lead">Jika Anda memiliki pertanyaan atau ingin bekerja sama dengan kami, jangan ragu untuk menghubungi kami.</p>
  </div>
</section>

<!-- Contact Form -->
<section class="py-5">
  <div class="container">
    <h3 class="text-center mb-4 fw-bold">Kirim Pesan</h3>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <form method="POST" action="">
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
<section class="py-5 bg-light">
  <div class="container">
    <div class="row text-center g-4">

      <!-- Telepon -->
      <div class="col-md-4">
        <div class="d-flex flex-column align-items-center">
          <i class="bi bi-telephone-fill fs-1 text-success mb-2"></i>
          <h5 class="fw-bold">Telepon</h5>
          <p class="mb-0">(123) 456-7890</p>
        </div>
      </div>

      <!-- Email -->
      <div class="col-md-4">
        <div class="d-flex flex-column align-items-center">
          <i class="bi bi-envelope-fill fs-1 text-success mb-2"></i>
          <h5 class="fw-bold">Email</h5>
          <p class="mb-0">info@wikrama.com</p>
        </div>
      </div>

      <!-- Alamat -->
      <div class="col-md-4">
        <div class="d-flex flex-column align-items-center">
          <i class="bi bi-geo-alt-fill fs-1 text-success mb-2"></i>
          <h5 class="fw-bold">Alamat</h5>
          <p class="mb-0">Jalan Raya No. 123, Garut</p>
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
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3162.9187495288434!2d107.9050429757318!3d-7.219760492766229!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68b03a9372cb07%3A0xb92c6f88db50c2d1!2sSMK%20Wikrama%20Garut!5e0!3m2!1sen!2sid!4v1617176621110!5m2!1sen!2sid" 
        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
      </iframe>
    </div>
  </div>
</section>

@endsection
