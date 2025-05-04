@extends('layouts.app')

<style>
  .portfolio-wrap {
    overflow: hidden;
    border-radius: 1rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    position: relative;
    transition: transform 0.5s ease, filter 0.5s ease;
    aspect-ratio: 1 / 1;
    height: 250px;
  }

  .portfolio-wrap img {
    width: 100%;
    height: 100%;
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
    background: rgba(33, 37, 41, 0.8);
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

  .portfolio-info h4, .portfolio-info p {
    color: #fff;
    margin: 0;
  }
</style>

@section('content')

<!-- Hero Section -->
<section class="bg-light" id="about">
  <div class="position-relative w-100 overflow-hidden" style="height: 450px;">
    <img src="/img/header.jpg" class="w-100 h-100 object-fit-cover" alt="About Image">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5);"></div>
    <div class="position-absolute top-50 start-50 translate-middle text-white text-center" data-aos="fade-up">
      <h1 class="display-5 fw-bold">Portofolio</h1>
      <p class="fs-6 mt-3">Menampilkan hasil karya terbaik dari UBW TEFA Wikrama Satu Garut.</p>
    </div>
  </div>
</section>

<!-- Portfolio Section -->
<section class="py-5">
  <div class="container px-4">
    <div class="section-title text-center mb-5" data-aos="fade-up">
      <h2 class="fw-bold">Portofolio</h2>
    </div>

    <!-- Galeri Grid -->
    <div class="row g-4" id="portfolioGrid">
      @foreach($portofolios->take(8) as $item)
        <div class="col-md-6 col-lg-3 portfolio-item" data-aos="fade-up">
          <div class="portfolio-wrap">
            <img src="{{ asset($item->image) }}" alt="Portofolio">
          </div>
        </div>
      @endforeach
    </div>

    @if($portofolios->count() > 8)
    <div class="text-center mt-4">
      <button class="btn btn-dark px-4 py-2" id="loadMoreBtn">Lihat Lebih Banyak</button>
    </div>
    @endif
  </div>
</section>

<!-- JS Load More -->
<script>
  let currentCount = 8;
  const allPortfolios = @json($portofolios);
  const grid = document.getElementById('portfolioGrid');
  const loadBtn = document.getElementById('loadMoreBtn');

  loadBtn?.addEventListener('click', () => {
    const nextItems = allPortfolios.slice(currentCount, currentCount + 4);

    nextItems.forEach(item => {
      const col = document.createElement('div');
      col.className = 'col-md-6 col-lg-3 portfolio-item';
      col.setAttribute('data-aos', 'fade-up');

      col.innerHTML = `
        <div class="portfolio-wrap">
          <img src="${item.image}" alt="Portofolio">
      `;

      grid.appendChild(col);
    });

    currentCount += 4;
    if (currentCount >= allPortfolios.length) {
      loadBtn.style.display = 'none';
    }
  });
</script>

@endsection
