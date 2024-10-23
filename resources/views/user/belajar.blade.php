<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi User</title>
    
    <!-- FontAwesome -->
    <link href="{{asset('assets/vendor-admin/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Begin Page Content -->
        <div class="container mt-5">
            <div class="row">
                <!-- Kiri (Materi Utama) -->
                <div class="col-md-7 p-4 bg-light rounded shadow-sm">
                     {{-- @if($allCompleted)
                        <a href="" class="btn btn-success">
                                Selamat kamu telah menyelesaikan sub materi ini dengan Score: {{ $nilai->nilai }} 
                        </a>
                    @else
                        <p>anda perlu menyelesaikan kuis dengan score 80 sedangkan score anda{{ $nilai->nilai }}</p>
                    @endif --}}
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
                                <div class="embed-responsive embed-responsive-16by9 mb-4">
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
                    <div class="d-grid gap-2">
                        @if($kuis->kuis->isNotEmpty())
                            <a class="btn btn-primary" type="button" href="{{ route('user.kuis', $kuis->kuis->first()->id) }}">Jawab Kuis</a>
                        @endif
                    </div>
                </div>

                <!-- Kanan (Daftar Sub Materi) -->
                <div class="col-md-5 p-4 bg-white rounded shadow-sm">
                    <h5 class="text-center mb-4">Daftar Sub Materi</h5>
                    @foreach ($data as $sub)
                        <div class="p-3 mb-3 bg-warning rounded">
                            <a href="{{ route('belajar.user',['id' => $sub->id, 'materi_id' => $sub->materi_id]) }}" class="text-dark">{{ $sub->title }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End of Page Wrapper -->
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
