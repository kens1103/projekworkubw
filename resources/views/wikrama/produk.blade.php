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

  .card-body {
    min-height: 250px;
  }

  .card-title {
    font-size: 1.1rem;
  }

  .card-text {
    font-size: 0.9rem;
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

<!-- Produk Section -->
<section class="py-5">
  <div class="container" data-aos="fade-up">
    <h2 class="section-title text-center mb-5 fw-bold">Produk & Layanan Unggulan kami</h2>

    <div class="row g-4" id="produkContainer">
      @foreach($produks->take(6) as $produk)
        <div class="col-lg-4 col-md-6 produk-item" data-aos="fade-up">
          <div class="card h-100 shadow rounded-4 text-center">
            <div class="overflow-hidden rounded-top-4" style="height: 200px;">
              <img src="{{ asset('storage/' . $produk->image) }}"
                class="w-100 h-100 object-fit-cover img-hover-zoom-dark"
                alt="{{ $produk->title }}">
            </div>
            <div class="card-body d-flex flex-column align-items-center">
              <h5 class="card-title fw-bold text-sm mb-2">{{ $produk->title }}</h5>
              <p class="card-text text-muted mb-0">{{ Str::limit($produk->description, 120) }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    @if($produks->count() > 6)
      <div class="text-center mt-4">
        <button id="loadMoreBtn" class="btn btn-dark px-4 py-2">Lihat Lebih Lanjut</button>
      </div>
    @endif
  </div>
</section>

<!-- JS Load More -->
<script>
  let currentCount = 6;
  const allProduks = @json($produks);
  const container = document.getElementById('produkContainer');
  const loadBtn = document.getElementById('loadMoreBtn');

  loadBtn?.addEventListener('click', () => {
    const nextItems = allProduks.slice(currentCount, currentCount + 3);

    nextItems.forEach(produk => {
      const col = document.createElement('div');
      col.className = 'col-lg-4 col-md-6 produk-item';
      col.setAttribute('data-aos', 'fade-up');

      col.innerHTML = `
        <div class="card h-100 shadow rounded-4 text-center">
          <div class="overflow-hidden rounded-top-4" style="height: 200px;">
            <img src="/storage/${produk.image}" class="w-100 h-100 object-fit-cover img-hover-zoom-dark" alt="${produk.title}">
          </div>
          <div class="card-body d-flex flex-column align-items-center">
            <h5 class="card-title fw-bold text-sm mb-2">${produk.title}</h5>
            <p class="card-text text-muted mb-0">${produk.description.slice(0, 120)}${produk.description.length > 120 ? '...' : ''}</p>
          </div>
        </div>
      `;

      container.appendChild(col);
    });

    currentCount += 3;
    if (currentCount >= allProduks.length) {
      loadBtn.style.display = 'none';
    }
  });
</script>

@endsection
