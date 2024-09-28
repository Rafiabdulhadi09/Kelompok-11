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
            <p>Trainer: 
                <strong>
                      @if($kelas->trainers->isNotEmpty())
                            @foreach($kelas->trainers as $trainer)
                                <small>{{ $trainer->name }}</small>
                            @endforeach
                        @else
                            <small>Belum ada trainer</small>
                        @endif
                </strong></p>
            <div class="rating">
                
                                  @if($kelas->materi->isEmpty())
                                          <h2 class="materi">Tidak ada materi untuk kelas ini.</h2>
                                      @else
                                              @foreach($kelas->materi as $item)
                                               <div class="webinar-info">
                                                      <h2>{{ $item->title }}</h2>
                                                      <p>{{ $item->content }}</p>
                                                </div>
                                       @endforeach
                                      @endif
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
                    <button class="btn btn-primary"><a href="{{ route('bukti.pembayaran', $kelas->id) }}"><b>
                    Beli Kelas</b></a></button>
                </div>
    </div>
        </div>
    </div>
</div>

</body>
</html>