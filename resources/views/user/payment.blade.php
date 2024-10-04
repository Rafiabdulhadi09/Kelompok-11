<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Payment</title>
    <link rel="stylesheet" href="{{asset('assets/css/payment.css')}}">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f7; /* Light background */
            margin: 0;
            padding: 0;
            color: #333;
            animation: fadeIn 1s forwards; /* Smooth fade-in */
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        .container {
            max-width: 1100px;
            margin: 50px auto;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08); /* Soft shadow */
            padding: 40px;
            opacity: 0;
            transform: translateY(50px);
            animation: slideUp 1s forwards ease-in-out 0.3s; /* Slide up animation */
        }

        @keyframes slideUp {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 30px;
        }

        .left, .right {
            opacity: 0;
            transform: translateY(50px);
            animation: slideUp 1s forwards ease-in-out 0.5s;
        }

        .left {
            flex: 1 1 60%;
            margin-right: 20px;
            animation-delay: 0.6s;
        }

        .right {
            flex: 1 1 35%;
            text-align: center;
            animation-delay: 0.7s;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #34495e; /* Calm dark blue */
        }

        p {
            margin: 10px 0;
            font-size: 18px;
            color: #7f8c8d; /* Soft grey for text */
        }

        .materi {
            font-size: 24px;
            color: #e74c3c;
            font-weight: bold;
        }

        .webinar-info {
            margin-top: 15px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
        }

        .webinar-info h2 {
            font-size: 24px;
            margin: 0;
            color: #2980b9; /* Soft blue for titles */
        }

        .webinar-info p {
            font-size: 16px;
            color: #7f8c8d;
        }

        .right img {
            border-radius: 15px;
            margin-bottom: 20px;
            max-width: 100%;
            height: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            opacity: 0;
            animation: fadeInImg 1s forwards ease-in-out 1s;
        }

        @keyframes fadeInImg {
            0% {
                opacity: 0;
                transform: scale(0.95);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .right img:hover {
            transform: scale(1.05);
        }

        .price-section {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        .price {
            font-size: 42px;
            font-weight: bold;
            color: #2ecc71; /* Calming green for price */
            margin-bottom: 20px;
        }

        .btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            opacity: 0;
            animation: fadeInBtn 1s forwards ease-in-out 1.2s;
        }

        @keyframes fadeInBtn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }

        a {
            color: white;
            text-decoration: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
            }
            .left, .right {
                flex: 1 1 100%;
                margin-right: 0;
            }
            .btn {
                width: 100%;
                padding: 15px 0;
            }
        }
    </style>
</head>
<body>

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
                <span class="price">{{formatRupiah($kelas->price)}}</span><br>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn"><a href="{{ route('bukti.pembayaran', $kelas->id) }}"><b>Beli Kelas</b></a></button>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
