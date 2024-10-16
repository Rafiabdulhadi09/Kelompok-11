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
        .container-fluid {
            display: flex;
        }
        .video-section {
            flex: 2;
            margin-right: 20px;
        }
        .next-section {
            flex: 1;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .next-section .card-header {
            background-color: #007bff;
            color: #fff;
            font-size: 1.25rem;
            font-weight: 600;
        }
        .next-section .card-body {
            padding: 20px;
        }
        .next-section .list-group-item {
            border: none;
        }
        .next-section .list-group-item:hover {
            background-color: #f8f9fc;
        }
        .next-section .btn-primary {
            width: 100%;
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Section Video -->
            <div class="video-section">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary text-white">
                        <h1>Materi Video</h1>
                    </div>
                    <div class="card-body">
                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1" 
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; 
                    gyroscope; picture-in-picture" allowfullscreen></iframe>

                    </div>
                </div>
            </div>

            <!-- Section Next Lesson -->
            <div class="next-section">
                <div class="card">
                    <div class="card-header">
                        Bab Selanjutnya
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Kuis 1 Sharing Advice
                                <span class="badge badge-primary badge-pill">50 XP</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Rangkuman
                                <span class="badge badge-primary badge-pill">10 XP</span>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-primary mt-4">Lanjut ke Kuis</a>
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

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
