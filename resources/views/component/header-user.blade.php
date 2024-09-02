<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">
    <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('assets/img/logo.png') }}" alt="">
        <h1 class="sitename">Kelas Online</h1>
    </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/user#hero" class="active">Dashboard<br></a></li>
          <li><a href="/user#testimonials">Testimonials</a></li>
          <li><a href="/user#about">About</a></li>
          <li><a href="/user#pembelajaran">pembelajaran</a></li>
          <li><a href="{{ url('user/kelas') }}">Kelas</a></li>
          <li class="dropdown"><a href="#">  <img
                    class="img-profile rounded-circle position-absolute top-50 start-50 translate-middle "
                    src="{{ asset('assets/img/testimonials/testimonials-8.jpg') }}" width="35" /></a>
          <ul>
              <li><a href="{{ route('profile') }}">Profil</a></li>
              <li><a href="{{ url('logout') }}">Logout</a></li>
          </ul>
          </li>
        </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
  </div>
</header>
