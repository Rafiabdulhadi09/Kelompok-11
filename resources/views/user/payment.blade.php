<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Payment</title>
    <link rel="stylesheet" href="{{ asset('assets/css/payment.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bank-logos {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .bank-logo {
            width: 80px;
            height: auto;
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
        }

        .bank-logo:hover {
            transform: scale(1.1);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .bank-logo:active {
            transform: scale(0.9);
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* Animasi untuk perubahan nomor rekening */
        #account-number {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        /* Style untuk animasi */
        .fade-out {
            opacity: 0;
            transform: translateY(-10px);
        }

        .fade-in {
            opacity: 1;
            transform: translateY(0);
        }

        /* Style untuk alert */
        .alert {
            margin-bottom: 20px;
        }

        /* Style untuk header */
        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        /* Style untuk bagian harga */
        .price-section {
            text-align: center;
        }

        .price {
            font-size: 24px;
            font-weight: bold;
            color: #28a745; /* Warna hijau untuk harga */
        }

        /* Style untuk tombol */
        .btn {
            background-color: #007bff; /* Warna biru tombol */
            color: white;
        }

        .btn:hover {
            background-color: #0056b3; /* Warna biru lebih gelap saat hover */
        }

        /* Style untuk modal */
        .modal-header {
            background-color: #007bff; /* Warna biru untuk header modal */
            color: white;
        }
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
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Unggah Bukti Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="bank-logos">
                    <img src="{{ asset('assets/bank/bri.png') }}" alt="Logo BRI" class="bank-logo" data-account="23456789012345" onclick="updateAccount(this)">
                    <img src="{{ asset('assets/bank/bni.png') }}" alt="Logo BNI" class="bank-logo" data-account="34567890123456" onclick="updateAccount(this)">
                    <img src="{{ asset('assets/bank/mandiri.png') }}" alt="Logo Mandiri" class="bank-logo" data-account="45678901234567" onclick="updateAccount(this)">
                </div>
                <h5 class="mt-3">No Rekening: <span id="account-number" class="fade-in">Pilih logo bank</span></h5>
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

<!-- JavaScript for bank selection and animation -->
<script>
    document.querySelectorAll('.bank-logo').forEach((logo) => {
        logo.addEventListener('click', () => {
            const accountNumberElement = document.getElementById('account-number');
            const accountNumber = logo.getAttribute('data-account');
            
            // Tambahkan animasi fade-out, lalu ubah teks, dan fade-in kembali
            accountNumberElement.classList.add('fade-out');
            
            // Tunda perubahan teks hingga animasi fade-out selesai
            setTimeout(() => {
                accountNumberElement.textContent = accountNumber;
                accountNumberElement.classList.remove('fade-out');
                accountNumberElement.classList.add('fade-in');
            }, 300); // Waktu sesuai durasi animasi fade-out
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
