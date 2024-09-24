<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/payment.css')}}">
</head>
<body>

<div class="container">
    <div class="header">
        <div class="left">
            <h1>{{ $kelas->title }}</h1>
            <p><b>Description : </b>{{ $kelas->description }}</p>
            <p>Trainer: <strong>Nama Trainer</strong></p>
            <div class="rating">
                <div class="webinar-info">
        <h2>Jadwal gelombang Live Webinar lainnya</h2>
        <p>Berikut jadwal gelombang yang tersedia. Kamu bisa pilih jadwal saat melakukan pembelian di platform pembayaran 
            (Bukalapak, Kariermu, Tokopedia, Pijar Mahir, dan Pintar).</p>
        <p>*Khusus peserta Kartu Prakerja</p>
        <p>Menampilkan 3 jadwal gelombang yang tersedia.</p>
    </div>
    <div class="webinar-info">
        <h2>Jadwal gelombang Live Webinar lainnya</h2>
        <p>Berikut jadwal gelombang yang tersedia. Kamu bisa pilih jadwal saat melakukan pembelian di platform pembayaran 
            (Bukalapak, Kariermu, Tokopedia, Pijar Mahir, dan Pintar).</p>
        <p>*Khusus peserta Kartu Prakerja</p>
        <p>Menampilkan 3 jadwal gelombang yang tersedia.</p>
    </div>
            </div>
        </div>
        <div class="right">
            @if(isset($kelas) && $kelas->image)
                <img src="{{ asset('storage/' . $kelas->image) }}" alt="{{ $kelas->image }}" width="150">
                @else
                <p>Gambar profil tidak tersedia</p>
            @endif
            <div class="price-section">
                    <span class="price">{{formatRupiah($kelas->price)}}</span><br>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" type="button"><b>
                    Beli Kelas</b></button>
                </div>
    </div>
        </div>
    </div>
</div>

</body>
</html>