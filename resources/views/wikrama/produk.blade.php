@extends('layouts.app')

<style>
  .img-hover-zoom-dark {
    transition: transform 0.5s ease, filter 0.5s ease;
    cursor: pointer;
  }
  .img-hover-zoom-dark:hover {
    transform: scale(1.05);
    filter: brightness(85%);
  }
</style>

@section('content')

<!-- Hero Section -->
<section class="bg-light" id="about">
  <div class="position-relative w-100 overflow-hidden" style="height: 450px;">
    <img src="/img/header.jpg" class="w-100 h-100 object-fit-cover" alt="About Image">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5);"></div>
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

      @forelse($produks as $produk)
      <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card h-100 shadow rounded-4">
          <div class="overflow-hidden rounded-top-4" style="height: 180px;">
            <img
              src="{{ asset('storage/' . $produk->image) }}"
              class="w-100 h-100 object-fit-cover img-hover-zoom-dark"
              alt="{{ $produk->title }}"
              data-bs-toggle="modal"
              data-bs-target="#imageModal"
              data-image="{{ asset('storage/' . $produk->image) }}"
            >
          </div>
          <div class="card-body">
            <h5 class="card-title fw-bold text-sm">{{ $produk->title }}</h5>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12 text-center">
        <p class="text-muted">Belum ada produk yang tersedia.</p>
      </div>
      @endforelse

    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-body text-center">
        <img src="" id="modalImage" class="img-fluid rounded" alt="Preview Produk">
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const modalImage = document.getElementById('modalImage');
    const imageModal = document.getElementById('imageModal');

    document.querySelectorAll('img[data-bs-toggle="modal"]').forEach(img => {
      img.addEventListener('click', function () {
        const src = this.getAttribute('data-image');
        modalImage.setAttribute('src', src);
      });
    });
  });
</script>
@endpush
