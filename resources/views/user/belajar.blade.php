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

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fc;
        }
        .card-header h1 {
            font-size: 1.75rem;
            font-weight: 700;
        }
        .materi-title {
            font-size: 1.5rem;
            font-weight: 600;
        }
        .materi-content {
            font-size: 1rem;
            color: #0062cc;
            text-decoration: none;
        }
        .materi-content:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Data Materi User -->
            <div class="card shadow mb-4 mt-4">
                <div class="card-header py-3 bg-primary text-white">
                    <h1>Materi</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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

                            <div class="card mb-4 shadow">
                                <div class="card-header bg-success text-white">
                                    <h3 class="materi-title">
                                        <i class="{{ $item->type == 'video' ? 'fas fa-video' : 'fas fa-book' }} mr-2"></i>
                                        {{ $item->title }}
                                    </h3>
                                </div>
                                <div class="card-body">
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
                                </div>

                                <!-- Tombol untuk lanjut ke pelajaran berikutnya hanya ditampilkan jika ada pelajaran berikutnya -->
                                @if ($nextItem)
                                    <div class="card-footer text-right">
                                        <a href="{{ route('submateri.show', $nextItem->id) }}" class="btn btn-primary">
                                            Lanjut Pelajaran <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
