<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kuis</title>
    <link href="{{ asset('assets/vendor-admin/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor-admin/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .btn-custom {
            background-color: #4e73df;
            border-color: #4e73df;
        }

        .btn-custom:hover {
            background-color: #224abe;
            border-color: #224abe;
        }

        .search-bar {
            width: 100%;
            max-width: 400px;
        }

        .btn-action {
            margin-right: 5px;
            margin-left: 5px;
        }

        .table thead th {
            background-color: #4e73df;
            color: white;
            text-align: center;
        }

        .table tbody td {
            vertical-align: middle;
            text-align: center;
        }

        .table-action-btns button {
        height: 36px;
        width: 36px;
        }


        /* Ensure action column has consistent width */
        .table .action-column {
            width: 160px; /* Adjust width as needed */
        }

        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
            }

            .btn-custom {
                width: 100%;
                margin-bottom: 10px;
            }

            
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('component.NavbarAdmin')

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h1 class="h3">Data Kuis di kelas: {{ $kuis->title }}</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('component.truefalse')
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Pilihan 1</th>
                                    <th>Pilihan 2</th>
                                    <th>Pilihan 3</th>
                                    <th>Jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                  @if($kuis->kuis->isNotEmpty())
                                @foreach ($kuis->kuis as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->pertanyaan }}</td>
                                        <td>{{ $item->pilihan_1 }}</td>
                                        <td>{{ $item->pilihan_2 }}</td>
                                        <td>{{ $item->pilihan_3 }}</td>
                                        <td>{{ $item->jawaban }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center">Data tidak tersedia</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor-admin/jquery/jquery.min.js"></script>
    <script src="assets/vendor-admin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor-admin/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/js-admin/sb-admin-2.min.js"></script>
    <script src="assets/vendor-admin/chart.js/Chart.min.js"></script>
    <script src="assets/js-admin/demo/chart-area-demo.js"></script>
    <script src="assets/js-admin/demo/chart-pie-demo.js"></script>
</body>

</html>
