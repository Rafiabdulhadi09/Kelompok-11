<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link
      href="assets/vendor-admin/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet" />
    @include('component.NavbarTrainerProfile')
</head>
<body>
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row d-flex justify-content-center">
      <!-- Card untuk Gambar -->
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
<<<<<<< HEAD
         @if(isset($trainer) && $trainer->image)
              <img src="{{ asset('storage/profile_trainer/' . $trainer->image) }}" alt="{{ $trainer->image }}" width="150">
          @else
              <p>Gambar profil tidak tersedia</p>
          @endif
=======
          @if(isset($trainer) && $trainer->image)
            <img src="{{ asset('storage/profile_trainer/' . $trainer->image) }}" alt="{{ $trainer->image }}" width="150">
            @else
            <p>Gambar profil tidak tersedia</p>
            @endif
>>>>>>> 7f4d5df9e725c6eef0c2a91bc9315ebe1fe08e74
            <h5 class="my-3">{{ $trainer->name }}</h5>
            <div class="d-grid gap-2 col-6 mx-auto">
              <a href="{{ url('profiletrainer/edit') }}" class="btn btn-primary text-white">Edit Profil</a>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Card untuk Form Profil -->
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nama Lengkap</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Jenis Kelamin</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->jk }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Alamat</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->alamat }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Keahlian</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->keahlian}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor-admin/jquery/jquery.min.js"></script>
    <script src="assets/vendor-admin/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor-admin/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for
