<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo.png" alt="">
        <h1 class="sitename">Kelas Online</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
<<<<<<< HEAD
          <li><a href="/#hero" class="active">Dashboard<br></a></li>
          <li><a href="/#testimonials">Testimonials</a></li>
          <li><a href="/#pembelajaran">Pembelajaran</a></li>
          <li><a href="/#about">Tentang</a></li>
          <li><a href="{{ route('kursus') }}">Kelas</a></li>
=======
          <li><a href="/#hero" class="{{ Request::is('/') ? 'active' : '' }}">Dashboard</a></li>
          <li><a href="/#testimonials" class="{{ Request::is('#testimonials') ? 'active' : '' }}">Testimonials</a></li>
          <li><a href="/#pembelajaran" class="{{ Request::is('#pembelajaran') ? 'active' : '' }}">Pembelajaran</a></li>
          <li><a href="/#about" class="{{ Request::is('#about') ? 'active' : '' }}">About</a></li>
          <li><a href="{{ url('kursus') }}" class="{{ Request::is('kursus') ? 'active' : '' }}">Kelas</a></li>
>>>>>>> e67e6407debe2830bcd376247864b6a5b1ffca6f
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted flex-md-shrink-0" href="{{ url('login') }}">Login</a>
      <a class="btn-getstarted flex-md-shrink-0" href="{{ route('register') }}">Register</a>

    </div>
</header>
