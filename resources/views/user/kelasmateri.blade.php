<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">  
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
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
                font-size: 2rem;
                font-weight: 600;
                color: #4a4a4a;
            }

            /* Custom card style */
            .custom-card {
                border-radius: 10px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                background-color: #fff;
                padding: 20px;
                margin-bottom: 20px;
                transition: all 0.3s ease;
            }

            .custom-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            }

            .custom-card img {
                border-radius: 10px;
            }

            .custom-card h1 {
                font-size: 1.5rem;
                font-weight: 500;
                margin-top: 0;
                color: #007bff;
            }

            .custom-card p {
                font-size: 1rem;
                color: #555;
            }

            /* Custom button style */
            .btn-primary {
                background-color: #007bff;
                border: none;
                font-size: 1rem;
                font-weight: 500;
                padding: 10px 20px;
                border-radius: 30px;
                transition: background-color 0.3s ease, transform 0.3s ease;
            }

            .btn-primary:hover {
                background-color: #0056b3;
                transform: translateY(-3px);
            }

            /* Make sure the container is responsive */
            .container {
                max-width: 1140px;
                margin: 0 auto;
                padding: 20px;
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .custom-card {
                    padding: 15px;
                }

                .custom-card h1 {
                    font-size: 1.25rem;
                }

                .custom-card p {
                    font-size: 0.9rem;
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
            @foreach ($kelas as $item)
            <!-- Bab -->
            <div class="custom-card border border-dark-subtle" data-aos="fade-up">
                <div class="row">
                    <div class="col-md-2">
                        @if($item->kelas->image)
                            <img src="{{ asset('storage/' . $item->kelas->image) }}" alt="Poto Kelas" width="160">
                        @else
                            <em>Belum ada poto</em>
                        @endif
                    </div>
                    <div class="col-md-10">
                        <h1>{{ $item->kelas->title }}</h1>
                        <!-- Kolom Deskripsi (vertical layout) -->
                        <p>{{ $item->kelas->description }}</p>

                        <!-- Akses Materi Button -->
                        <button class="btn btn-primary"><a href="{{route ('materi.user',$item->id) }}" class="text-light">Akses Materi</a></button>
                    </div>
                </div>
            </div>
            @endforeach
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
