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
          <li><a href="/user#services">pembelajaran</a></li>
          <li><a href="{{ url('user/kelas') }}">Kelas</a></li>
          <li><a href="{{ route ('materi.user') }}">Materi</a></li>
          <li class="dropdown"><a href="#">
         @if(isset($user) && $user->image)
        <img class="img-profile rounded-circle position-absolute top-50 start-50 translate-middle" src="{{ asset('storage/profile_images/' . $user->image) }}" alt="{{ $user->image }}" width="35">
        @else
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="35" class="position-absolute top-50 start-50 translate-middle">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
    @endif
    
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
