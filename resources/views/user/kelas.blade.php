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
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">      
        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

        <!-- Main CSS File -->
        <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    </head>
    <body>
        @include('component.header-user')
        <!-- Section-->
        <br><br><br>
        <section class="py-5 ">
              <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($data as $item)
                    <div class="col mb-5">
                        <div class="shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ asset('storage/' . $item->image) }}" width="450" height="120" />
                            <!-- Product details-->
                            <div class="card-body p-3">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <p class="text-start"><small><b>{{ Str::limit($item['title'], 35) }}</b></small></p>
                                    <!-- Product price-->
                                    <p class="text-start"><img class="img-profile rounded-circle"
                                    src="{{ asset('assets/img/testimonials/testimonials-8.jpg') }}" width="25"/> | <small>Rafi abdul hadi</small></a></p>
                                    <p class="text-start "><small>Rp {{ $item->price }},00</small></p>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-primary" type="button"><a href="/user.payment"><span class="text-white">buy</span></a>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="assets/js/scripts-kelas.js"></script>
    </body>
</html>
