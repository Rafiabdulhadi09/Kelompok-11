<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Materi Bab - Platform Belajar</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">      
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
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .custom-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .custom-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }

        .custom-card h1 {
            font-size: 20px;
            font-weight: 600;
            color: #343a40;
        }

        .custom-card p {
            font-size: 14px;
            color: #6c757d;
        }

        .btn {
            background-color: #38bdf8;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 500;
            border-radius: 50px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0284c7;
        }

        .btn a {
            color: #ffffff;
            text-decoration: none;
        }

        .container {
            margin-top: 100px;
            margin-bottom: 50px;
        }

        .container h1 {
            font-size: 32px;
            font-weight: 700;
            color: #3b82f6;
            margin-bottom: 40px;
        }

        @media (max-width: 768px) {
            .custom-card h1 {
                font-size: 18px;
            }

            .custom-card p {
                font-size: 12px;
            }

            .btn {
                font-size: 12px;
                padding: 8px 16px;
            }

            .container h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <!-- Include header -->
    @include('component.header-user')

    <!-- Section untuk konten -->
    <div class="container">
        <h1>Materi untuk Bab:</h1>

        @if($submateri->materi->isEmpty())
            <p>Tidak ada sub materi untuk materi ini.</p>
        @else
            <div class="row">
                @foreach($submateri->materi as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="custom-card" data-aos="fade-up" data-aos-delay="100">
                            <h1 class="h5">{{ $item->title }}</h1>
                            <p>{{ Str::limit($item->content, 100) }}</p>
                            <button class="btn">
                                <a href="{{ route('submateri.user', [ $item->id]) }}">Akses Materi</a>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- AOS Animation Script -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
