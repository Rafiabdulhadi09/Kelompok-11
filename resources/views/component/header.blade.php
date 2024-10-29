<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo.png" alt="">
        @foreach ($sosialmedia as $item)
            <h1 class="sitename">{{ $item->nama_perusahaan }}</h1>
        @endforeach
      </a>

      <nav id="navmenu" class="navmenu">
        <ul class="p-3 mb-2 bg-white text-dark">
          <li><a href="/#hero" class="{{ Request::is('/') ? 'active' : '' }}">Dashboard</a></li>
          <li><a href="/#testimonials" class="{{ Request::is('#testimonials') ? 'active' : '' }}">Testimonials</a></li>
          <li><a href="/#pembelajaran" class="{{ Request::is('#pembelajaran') ? 'active' : '' }}">Pembelajaran</a></li>
          <li><a href="/#about" class="{{ Request::is('#about') ? 'active' : '' }}">About</a></li>
          <li><a href="{{ url('kursus') }}" class="{{ Request::is('kursus') ? 'active' : '' }}">Kelas</a></li>
         <div class="row">
          <div class="col">
              <a class="btn btn-primary text-white d-block d-md-none" href="{{ url('login') }}">Login</a>
          </div>
          <div class="col">
              <a class="btn btn-primary text-white d-block d-md-none" href="{{ route('register') }}">Register</a>
          </div>
        </div>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <a class="btn-getstarted flex-md-shrink-0 d-none d-md-block" href="{{ url('login') }}">Login</a>
      <a class="btn-getstarted flex-md-shrink-0 d-none d-md-block" href="{{ route('register') }}">Register</a>
    </div>
</header>
