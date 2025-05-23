@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<section class="bg-light" id="about">
  <div class="position-relative w-100 overflow-hidden" style="height: 450px;">
    <img src="/img/header.jpg" class="w-100 h-100 object-fit-cover" alt="About Image">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5);"></div>
    <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
      <h1 class="display-5 fw-bold">Produk & Layanan Kami</h1>
      <p class="fs-6 mt-3">UBW TEFA Wikrama 1 Garut, mitra tepat untuk solusi dan inovasi.</p>
    </div>
  </div>
</section>

<!-- PRODUK & LAYANAN -->
<section class="py-5">
  <div class="container" data-aos="fade-up">
    <h2 class="section-title text-center mb-5 fw-bold">Produk & Layanan Unggulan kami</h2>

    <!-- Filter Kategori Saja -->
    <div class="row mb-4 justify-content-end">
      <div class="col-md-4 text-md-end">
        <select id="kategoriSelect" class="form-select w-auto rounded-pill px-4 py-2">
          <option value="">Semua Kategori</option>
          @php $kategoriList = $produks->pluck('kategori')->unique(); @endphp
          @foreach($kategoriList as $kategori)
            <option value="{{ $kategori }}">{{ $kategori }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="row g-4" id="produkContainer"></div>

    @if($produks->count() > 6)
      <div class="text-center mt-4">
        <button id="loadMoreBtn" class="btn btn-outline-dark rounded-pill px-4 py-2">Lihat Lebih Lanjut</button>
      </div>
    @endif
  </div>
</section>

<!-- Modal Detail Produk -->
<div class="modal fade" id="produkModal" tabindex="-1" aria-labelledby="produkModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="produkModalLabel">Detail Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img id="modalImage" src="" class="img-fluid mb-3 rounded">
        <h5 id="modalTitle" class="fw-bold"></h5>
        <p id="modalDescription"></p>
      </div>
    </div>
  </div>
</div>

<script>
  let currentCount = 6;
  const allProduks = @json($produks);
  const container = document.getElementById('produkContainer');
  const loadBtn = document.getElementById('loadMoreBtn');
  const kategoriSelect = document.getElementById('kategoriSelect');

  function renderProduk(produkList) {
    container.innerHTML = '';
    produkList.forEach(produk => {
      const col = document.createElement('div');
      col.className = 'col-lg-4 col-md-6';
      col.innerHTML = `
        <div class="card h-100 shadow rounded-4 text-center produk-item" data-title="${produk.title}" data-kategori="${produk.kategori}">
          <div class="overflow-hidden rounded-top-4" style="height: 200px; cursor: pointer;" onclick="showModal('${produk.title}', '${produk.description.replace(/'/g, "\'")}', '/storage/${produk.image}')">
            <img src="/storage/${produk.image}" class="w-100 h-100 object-fit-cover" alt="${produk.title}">
          </div>
          <div class="card-body d-flex flex-column align-items-center">
            <h5 class="card-title fw-bold text-sm mb-2">${produk.title}</h5>
            <p class="card-text text-muted mb-0">${produk.description.slice(0, 120)}${produk.description.length > 120 ? '...' : ''}</p>
          </div>
        </div>
      `;
      container.appendChild(col);
    });
  }

  function filterProduk() {
    const kategori = kategoriSelect.value.toLowerCase();
    let filtered = allProduks.filter(p => {
      return !kategori || p.kategori.toLowerCase() === kategori;
    });
    renderProduk(filtered.slice(0, currentCount));
    loadBtn.style.display = (filtered.length > currentCount) ? 'block' : 'none';
  }

  function showModal(title, description, image) {
    document.getElementById('modalTitle').textContent = title;
    document.getElementById('modalDescription').textContent = description;
    document.getElementById('modalImage').src = image;
    new bootstrap.Modal(document.getElementById('produkModal')).show();
  }

  renderProduk(allProduks.slice(0, currentCount));

  kategoriSelect?.addEventListener('change', () => {
    currentCount = 6;
    filterProduk();
  });

  loadBtn?.addEventListener('click', () => {
    currentCount += 3;
    filterProduk();
  });
</script>

@endsection
