<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Materi Belajar - Platform Belajar</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/materi.css') }}">

    <!-- Custom CSS -->
    <style>
        /* Navbar Fix */
        body {
            padding-top: 60px; /* Reduced padding to move content up */
        }

        /* Custom card style */
        .custom-card {
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 15px;
            transition: all 0.3s ease;
            overflow: hidden;
            text-align: center; /* Align text to center */
        }

        .custom-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .custom-card img {
            width: 100%;
            height: 150px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .custom-card h1 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #343a40;
            margin-bottom: 10px;
        }

        .custom-card p {
            font-size: 0.9rem;
            color: #555;
        }

        .btn-primary {
            display: inline-block;
            text-align: center;
        }

        .container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Custom H1 style */
        h1.text-center {
            color: #000; /* Set color to black */
            font-size: 2rem; /* Increase font size */
            margin-bottom: 40px; /* Ensure space below the heading */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .custom-card {
                padding: 10px;
            }

            .custom-card h1 {
                font-size: 1.1rem;
            }

            .custom-card p {
                font-size: 0.85rem;
            }
        }
    </style>
</head>

<body>
    <!-- Include header -->
    @include('component.header-user')

    <!-- Materi Section -->
    <div class="container">
        <h1 class="text-center">Belajar</h1>
        @if ($kelas->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                <i class="bi bi-exclamation-circle-fill"></i> Tidak ada kelas/anda belum membeli kelas 
            </div>
        @else
            @foreach ($kelas as $item)
                <!-- Bab -->
                <div class="custom-card border border-dark-subtle mb-4" data-aos="fade-up">
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            @if($item->kelas->image)
                                <img src="{{ asset('storage/' . $item->kelas->image) }}" alt="Foto Kelas">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=No+Image+Available" alt="Belum ada foto">
                            @endif
                        </div>
                        <div class="col-md-9">
                            <h1>{{ $item->kelas->title }}</h1>
                            <p>{{ Str::limit($item->kelas->description, 200) }}</p>
                            <!-- Akses Materi Button -->
                            <button class="btn btn-primary">
                                <a href="{{ route('materi.user', ['id' => $item->kelas->id, 'kelasId' => $item->kelas->id, 'userId' => auth()->id()]) }}" class="text-light">Akses Materi</a>
                            </button>
                            @if($kuis->isNotEmpty())
                                <a class="btn btn-primary" href="{{ route('user.kuis', $kuis->first()->kelas_id) }}">Jawab Kuis</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>
    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
