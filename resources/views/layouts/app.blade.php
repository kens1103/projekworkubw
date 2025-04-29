<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wikrama</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- GLightbox CSS -->
    <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">

    <style>
      .section-title {
          font-size: 2rem;
          margin-bottom: 1.5rem;
      }
      .portfolio-wrap {
          position: relative;
          overflow: hidden;
      }
      .portfolio-info {
          position: absolute;
          bottom: 0;
          background: rgba(0, 128, 0, 0.8);
          color: #fff;
          width: 100%;
          text-align: center;
          padding: 10px;
          transition: 0.3s;
          opacity: 0;
      }
      .portfolio-wrap:hover .portfolio-info {
        opacity: 1;
      }
      @keyframes floating {
          0% { transform: translateY(0px); }
          50% { transform: translateY(-10px); }
          100% { transform: translateY(0px); }
      }
      .floating-image {
          animation: floating 3s ease-in-out infinite;
          max-width: 400px;
          height: auto;
          display: block;
          margin: 0 auto;
          padding-top: 30px;
      }
      #aboutCarousel .carousel-inner {
        height: 400px;
      }
      #aboutCarousel .carousel-item img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        object-position: center;
      }
      .img-hover-zoom-dark {
        transition: transform 0.5s ease, filter 0.5s ease;
      }
      .img-hover-zoom-dark:hover {
        transform: scale(1.05);
        filter: brightness(85%);
      }
    </style>
</head>
<body>

  {{-- Navbar --}}
  @include('partials.navbar')
  
  {{-- Main Content --}}
  <main>
    @yield('content')
  </main>

  {{-- Footer --}}
  @include('partials.footer')

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

  <!-- GLightbox JS -->
  <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

  <!-- Isotope JS -->
  <script src="https://unpkg.com/isotope-layout@3.0.6/dist/isotope.pkgd.min.js"></script>

  <script>
    // Inisialisasi AOS (Animate On Scroll)
    document.addEventListener('DOMContentLoaded', function() {
      AOS.init({
        duration: 1200, // Durasi animasi dalam milidetik
        easing: 'ease-in-out', // Jenis easing
        once: true // Animasi hanya dijalankan sekali saat elemen muncul
      });
    });

    // GLightbox
    const lightbox = GLightbox({
      selector: '.glightbox'
    });

    // Isotope filter
    const portfolioContainer = document.querySelector('.portfolio-container');
    if (portfolioContainer) {
      const iso = new Isotope(portfolioContainer, {
        itemSelector: '.portfolio-item',
        layoutMode: 'fitRows'
      });

      document.querySelectorAll('#portfolio-flters li').forEach(el => {
        el.addEventListener('click', function () {
          document.querySelectorAll('#portfolio-flters li').forEach(li => li.classList.remove('filter-active'));
          this.classList.add('filter-active');

          iso.arrange({ filter: this.getAttribute('data-filter') });
        });
      });
    }
  </script>
</body>
</html>
