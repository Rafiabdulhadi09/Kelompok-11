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
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">  
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
    </head>
    <body>
        <!-- Include header -->
        @include('component.header-user')

        <!-- Section untuk konten -->
        <br><br><br><br><br>

        <!-- Materi Section -->
        <div class="container">
            <h1>Belajar</h1>
            
           <!-- Bab 1 -->
            <div class="custom-card border border-dark-subtle">
                <div class="row">
                    <div class="col-md-2">
                        <div class="custom-img-placeholder">
                            <i class="bi bi-image"></i>
                        </div>
                    </div>
                    <div class="col-md-10">
                       <h1>Judul Kelas</h1>
                        <!-- Kolom Deskripsi (vertical layout) -->
                       <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus hic nulla harum ducimus est quasi distinctio omnis provident placeat mollitia! Eos magni suscipit minima tempore doloremque obcaecati molestias provident? Tempora.</p>

                        <!-- Akses Materi Button -->
                        <button class="btn btn-primary"><a href="{{route ('materi.user')}}" class="text-light">Akses Materi</a></button>
                    </div>
                </div>
            </div>
           <!-- Bab 1 -->
            <div class="custom-card border border-dark-subtle">
                <div class="row">
                    <div class="col-md-2">
                        <div class="custom-img-placeholder">
                            <i class="bi bi-image"></i>
                        </div>
                    </div>
                    <div class="col-md-10">
                       <h1>Judul Kelas</h1>
                        <!-- Kolom Deskripsi (vertical layout) -->
                       <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus hic nulla harum ducimus est quasi distinctio omnis provident placeat mollitia! Eos magni suscipit minima tempore doloremque obcaecati molestias provident? Tempora.</p>

                        <!-- Akses Materi Button -->
                        <button class="btn btn-primary"><a href="{{route ('materi.user')}}" class="text-light">Akses Materi</a></button>
                    </div>
                </div>
            </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('assets/js/scripts-kelas.js') }}"></script>
    </body>
</html>
