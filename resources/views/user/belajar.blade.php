<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi User</title>

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #eef4ff;
            font-family: 'Nunito', sans-serif;
        }

        .container {
            margin-top: 30px;
        }

        /* Bagian Kiri (Materi Utama) */
        .main-content {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .main-content h5 {
            color: #007bff;
        }

        .main-content p {
            margin-top: 10px;
        }

        .embed-responsive {
            margin-bottom: 20px;
        }

        /* Bagian Kanan (Daftar Sub Materi) */
        .submateri-section {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-height: 700px;
            overflow-y: auto;
        }

        .submateri-item {
            background-color: #eef7ff;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 2px solid #007bff;
            position: relative;
        }

        .submateri-item img {
            width: 70px;
            height: 50px;
            border-radius: 10px;
        }

        .submateri-info {
            flex-grow: 1;
            margin-left: 15px;
        }

        .submateri-item h6 {
            margin: 0;
            color: #007bff;
            font-weight: bold;
        }

        .submateri-item p {
            margin: 0;
            color: #555;
            font-size: 14px;
        }

        .xp-info {
            font-size: 14px;
            display: flex;
            align-items: center;
        }

        .xp-info span {
            margin-right: 10px;
        }

        .xp-info img {
            width: 18px;
            height: 18px;
            margin-left: 5px;
        }

        .xp-info .fa-lock {
            position: absolute;
            top: 20px;
            left: 70px;
            font-size: 1.5em;
            color: rgba(0, 0, 0, 0.5);
        }

        /* Tombol Rangkuman dan Kuis */
        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .action-buttons a {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .action-buttons a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<style>
    .submateri-item {
    background-color: #ffc107; /* Warna default */
    color: black;
    }

    .submateri-item.active {
        background-color: #ff9800; /* Warna yang berbeda untuk submateri aktif */
        color: white;
    }
</style>

<body>

    <div class="container">
        <div class="row">
            <!-- Kolom Kiri (Materi Utama) -->
            <div class="col-md-7">
                <div class="main-content">
                    <!-- Video Section -->
                    @if($submateri->isEmpty())
                    <div class="alert alert-info text-center">
                        <p><i class="fas fa-info-circle"></i> Tidak ada materi untuk kelas ini.</p>
                    </div>
                    @else
                    @php
                    $item = $submateri->first();
                    $nextItem = $submateri->skip(1)->first();
                    @endphp

                    @if ($item->type == 'video')
                    @php
                    $isYouTube = strpos($item->content, 'youtube.com') !== false || strpos($item->content, 'youtu.be') !== false;
                    if ($isYouTube) {
                        $videoID = '';
                        if (preg_match('/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|embed)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $item->content, $matches)) {
                            $videoID = $matches[1];
                        }
                        $embedUrl = 'https://www.youtube.com/embed/' . $videoID;
                    }
                    @endphp
                    @if ($isYouTube)
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ $embedUrl }}" allowfullscreen></iframe>
                    </div>
                    @else
                    <a href="{{ $item->content }}" target="_blank" class="btn btn-primary mb-4">
                        <i class="fas fa-link"></i> Lihat Materi Video
                    </a>
                    @endif
                    @elseif ($item->type == 'ebook')
                    <a href="{{ $item->content }}" target="_blank" class="btn btn-success mb-4">
                        <i class="fas fa-download"></i> Unduh E-book
                    </a>
                    @elseif ($item->type == 'text')
                    <div class="p-3 bg-white rounded shadow-sm">
                        <p>{{ $item->content }}</p>
                    </div>
                    @endif
                    @endif
                    <!-- Deskripsi Materi -->
                    <h5>{{ $item->title }}</h5>
                    <p>{{ $item->description }}</p>
                </div>
            </div>

            <!-- Kolom Kanan (Daftar Sub Materi) -->
            <div class="col-md-5">
                <div class="submateri-section">
                    <h5 class="text-center mb-4">Daftar Sub Materi</h5>
                    @foreach ($data as $sub)
                         <div class="p-3 mb-3 rounded submateri-item {{ $sub->id == $currentSubmateriId ? 'active' : '' }}"> 
                            <a href="{{ route('belajar.user', ['id' => $sub->id, 'materi_id' => $sub->materi_id]) }}" class="text-dark">{{ $sub->title }}</a>
                        </div>
                    @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('#submateri-list .submateri-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('#submateri-list .submateri-item').forEach(el => el.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
