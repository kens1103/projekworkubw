@extends('layouts.app')

@section('content')

<section class="bg-light" id="about">
  <div class="position-relative w-100 overflow-hidden" style="height: 450px;">
    <img src="/img/header.jpg" class="w-100 h-100 object-fit-cover" alt="About Image">
      <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5);"></div>
        <div class="position-absolute top-50 start-50 translate-middle text-white text-center" data-aos="fade-up">
          <h1 class="display-4 fw-bold">TeFa Wisaga</h1>
          <p class="fs-5 mt-3">Tempat Berkarya, Belajar, dan Berkembang Bersama</p>
        </div>
  </div>
</section>

<!-- JUDUL -->
<div class="text-center my-5 px-3" data-aos="fade-down">
  <h1 class="fs-1 fw-bold position-relative d-inline-block">
    Tentang Kami
  </h1>
</div>

<!-- SECTION TENTANG KAMI -->
<div class="row align-items-center g-5">
  <div class="col-lg-6" data-aos="fade-right">
    <img src="{{asset ('/img/produklayanan.jpg')}}" alt="Tentang Kami" class="img-fluid rounded-4 shadow">
  </div>
      <div class="col-lg-6" data-aos="fade-left">
        <p class="lead text-muted">
        {{ $about->title }}
        </p>
      </div>
    </div>
  </div>
</section>

<!-- VISI & MISI -->
<section class="py-5">
  <div class="container">
    <div class="row g-4 align-items-stretch"  data-aos="fade-up">
    <h1 class="display-5 text-center mb-5 fw-bold">Visi & Misi</h1>
      
        <!-- MISI -->
        <div class="col-12 col-md-6">
            <div class="card h-100 shadow rounded-4" data-aos="fade-up">
                <div class="card-body d-flex flex-column p-4">
                    <h2 class="card-title text-center mb-3">Visi Kami</h2>
                    <p class="card-text flex-grow-1">
                    {{ $about->visi }}
                    </p>
                </div>
            </div>
        </div>

        <!-- VISI -->
        <div class="col-12 col-md-6">
            <div class="card h-100 shadow rounded-4" data-aos="fade-up">
                <div class="card-body d-flex flex-column p-4">
                    <h2 class="card-title text-center mb-3">Misi Kami</h2>
                    <p class="card-text flex-grow-1">
                    {{ $about->misi }}
                    </p>
                </div>
            </div>
        </div>

    </div>
  </div>
</section>

<!-- KENAPA HARUS MEMILIH KAMI? -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6" data-aos="fade-right">
        <h2 class="fw-bold mb-3">Kenapa Harus Memilih Kami?</h2>
        <p class="text-muted mb-3">
          Usaha Bersama Wikrama menawarkan solusi yang menghubungkan dunia pendidikan dan industri secara nyata.
          Kami memastikan bahwa setiap produk dan layanan kami memenuhi standar profesional dan inovatif.
        </p>
        <p class="text-muted">
          Melalui pengalaman langsung di dunia industri dengan konsep Teaching Factory, 
          peserta didik kami terlatih menghasilkan karya unggulan yang siap bersaing di tingkat nasional hingga global.
        </p>
      </div>
      <div class="col-lg-6" data-aos="fade-left">
        <img src="/img/3.png" alt="Kenapa Memilih Kami" class="img-fluid rounded-4 shadow">
      </div>
    </div>
  </div>
</section>

@endsection
