@extends('layouts.app')

@section('content')

<!-- Hero Section for About Page -->
<section class="py-5 bg-light" id="about">
  <div class="container">

    <!-- Slider Foto -->
    <div id="aboutCarousel" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-interval="2000">
        <div class="carousel-inner rounded-4 shadow" style="height: 400px;">
            <div class="carousel-item active">
                <img src="/img/satpam.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Slide 1" data-aos="fade-up">
            </div>
            <div class="carousel-item">
                <img src="/img/ruangpmn.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Slide 2" data-aos="fade-up">
            </div>
            <div class="carousel-item">
                <img src="/img/ruangtjkt.jpg" class="d-block w-100 h-100 object-fit-cover" alt="Slide 3" data-aos="fade-up">
            </div>
        </div>
    </div>

    <!-- Section Foto dan Teks -->
    <h1 class="display-4 text-center mb-5 fw-bold">Tentang Kami</h1>
    <div class="row align-items-center g-5">
      <div class="col-lg-6" data-aos="fade-right">
        <img src="/img/produklayanan.jpg" alt="Tentang Kami" class="img-fluid rounded-4 shadow">
      </div>
      <div class="col-lg-6" data-aos="fade-left">
        <p class="lead text-muted">
        Usaha Bersama Wikrama adalah unit bisnis yang dikelola oleh Teaching Factory 
        Wikrama Satu Garut, sebagai wujud nyata penerapan pendidikan berbasis industri. 
        Kami berkomitmen untuk menghubungkan dunia pendidikan dengan kebutuhan dunia 
        usaha melalui penyediaan berbagai produk dan layanan berkualitas. Melalui 
        kolaborasi antara peserta didik, guru, dan mitra industri, kami mengembangkan 
        layanan profesional di bidang teknologi, administrasi, jaringan, serta hospitality. 
        Usaha Bersama Wikrama tidak hanya menghadirkan solusi inovatif untuk masyarakat, 
        tetapi juga menjadi sarana pembelajaran nyata bagi peserta didik dalam membentuk 
        kompetensi, karakter, dan daya saing di era global.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Our Mission and Vision Section -->
<section class="py-5">
  <div class="container">
    <div class="row g-4 align-items-stretch">
    <h1 class="display-4 text-center mb-5 fw-bold">Visi & Misi</h1>
      
        <!-- Misi -->
        <div class="col-12 col-md-6">
            <div class="card h-100 shadow rounded-4" data-aos="fade-up">
                <div class="card-body d-flex flex-column p-4">
                    <h2 class="card-title text-center mb-3">Visi Kami</h2>
                    <p class="card-text flex-grow-1">
                        "Menjadi pusat pengembangan usaha berbasis pendidikan yang inovatif, profesional, dan berdaya saing global."
                    </p>
                </div>
            </div>
        </div>

        <!-- Visi -->
        <div class="col-12 col-md-6">
            <div class="card h-100 shadow rounded-4" data-aos="fade-up">
                <div class="card-body d-flex flex-column p-4">
                    <h2 class="card-title text-center mb-3">Misi Kami</h2>
                    <p class="card-text flex-grow-1">
                    Menyelenggarakan layanan dan produk yang berkualitas melalui penerapan sistem Teaching Factory.
                    Menumbuhkan jiwa kewirausahaan dan profesionalisme peserta didik melalui pengalaman dunia nyata.
                    Membangun kemitraan yang erat antara dunia pendidikan dan dunia industri.
                    Mendorong inovasi berkelanjutan dalam bidang teknologi, administrasi, jaringan, dan hospitality.
                    Memberikan kontribusi positif bagi pengembangan ekonomi lokal dan masyarakat sekitar.
                    </p>
                </div>
            </div>
        </div>

    </div>
  </div>
</section>

<!-- Why Us Section -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center g-5">
      
      <!-- Gambar -->
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

      <!-- Teks -->
      <div class="col-lg-6" data-aos="fade-left">
        <img src="/img/3.png" alt="Kenapa Memilih Kami" class="img-fluid rounded-4 shadow">
      </div>

    </div>
  </div>
</section>

@endsection
