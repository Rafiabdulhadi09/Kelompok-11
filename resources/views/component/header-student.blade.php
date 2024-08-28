<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">
    <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('assets/img/logo.png') }}" alt="">
        <h1 class="sitename">Kelas Online</h1>
    </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/student#hero" class="active">Dashboard<br></a></li>
          <li><a href="/student#testimonials">Testimonials</a></li>
          <li><a href="/student#about">About</a></li>
          <li><a href="/student#pembelajaran">pembelajaran</a></li>
          <li><a href="{{ 'student/kelas' }}">Kelas</a></li>
          <li class="dropdown"><a href="#">  <img
                    class="img-profile rounded-circle"
                    src="{{ asset('assets/img/testimonials/testimonials-8.jpg') }}" width="35"/> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
              <li><a href="{{ 'student/profil' }}">Profil</a></li>
              <li><a href="logout">Logout</a></li>
          </ul>
          </li>
        </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
  </div>
</header>
