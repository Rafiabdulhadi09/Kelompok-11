<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - FlexStart Bootstrap Template</title>
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">
@include('component.header-user')
  @if(session('notifikasi'))
      <div class="alert alert-success">
          {{ session('notifikasi') }}
      </div>
  @endif
  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">Selamat Datang</h1>
            <h3>{{Auth::User()->name}}</h3>
            <p data-aos="fade-up" data-aos-delay="100">Di platform digital yang menyediakan berbagai kursus dan materi pembelajaran melalui internet. Pengguna dapat mendaftar untuk kursus, mengakses materi belajar seperti video dan artikel, mengerjakan tugas dan ujian, serta berinteraksi dengan instruktur dan peserta lain. Dengan fitur seperti pelacakan kemajuan dan sertifikat penyelesaian, platform ini menawarkan fleksibilitas dalam belajar kapan saja dan di mana saja.</p>
            <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
              <a href="{{ route('kelas.materi') }}" class="btn-get-started">Belajar<i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Values Section -->
    <section id="values" class="values section">
    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>Apa yang mereka katakan tentang kita<br></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                "Tingkat kepuasan saya dengan web kelas online ini sangat tinggi. Materi kursusnya jelas dan terstruktur dengan baik, memungkinkan saya untuk belajar dengan nyaman sesuai waktu saya sendiri. Interaksi dengan pengajar dan peserta lain juga sangat membantu, membuat pengalaman belajar saya menjadi lebih efektif dan menyenangkan."
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-7.jpg" class="testimonial-img" alt="">
                  <h3>Candra</h3>
                  <h4>Pelajar</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                Pengalaman belajar di kelas online ini benar-benar luar biasa! Materi yang disajikan sangat lengkap dan mudah dipahami. Ditambah lagi, instruktur-instrukturnya sangat berpengalaman dan selalu siap membantu kapan saja. Saya merasa keterampilan saya meningkat drastis setelah mengikuti kursus ini. Sangat direkomendasikan untuk siapa saja yang ingin belajar secara fleksibel dan efektif.
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-6.jpg" class="testimonial-img" alt="">
                  <h3>Kiara</h3>
                  <h4>Pelajar</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                Belajar di kelas online ini adalah keputusan terbaik yang pernah saya buat! Saya sangat menyukai fleksibilitasnya, karena saya bisa mengatur waktu belajar sesuai jadwal saya. Materi kursusnya juga sangat relevan dengan kebutuhan industri saat ini, dan cara penyampaiannya interaktif sehingga saya tetap termotivasi untuk belajar. Saya sudah merekomendasikan situs ini kepada teman-teman say
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-8.jpg" class="testimonial-img" alt="">
                  <h3>Jeni</h3>
                  <h4>Mahauser</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                Saya sangat puas dengan pengalaman belajar di kelas online ini. Kualitas materi yang diberikan sangat tinggi, dan platformnya mudah digunakan, bahkan untuk pemula sekalipun. Setiap kursus dilengkapi dengan video, kuis, dan latihan yang membantu saya memahami topik dengan lebih mendalam. Selain itu, dukungan dari tim pengajar juga sangat responsif. Belajar di sini benar-benar membantu saya mencapai tujuan belajar saya!
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-9.jpg" class="testimonial-img" alt="">
                  <h3>Khaider</h3>
                  <h4>Mahauser</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                Belajar di kelas online ini benar-benar luar biasa! Materinya praktis dan aplikatif, dengan instruktur yang ahli di bidangnya. Saya sangat menghargai fleksibilitas waktu dan akses seumur hidup ke kursus-kursusnya. Dukungan komunitas yang aktif juga membuat belajar jadi lebih menyenangkan. Ini adalah investasi terbaik untuk pengembangan diri saya!
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-10.jpg" class="testimonial-img" alt="">
                  <h3>Haikal</h3>
                  <h4>Pelajar</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

      </section><!-- /Services Section -->

    <!-- Team Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tentang</h2>
        <p>Kelas Online</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-5">

          <div class="col-xl-7 d-flex order-2 order-xl-1" data-aos="fade-up" data-aos-delay="200">

            <div class="row align-self-center gy-5">

              <div class="col-md-6 icon-box">
                <i class="bi bi-clipboard-data-fill"></i>
                <div>
                  <h4>Pengembangan Soft & Hard Skill</h4>
                  <p>Kurikulum kami telah dirancang secara khusus untuk memberi kamu landasan kokoh dalam kedua aspek ini, mempersiapkan kamu untuk menghadapi tantangan karir yang kompleks</p>
                </div>
              </div><!-- End Feature Item -->

              <div class="col-md-6 icon-box">
                <i class="bi bi-camera-reels"></i>
                <div>
                  <h4>Metode pembelajaran</h4>
                  <p>Melalui video interaktif, modul pembelajaran, kuis, dan proyek praktis, Anda akan mendapatkan pengalaman belajar yang menyeluruh dan mendalam.</p>
                </div>
              </div><!-- End Feature Item -->

              <div class="col-md-6 icon-box">
                <i class="bi bi-journal-code"></i>
                <div>
                  <h4>Jadwal pembelajaran</h4>
                  <p>Kelas coding kami dirancang untuk memandu Anda dari dasar hingga mahir, dengan jadwal yang fleksibel dan dapat disesuaikan dengan waktu Anda. </p>
                </div>
              </div>
              <!-- End Feature Item -->

            </div>

          </div>

          <div class="col-xl-5 d-flex align-items-center order-1 order-xl-2" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/alt-features.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>

    </section><!-- /Alt Features Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Belajar</h2>
  <p>Pembelajaran di website <br></p>
</div><!-- End Section Title -->

<div class="container">

  <div class="row gy-4">

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
      <div class="service-item item-cyan position-relative">
        <i class="bi bi-activity icon"></i>
        <h3>Pengembangan Kemampuan</h3>
        <p>Kurikulum kami telah dirancang secara khusus untuk memberi kamu landasan kokoh dalam aspek kemampuan, mempersiapkan kamu untuk menghadapi tantangan karir yang kompleks</p>
        <a href="#" class="read-more stretched-link"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
      </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
      <div class="service-item item-orange position-relative">
        <i class="bi bi-broadcast icon"></i>
        <h3>Metode Pembelajaran</h3>
        <p>Melalui video interaktif, modul pembelajaran, Anda akan mendapatkan pengalaman belajar yang menyeluruh dan mendalam.</p>
        <a href="#" class="read-more stretched-link"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
      </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
      <div class="service-item item-teal position-relative">
        <i class="bi bi-easel icon"></i>
        <h3>Jadwal pembelajaran</h3>
        <p>Kursus Online kami dirancang untuk memandu Anda dari dasar hingga mahir, dengan jadwal yang fleksibel dan dapat disesuaikan dengan waktu Anda.</p>
        <a href="#" class="read-more stretched-link"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
      </div>
    </div><!-- End Service Item -->

  </div>

</div>

</section><!-- /Services Section -->
  </main>

  <footer id="footer" class="footer">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
        <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">SMK NEGERI 1 KAWALI</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Jalan. Talagasari No. 35 Kawalimukti Kawali Ciamis 46253</p>
            <p class="mt-3"><strong>Phone:</strong> <span>(0265) 791727</span></p>
            <p><strong>Email:</strong> <a href="mailto:smkn1kawali@gmail.com"><span style="font-size: 17px;">smkn1kawali@gmail.com</span></a></p>

          </div>
        </div>
        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Tautan</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="/user#hero" class="{{ request()->is('user') ? 'active' : '' }}">Dashboard</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="/user#testimonials" class="{{ request()->is('user#testimonials') ? 'active' : '' }}">Testimonials</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="/user#about" class="{{ request()->is('user#about') ? 'active' : '' }}">Tentang</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="/user#services" class="{{ request()->is('user#services') ? 'active' : '' }}">Pembelajaran</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Layanan Kami</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ url('user/kelas') }}" class="{{ request()->is('user/kelas') ? 'active' : '' }}">Kelas</a></li>
            <li><i class="bi bi-chevron-right"></i>  <a href="{{ route('kelas.materi') }}" class="{{ request()->routeIs('kelas.materi') ? 'active' : '' }}">Materi</a>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
        <h4>Ikuti Kami</h4>
          <p>Terhubung dengan kami di platform media sosial dan dapatkan informasi terbaru tentang kursus dan materi pembelajaran langsung di feed Anda!</p>
              <div class="social-links d-flex">
                @if ($sosmed)
                @foreach ($sosmed as $sosmed)
                <div class="social-links d-flex">
                <a href="{{ $sosmed->x}}"><i class="bi bi-twitter"></i></a>
                <a href="{{ $sosmed->instagram}}"><i class="bi bi-instagram"></i></a>
                <a href="{{ $sosmed->youtube}}"><i class="bi bi-youtube"></i></a>
            </div>
              @endforeach
                @endif
              </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>