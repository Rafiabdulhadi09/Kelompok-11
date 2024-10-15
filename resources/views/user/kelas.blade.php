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
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">      
        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
        
        <!-- Main CSS File -->
        <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
        <style>
            /* Animasi hover pada kartu */
            .card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .card:hover {
                transform: scale(1.05);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            }

            /* Animasi tombol */
            .btn-primary {
                transition: background-color 0.3s ease, transform 0.3s ease;
            }
            .btn-primary:hover {
                background-color: #0056b3;
                transform: translateY(-5px);
            }
        </style>
    </head>
    <body>
        @include('component.header-user')
        <!-- Section-->
        <br><br><br>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5" data-aos="fade-up">
            @if ($data->isEmpty())
                <div class="alert alert-warning text-center" role="alert">
                    <i class="bi bi-exclamation-circle-fill"></i> Tidak ada kelas yang tersedia untuk saat ini atau kelas telah di-approve.
                </div>
            @endif
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($data as $item)
                    <div class="col mb-5" data-aos="zoom-in" data-aos-delay="100">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ asset('storage/' . $item->image) }}" width="450" height="130" />
                            <!-- Product details-->
                            <div class="card-body">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <p class="text-start"><small><b>{{ Str::limit($item['title'], 35) }}</b></small></p>
                                    <!-- Product price-->
                                    <p class="text-start">
                                        @if($item->trainers->isNotEmpty())
                                            @foreach($item->trainers as $trainer)
                                                <img class="img-profile rounded-circle" src="{{ asset('storage/profile_trainer/' . $trainer->image) }}" alt="{{ $trainer->image }}" width="25">
                                            @endforeach
                                            @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="25">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
                                        @endif |     
                                                @if($item->trainers->isNotEmpty())
                                                    @foreach($item->trainers as $trainer)
                                                        <small>{{ $trainer->name }}</small>
                                                    @endforeach
                                                @else
                                                    <small>Belum ada trainer</small>
                                                @endif</p>
                                    <p class="text-start "><small>{{ formatRupiah($item->price) }}</small></p>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="d-grid gap-2 col-6 mx-auto mb-3">
                                <a href="{{route('user.payment', $item->id)}}"><button class="btn btn-primary">Beli Kelas</button></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
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
