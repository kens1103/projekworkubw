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

    <!-- Search dan Filter Kategori (Sejajar) -->
    <div class="row mb-5 justify-content-center">
      <div class="col-md-3 col-sm-6 mb-2 mb-md-0">
        <input type="text" id="searchInput" class="form-control rounded-pill px-4 py-2 shadow-sm border-0"
               placeholder="Cari produk..." style="background-color: #f8f9fa;">
      </div>
      <div class="col-md-3 col-sm-6">
        <select id="kategoriSelect" class="form-select rounded-pill px-4 py-2 shadow-sm border-0"
                style="background-color: #f8f9fa;">
          <option value="">Semua Kategori</option>
          <option value="PMN">PMN</option>
          <option value="RPL">PPLG</option>
          <option value="DKV">HTL</option>
          <option value="TKJ">TKJ</option>
        </select>
      </div>
    </div>

    <!-- Daftar Produk -->
    <div class="row g-4" id="produkContainer"></div>

    <!-- Tombol Load More -->
    <div class="text-center mt-4">
      <button id="loadMoreBtn" class="btn btn-outline-dark rounded-pill px-4 py-2" style="display: none;">Lihat Lebih Lanjut</button>
    </div>
  </div>
</section>

<!-- Modal Detail Produk -->
<div class="modal fade" id="produkModal" tabindex="-1" aria-labelledby="produkModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="produkModalLabel">Detail Produk & Layanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6 d-flex justify-content-center align-items-center mb-3 mb-md-0">
            <img id="modalImage" src="" alt="Gambar Produk" class="img-fluid rounded shadow-sm" style="max-height: 200px; max-width: 100%; object-fit: contain;">
          </div>
          <div class="col-md-6 d-flex flex-column justify-content-between">
            <div>
              <h5 id="modalTitle" class="fw-bold"></h5>
              <p id="modalDescription" class="text-muted"></p>
            </div>
          </div>
        </div>
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
  const searchInput = document.getElementById('searchInput');

  function renderProduk(produkList) {
    container.innerHTML = '';
    produkList.forEach(produk => {
      const col = document.createElement('div');
      col.className = 'col-lg-4 col-md-6';
      col.innerHTML = `
        <div class="card h-100 shadow rounded-4 text-center produk-item" data-title="${produk.title}" data-kategori="${produk.kategori}">
          <div class="overflow-hidden rounded-top-4" style="height: 200px; cursor: pointer;" onclick="showModal('${produk.title.replace(/'/g, "\\'")}', '${produk.description.replace(/'/g, "\\'")}', '/storage/${produk.image}')">
            <img src="/storage/${produk.image}" class="w-100 h-100 object-fit-cover" alt="${produk.title}">
          </div>
          <div class="card-body d-flex flex-column align-items-center">
            <h5 class="card-title fw-bold text-sm mb-2">${produk.title}</h5>
            <p class="card-text text-muted mb-0">${produk.description.length > 120 ? produk.description.slice(0, 120) + '...' : produk.description}</p>
          </div>
        </div>
      `;
      container.appendChild(col);
    });
  }

  function filterProduk() {
    const kategori = kategoriSelect.value.toLowerCase();
    const searchTerm = searchInput.value.toLowerCase();

    let filtered = allProduks.filter(p => {
      const matchKategori = !kategori || p.kategori.toLowerCase() === kategori;
      const matchSearch = !searchTerm || p.title.toLowerCase().includes(searchTerm) || p.description.toLowerCase().includes(searchTerm);
      return matchKategori && matchSearch;
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

  // Initial render
  renderProduk(allProduks.slice(0, currentCount));

  // Event listeners
  kategoriSelect?.addEventListener('change', () => {
    currentCount = 6;
    filterProduk();
  });

  searchInput?.addEventListener('input', () => {
    currentCount = 6;
    filterProduk();
  });

  loadBtn?.addEventListener('click', () => {
    currentCount += 3;
    filterProduk();
  });
</script>

@endsection
