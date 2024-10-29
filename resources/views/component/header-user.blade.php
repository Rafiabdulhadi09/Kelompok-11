<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">
    <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="{{ asset('assets/img/logo.png') }}" alt="">
        @foreach ($sosmed as $item)
                  <h1 class="sitename">{{ $item->nama_perusahaan }}</h1> 
        @endforeach
    </a>

    <nav id="navmenu" class="navmenu">
      <ul class="p-3 mb-2 bg-white text-dark">
        <li><a href="/user#hero" class="{{ request()->is('user') ? 'active' : '' }}">Dashboard</a></li>
        <li><a href="/user#testimonials" class="{{ request()->is('user#testimonials') ? 'active' : '' }}">Testimonials</a></li>
        <li><a href="/user#about" class="{{ request()->is('user#about') ? 'active' : '' }}">Tentang</a></li>
        <li><a href="/user#services" class="{{ request()->is('user#services') ? 'active' : '' }}">Pembelajaran</a></li>
        <li><a href="{{ url('user/kelas') }}" class="{{ request()->is('user/kelas') ? 'active' : '' }}">Kelas</a></li>
        <li><a href="{{ route('kelas.materi') }}" class="{{ request()->routeIs('kelas.materi') ? 'active' : '' }}">Materi</a></li>
        <li class="dropdown">
          <a href="#">
            <div class="row">
        <div class="col">
             @if(isset($user) && $user->image)
            <img class="img-profile rounded-circle" src="{{ asset('storage/profile_images/' . $user->image) }}" width="40" height="40">
            @else
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="35" class="position-absolute top-50 start-50 translate-middle">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
            @endif
          </div>
        
        </div>
            <ul>
              <li><a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">Profil</a></li>
              <li><a href="{{ url('logout') }}">Logout</a></li>
            </ul>
          </a>
        </li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
  </div>
</header>
