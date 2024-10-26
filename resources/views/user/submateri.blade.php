<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Materi User</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/materi.css') }}">
                <style>
                body {
                font-family: 'Poppins', sans-serif;
                background-color: #f8f9fc;
            }

            /* Tambahkan jarak antara header dan konten */
            .container {
                margin-top: 50px; /* Atau sesuaikan jaraknya */
                padding-top: 50px;
            }

            .custom-card {
                cursor: pointer;
                transition: transform 0.3s, box-shadow 0.3s;
                border-radius: 10px;
            }

            .custom-card:hover {
                transform: scale(1.05);
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            }

            .custom-card h4 {
                font-weight: 600;
                color: #333;
            }

            .custom-card .btn {
                margin-top: 10px;
                background-color: #007bff;
                border: none;
                border-radius: 5px;
                font-weight: 500;
                text-transform: uppercase;
            }

            .custom-card .btn:hover {
                background-color: #0056b3;
            }

            .custom-card .btn a {
                color: #fff;
                text-decoration: none;
            }

            .custom-card .btn a:hover {
                text-decoration: none;
                color: #f8f9fc;
            }

            .btn-primary i {
                margin-right: 5px;
            }

                </style>
</head>

<body>
    <!-- Include header -->
    @include('component.header-user')

    <!-- Section untuk konten -->

    <!-- Materi Section -->
    <div class="container">
    <h1 class="mb-2" style="color: black;">SubBab:</h1>
        @if($submateri->submateri->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                <i class="bi bi-exclamation-circle-fill"></i> Tidak ada sub materi untuk materi ini.
            </div>
        @else
            <div class="row">
                @foreach($submateri->submateri as $item)
                    <div class="col-md-6 mb-4">
                        <div class="custom-card border border-light shadow p-4">
                            <h4 class="h5">{{ $item->title }}</h4>
                            <button class="btn btn-primary">
                                <i class="bi bi-book-open"></i>
                                <a href="{{ route('belajar.user', ['id' => $item->id, 'materi_id' => $item->materi_id]) }}" class="text-light">Akses Submateri</a>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Vendor JS Files -->
        <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
        <script>
            AOS.init({
                duration: 1000,
                once: true,
            });
        </script>
        <!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
