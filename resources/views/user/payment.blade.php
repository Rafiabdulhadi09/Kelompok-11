<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Payment</title>
    <link rel="stylesheet" href="{{asset('assets/css/payment.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Your existing styles here... */
    </style>
</head>
<body>

<!-- Alert Pembelian Berada di Atas -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container">
    <div class="header">
        <div class="left">
            <h1>{{ $kelas->title }}</h1>
            <p><b>Description: </b>{{ $kelas->description }}</p>
            <p>Trainer:
                <strong>
                    @if($kelas->trainers->isNotEmpty())
                        @foreach($kelas->trainers as $trainer)
                            <small>{{ $trainer->name }}</small>
                        @endforeach
                    @else
                        <small>Belum ada trainer</small>
                    @endif
                </strong>
            </p>
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
                <img src="{{ asset('storage/' . $kelas->image) }}" alt="{{ $kelas->image }}">
            @else
                <p>Gambar profil tidak tersedia</p>
            @endif
            <div class="price-section">
                <span class="price">{{ formatRupiah($kelas->price) }}</span><br>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#uploadModal"><b>Beli Kelas</b></button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for uploading payment proof -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="uploadModalLabel">Unggah Bukti Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5> BANK : BRI</h5>
                <h5>No Rekening: 12345678901234</h5>
                <form action="{{ route('kirim.bukti') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                    <div class="mb-3">
                        <label for="bukti_pembayaran" class="form-label">Unggah Bukti Pembayaran</label>
                        <input type="file" name="bukti_pembayaran" class="form-control" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Kirim Bukti Pembayaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
