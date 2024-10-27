<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembelian</title>
    <link href="{{asset('assets/vendor-admin/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor-admin/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

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
            text-align: center; /* Center header text */
        }

        .table tbody td {
            vertical-align: middle;
            text-align: center; /* Center body text */
        }

        .table-action-btns {
            display: flex;
            justify-content: center;
            gap: 10px;
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
                    <h1 class="h3">Data Pembelian</h1>
                    <form method="GET" action="/filter">
                    <label for="">Start Date :</label>
                    <input type="date" class="form-control" name="start_date">
                    <label for="">End Date :</label>
                    <input type="date" class="form-control" name="end_date">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>
                 <button class="btn btn-primary m-3"><h3>{{ formatRupiah($totalHarga) }}</h3></button>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('component.truefalse')
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nama Kelas</th>
                                    <th>Bukti Transfer</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->kelas->title }}</td>
                                        <td>
                                            @if($item->bukti_pembayaran)
                                                <img src="{{ asset('storage/' . $item->bukti_pembayaran) }}" alt="Bukti Pembayaran" width="100">
                                            @else
                                                <em>Belum ada foto</em>
                                            @endif
                                        </td>
                                        <td>{{ formatRupiah($item->kelas->price) }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td class="table-action-btns">
                                            <div class="d-flex justify-content-center">
                                                @if($item->status == 'approved')
                                                    <span class="text-success">Sudah dikonfirmasi</span>
                                                @else
                                                    <form action="{{ route('pembayaran.approve', $item->id)}}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success mx-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('pembayaran.reject', $item->id)}}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger mx-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

   <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor-admin/jquery/jquery.min.js"></script>
    <script src="assets/vendor-admin/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor-admin/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js-admin/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor-admin/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js-admin/demo/chart-area-demo.js"></script>
    <script src="assets/js-admin/demo/chart-pie-demo.js"></script>
</body>
</html>
