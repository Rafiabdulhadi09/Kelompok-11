<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi User</title>
    <link href="{{asset('assets/vendor-admin/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Begin Page Content -->
        <div class="container-fluid mt-4">
            <div class="row g-3">
                {{-- kiri --}}
            <div class="col p-3 m-2 bg-warning text-dark">
                        @if($submateri->isEmpty())
          <div class="alert alert-info text-center">
            <p><i class="fas fa-info-circle"></i> Tidak ada materi untuk kelas ini.</p>
          </div>
        @else
         @php
                                // Ambil pelajaran pertama
                                $item = $submateri->first();
                                // Cari pelajaran berikutnya (jika ada)
                                $nextItem = $submateri->skip(1)->first();
                            @endphp
         @if ($item->type == 'video')
                                    @php
                                        // Memeriksa apakah konten adalah link YouTube
                                        $isYouTube = strpos($item->content, 'youtube.com') !== false || strpos($item->content, 'youtu.be') !== false;
                                        // Jika link YouTube, konversi menjadi embed link
                                        if ($isYouTube) {
                                            $videoID = '';
                                            // Regex untuk mengekstrak ID video dari URL YouTube
                                            if (preg_match('/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|embed)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $item->content, $matches)) {
                                                $videoID = $matches[1];
                                            }
                                            // URL embed YouTube
                                            $embedUrl = 'https://www.youtube.com/embed/' . $videoID;
                                        }
                                    @endphp
                                        @if ($isYouTube)
                                        <!-- Menampilkan video YouTube dalam iframe -->
                                        <iframe width="560" height="315" src="{{ $embedUrl }}" frameborder="0" 
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                                allowfullscreen>
                                        </iframe>
                                    @else
                                        <!-- Jika bukan video YouTube, tampilkan link biasa -->
                                        <a href="{{ $item->content }}" target="_blank" class="materi-content">
                                            <i class="fas fa-link mr-1"></i>{{ $item->content }}
                                        </a>
                                    @endif
                                    @elseif ($item->type == 'ebook')
                                        <a href="{{ $item->content }}" target="_blank" class="materi-content">
                                            <i class="fas fa-download mr-1"></i>{{ $item->content }}
                                        </a>
                                    @elseif ($item->type == 'text')
                                        <div class="materi-text">
                                            <p>{{ $item->content }}</p>
                                        </div>
                                        @endif
                                        @endif
            </div>
            {{-- kanan --}}
            <div class="col p-3 m-2 bg-success text-dark">
                @foreach ($data as $sub)
                 <div class="p-3 mb-2 bg-warning text-dark">
                    @foreach ($submateri as $item)
                    <a href="{{ route('belajar.user',$sub->id) }}">{{ $sub->title }} </a>
                    @endforeach
                </div>
                @endforeach
            </div>
            </div>
    <!-- End of Page Wrapper -->

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>