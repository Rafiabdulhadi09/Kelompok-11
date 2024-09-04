<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/css/payment.css') }}">
</head>
<body>
<div class='container-fluid mt-5 mb-5 p-0'>
    <div class="inner row d-flex justify-content-center">
        <div class="card col-md-5 col-12 box1">
            <div class="card-content">
                <div class="card-header">
                    <div class="heading mb-3"> DESKRIPSI KELAS</div>
                    
                </div>
                <div class="card-body">
                    <p><small> Web kursus online ini adalah platform edukasi digital yang menawarkan berbagai kelas berkualitas untuk meningkatkan keterampilan dan pengetahuan Anda di berbagai bidang.Dengan fitur berlangganan, Anda dapat mengakses semua materi kapan saja dan di mana saja, sesuai dengan jadwal Anda. Bergabunglah sekarang dan tingkatkan kemampuan Anda untuk bersaing di dunia profesional yang semakin kompetitif.</small></p>
                </div>
            </div>
        </div>
        <div class="card col-md-5 col-12 box2">
            <div class="card-content">
                <div class="card-header box2-head">
                    <div class="heading2"> PAYMENT DETAILS </div>
                </div>
                <div class="card-body col-10 offset-1">
                    <form>
                        <div class="form-group"> <label><small><strong class="text-muted">CARD HOLDER</strong></small></label> <input class="form-control" placeholder=""> </div>
                        <div class="form-group"> <label><small><strong class="text-muted">CARD NUMBER</strong></small></label>
                            <div class="d-flex card-number"> <input class="form-control" placeholder=""> <i class="fas fa-credit-card text-muted fa-2x"></i> </div>
                        </div>
                        <div class="line3">
                            <div class="txt d-flex">
                                <p><small class="text-muted">EXPERATION DATE</small></p>
                                <p><small class="text-muted">CVV</small></p>
                            </div>
                            <div class="form-group row"> <select class="form-control col-5">
                                    <option>January</option>
                                    <option>February</option>
                                    <option>march</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select> <select class="form-control col-4">
                                    <option>2020</option>
                                    <option>2021</option>
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                </select> <input class="col-3 col-md-2 offset-md-1 text-left" type="text" placeholder="234"> </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer col-10 offset-1 border-0 footer2">
                    <div class="d-flex total mb-5">
                        <p><strong>TOTAL</strong></p>
                        <p><strong>Rp. 200.000</strong></p>
                    </div> <button class="btn col-12"> PAY </button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>