@extends('layouts.app')

@section('content')
<!-- HERO SECTION -->
<section class="bg-light">
  <div class="position-relative w-100 overflow-hidden" style="height: 450px;">
    <img src="/img/header.jpg" class="w-100 h-100 object-fit-cover" alt="About Image">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5);"></div>
    <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
      <h1 class="display-5 fw-bold">Katalog Portofolio</h1>
      <p class="fs-6 mt-3">Kumpulan karya terbaik dari UBW TeFa Wikrama 1 Garut.</p>
    </div>
  </div>
</section>

<!-- KATALOG -->
<section class="py-5">
  <div class="container">
    <div class="section-title text-center mb-5">
      <h2 class="fw-bold">Katalog Portofolio</h2>
    </div>

    <div class="row g-4" id="katalog-container">
      @foreach($portofolios as $item)
      <div class="col-md-6 col-lg-3 katalog-item" data-aos="fade-up">
        <div class="card h-100 shadow-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}" style="cursor: pointer;">
          <img src="{{ asset($item->image) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
          <div class="card-body text-center">
            <h5 class="card-title">{{ $item->title }}</h5>
          </div>
        </div>
      </div>

      <!-- MODAL -->
      <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel{{ $item->id }}">{{ $item->title }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
              <div class="row">
                <!-- Gambar utama -->
                <div class="col-md-6">
                  <img src="{{ asset($item->image) }}" class="img-fluid rounded shadow-sm mb-3" style="object-fit: cover; width: 100%; height: 300px;">
                </div>

                <!-- Deskripsi dan tombol -->
                <div class="col-md-6 d-flex flex-column justify-content-between">
                  <div>
                    <h5>{{ $item->title }}</h5>
                    <p>{{ $item->description }}</p>
                  </div>
                  <div>
                    @if($item->pdf_path)
                      <a href="{{ asset($item->pdf_path) }}" class="btn btn-outline-dark mb-2" target="_blank">Unduh PDF</a>
                    @endif
                  </div>
                </div>
              </div>

              <!-- Gambar produk lainnya -->
              @if($item->images && count($item->images))
              <div class="mt-4">
                <h6 class="fw-bold">Produk Terkait:</h6>
                <div class="row g-3">
                  @foreach($item->images as $img)
                    <div class="col-md-4">
                      <img src="{{ asset($img->image_path) }}" class="img-fluid rounded shadow-sm" style="height: 200px; object-fit: cover;">
                    </div>
                  @endforeach
                </div>
              </div>
              @endif
            </div>

            <div class="modal-footer">
              <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <!-- Lihat Lebih Banyak -->
    <div class="text-center mt-4">
      <button class="btn btn-dark" id="loadMoreBtn">Lihat Lebih Banyak</button>
    </div>
  </div>
</section>

<!-- JS Show More -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    let items = document.querySelectorAll('.katalog-item');
    let loadMoreBtn = document.getElementById('loadMoreBtn');
    let visible = 8;

    function updateVisibility() {
      items.forEach((el, index) => {
        el.style.display = index < visible ? 'block' : 'none';
      });

      if (visible >= items.length) {
        loadMoreBtn.style.display = 'none';
      }
    }

    updateVisibility();

    loadMoreBtn.addEventListener('click', function() {
      visible += 4;
      updateVisibility();
    });
  });
</script>

@endsection
