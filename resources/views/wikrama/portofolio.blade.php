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
      <h2 class="fw-bold" data-aos="fade-up">Katalog Portofolio</h2>
    </div>

    <!-- Filter Kategori Saja -->
    <div class="row mb-4 justify-content-end">
      <div class="col-md-4 text-md-end">
        <select id="kategoriSelect" class="form-select w-auto rounded-pill px-4 py-2">
          <option value="">Semua Kategori</option>
          @php $kategoriList = $portofolios->pluck('kategori')->unique(); @endphp
          @foreach($kategoriList as $kategori)
            <option value="{{ $kategori }}">{{ $kategori }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="row g-4" id="katalog-container">
      @foreach($portofolios as $item)
      <div class="col-md-6 col-lg-3 katalog-item" data-kategori="{{ $item->kategori }}" data-aos="fade-up">
        <div class="card h-100 shadow rounded-4 text-center" data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}" style="cursor: pointer;">
          <div class="overflow-hidden rounded-top-4" style="height: 200px;">
            <img src="{{ asset($item->image) }}" 
                class="w-100 h-100 object-fit-cover img-hover-zoom-dark" 
                style="max-height: 100%; max-width: 100%; object-fit: contain;">
          </div>
          <div class="card-body d-flex flex-column align-items-center">
            <h5 class="card-title fw-bold text-sm mb-2">{{ $item->title }}</h5>
          </div>
        </div>
      </div>

      <!-- MODAL -->
      <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel{{ $item->id }}">{{ $item->title }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body bg-transparent">
              <div class="row">
                <!-- FOTO UTAMA -->
                <div class="col-md-6 bg-transparent">
                  <div class="d-flex justify-content-center">
                    <img src="{{ asset($item->image) }}"
                        class="img-fluid rounded mb-3 mx-auto d-block" 
                        style="max-height: 150px; max-width: 100%;">
                  </div>
                  <!-- FOTO TAMBAHAN -->
                  @if($item->additionalImages && $item->additionalImages->count())
                  <div class="mt-2">
                    <div class="row g-3">
                      @foreach($item->additionalImages as $img)
                        <div class="col-md-12 bg-transparent">
                          <img src="{{ asset($img->image) }}" 
                              class="img-fluid rounded shadow-sm mx-auto d-block" 
                              style="max-height: 150px; max-width: 100%;">
                        </div>
                      @endforeach
                    </div>
                  </div>
                  @endif
                </div>
                <!-- Deskripsi dan tombol -->
                <div class="col-md-6 d-flex flex-column justify-content-between">
                  <div>
                    <h5>{{ $item->title }}</h5>
                    <p>{{ $item->description }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              @if($item->pdf_path)
                <div class="d-flex gap-2 flex-wrap">
                  <a href="{{ route('admin.portofolio.viewPdf', $item->id) }}" target="_blank" class="btn btn-outline-primary">
                    <i class="bi bi-eye-fill"></i> Lihat PDF
                  </a>
                  <a href="{{ route('admin.portofolio.downloadPdf', $item->id) }}" class="btn btn-outline-danger">
                      <i class="bi bi-download"></i> Unduh PDF
                  </a>
                </div>
              @endif
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

<!-- JS Show More + Filter Kategori -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    let items = document.querySelectorAll('.katalog-item');
    let loadMoreBtn = document.getElementById('loadMoreBtn');
    let visible = 8;

    function updateVisibility() {
      const selectedKategori = document.getElementById('kategoriSelect').value;
      let shownCount = 0;

      items.forEach(el => {
        const kategori = el.getAttribute('data-kategori');
        if (!selectedKategori || selectedKategori === kategori) {
          if (shownCount < visible) {
            el.style.display = 'block';
            shownCount++;
          } else {
            el.style.display = 'none';
          }
        } else {
          el.style.display = 'none';
        }
      });

      const filteredItemsCount = Array.from(items).filter(el => {
        const kategori = el.getAttribute('data-kategori');
        return !selectedKategori || selectedKategori === kategori;
      }).length;

      if (shownCount >= filteredItemsCount) {
        loadMoreBtn.style.display = 'none';
      } else {
        loadMoreBtn.style.display = 'inline-block';
      }
    }

    document.getElementById('kategoriSelect').addEventListener('change', function() {
      visible = 8; // Reset visible saat ganti filter kategori
      updateVisibility();
    });

    loadMoreBtn.addEventListener('click', function() {
      visible += 4;
      updateVisibility();
    });

    updateVisibility();
  });
</script>
@endsection
