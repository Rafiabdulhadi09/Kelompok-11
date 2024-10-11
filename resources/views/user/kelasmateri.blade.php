<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Materi Belajar - Platform Belajar</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
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
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #007bff;
            margin-bottom: 40px;
        }

        /* Custom card style */
        .custom-card {
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 20px;
            margin-bottom: 30px;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .custom-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .custom-card img {
            width: 100%;
            height: auto;
            border-radius: 15px;
            margin-bottom: 15px;
        }

        .custom-card h1 {
            font-size: 1.75rem;
            font-weight: 600;
            color: #343a40;
            margin-bottom: 15px;
        }

        .custom-card p {
            font-size: 1rem;
            color: #555;
            margin-bottom: 20px;
        }

        /* Custom button style */
        .btn-primary {
            background-color: #007bff;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 30px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            display: inline-block;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        .btn-primary a {
            color: #ffffff;
            text-decoration: none;
        }

        /* Make sure the container is responsive */
        .container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .custom-card {
                padding: 15px;
            }

            .custom-card h1 {
                font-size: 1.5rem;
            }

            .custom-card p {
                font-size: 0.9rem;
            }

            .container {
                padding: 20px 10px;
            }
        }
    </style>
</head>

<body>
    <!-- Include header -->
    @include('component.header-user')

    <!-- Section untuk konten -->
    <br><br><br><br><br>

    <!-- Materi Section -->
    <div class="container">
        <h1>Belajar</h1>
        @if ($kelas->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                <i class="bi bi-exclamation-circle-fill"></i> Tidak ada kelas/anda belum membeli kelas 
            </div>
        @else
               @foreach ($kelas as $item)
        <!-- Bab -->
        <div class="custom-card border border-dark-subtle" data-aos="fade-up">
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
                    <!-- Kolom Deskripsi (vertical layout) -->
                    <p>{{ Str::limit($item->kelas->description, 200) }}</p>
                    <!-- Akses Materi Button -->
                    <button class="btn btn-primary">
                        <a href="{{ route('materi.user', $item->kelas->id) }}" class="text-light">Akses Materi</a>
                    </button>
                </div>
            </div>
        </div>
        @endforeach 
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
</body>

</html>
