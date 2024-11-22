<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
      <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
      @foreach ($sosmed as $item)
        <h1 class="sitename">{{ $item->nama_perusahaan }}</h1>
      @endforeach
    </a>

    <nav id="navmenu" class="navmenu">
      <ul class="nav d-flex mb-0">
        <li class="nav-item">
          <a href="/user#hero" class="nav-link {{ request()->is('user') ? 'active' : '' }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a href="/user#testimonials" class="nav-link {{ request()->is('user#testimonials') ? 'active' : '' }}">Testimonials</a>
        </li>
        <li class="nav-item">
          <a href="/user#about" class="nav-link {{ request()->is('user#about') ? 'active' : '' }}">Tentang</a>
        </li>
        <li class="nav-item">
          <a href="/user#services" class="nav-link {{ request()->is('user#services') ? 'active' : '' }}">Pembelajaran</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('user.kelas') }}" class="nav-link {{ request()->is('user/kelas') ? 'active' : '' }}">Kelas</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('kelas.materi') }}" class="nav-link {{ request()->routeIs('kelas.materi') ? 'active' : '' }}">Materi</a>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="d-flex align-items-center">
              @if(isset($user) && $user->image)
                <img class="img-profile rounded-circle me-2" src="{{ asset('storage/profile_images/' . $user->image) }}" width="40" height="40" alt="User Image">
              @else
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="35" class="me-2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
              @endif
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">Profil</a></li>
            <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
          </ul>
        </li>
      </ul>
      <button class="mobile-nav-toggle d-xl-none bi bi-list" aria-label="Toggle navigation"></button>
    </nav>
  </div>
</header>
