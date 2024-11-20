<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Materi Bab - Platform Belajar</title>
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
            background-color: #f5f7fa; /* Latar belakang abu-abu terang */
            color: #000000; /* Teks berwarna hitam */
        }

        h1, h5 {
            color: #000000; /* Judul dan subjudul berwarna hitam */
            font-weight: bold; /* Membuat judul tebal */
        }

        .custom-card h1 {
            color: #000000; /* Warna judul materi hitam */
            font-weight: bold; /* Membuat judul tebal */
        }

        .custom-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
            width: 100%; /* Membuat card memanjang ke kanan */
            max-width: 100%; /* Menetapkan lebar maksimum agar 100% */
        }

        .custom-card p {
            color: #000000; /* Warna teks isi hitam */
        }

        .btn-info {
            background-color: #007bff; /* Warna biru pada tombol */
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-info:hover {
            background-color: #0056b3; /* Warna biru lebih gelap saat hover */
        }

        .container {
            margin-top: 100px;
            margin-bottom: 50px;
        }

        .row {
            display: flex; /* Memastikan row menggunakan flexbox */
            flex-wrap: wrap; /* Mengizinkan item untuk membungkus ke baris baru */
        }

        .col-md-6, .col-lg-4 {
            flex: 1; /* Membuat kolom mengambil ruang yang sama */
            margin-right: 15px; /* Menambahkan jarak di antara kolom */
            margin-bottom: 15px; /* Menambahkan jarak di bawah kolom */
        }

        .modal-header, .modal-footer {
            background-color: #007bff; /* Warna modal biru */
            color: white;
        }

        .modal-body input {
            border: 1px solid #007bff; /* Warna border input */
        }

        .alert-warning {
            background-color: #f8d7da;
            color: #721c24;
        }

        @media (max-width: 768px) {
            .custom-card {
                width: 100%; /* Card akan menggunakan 100% lebar pada tampilan kecil */
            }
        }
    </style>
</head>

<body>
    <!-- Include header -->
    @include('component.header-user')
    
    <!-- Section untuk konten -->
    <div class="container">
        <h1>Bab:</h1>

        @if($submateri->materi->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                <i class="bi bi-exclamation-circle-fill"></i> Tidak ada materi untuk materi ini.
            </div>
        @else
            <div class="row">
                @foreach($submateri->materi as $item)
                    <div class="col-md-6 col-lg-4"> <!-- Anda dapat menyesuaikan jumlah kolom -->
                        <div class="custom-card" data-aos="fade-up" data-aos-delay="100">
                            <h1 class="h5">{{ $item->title }}</h1>
                            <p>{{ $item->content }}</p>
                            <button class="btn btn-info text-light">
                                <a href="{{ route('submateri.user', [$item->id]) }}" class="text-white">Akses Materi</a>
                            </button>
                        </div>
                    </div>
                @endforeach
                @endif
                    @if($kuis->isNotEmpty())
                        @if ($nilai < 80)
                            <a href="{{ route('user.kuis', $submateri->id) }}" class="btn btn-primary">Jawab Kuis</a>
                        @else
                        <form action="{{ route('sertifikat') }}" method="POST">
                            @csrf
                        <button type="submit" class="btn btn-success btn-block text-white form-control">Cetak Sertifikat</button>
                        </form>
                        @endif
                    @else
                        <p>Kuis belum tersedia untuk kelas ini</p>
                    @endif
            </div>
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
