<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{asset('assets/vendor-admin/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('assets/vendor-admin/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
         @include('component.NavbarTrainer')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-grid gap-2 d-md-block m-3">
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        @include('component.truefalse')
                       <div class="card-header py-3">
                            <h1>Data Kelas</h1>
                            <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search pt-3">
                            <div class="input-group">
                            <form action="{{ route('trainer.tambahmateri.search', ['trainer_id' => $trainer->id]) }}" method="GET" class="input-group align-right">
                                <input type="text" class="form-control bg-light border-0 small" name="query" placeholder="Cari Kelas..." value="{{ request()->input('query') }}" aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </form>
                            </div>
                             </div>
                             <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#tambahMateriModal">
                                <span class="text-white font-weight-bold">Tambah Materi</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;">Judul</th>
                                            <th style="text-align: center; vertical-align: middle;">Harga</th>
                                            <th style="text-align: center; vertical-align: middle;">Deskripsi</th>
                                            <th style="text-align: center; vertical-align: middle;">Foto</th>
                                            <th style="text-align: center; vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                         <tbody>
                                          @foreach ($kelas as $item)
                                        <tr>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>poto</td>
                                                <td>
                                                    <a class="btn btn-warning" href="{{ route('materi', $item->id) }}">Lihat Materi</a>
                                                </td>
                                            </td>
                                        </tr>
                                         @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
    <!-- Modal Tambah Materi -->
<div class="modal fade" id="tambahMateriModal" tabindex="-1" role="dialog" aria-labelledby="tambahMateriModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahMateriModalLabel">Tambah Kursus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form di dalam modal -->
                <form action="{{ route('materi.create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" value="{{old('')}}" id="judul" placeholder="Masukan judul" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="kelas_id">Pilih kelas</label>
                        <select id="kelas_id" class="form-control" name="kelas_id">
                            @foreach ($kelas as $item)
                                <option value="{{ $item->id }}"> {{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <input id="description" type="text" name="description" class="form-control" placeholder="Masukan deskripsi">
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor-admin/jquery/jquery.min.js"></script>
    <script src="assets/vendor-admin/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js-admin/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor-admin/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor-admin/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js-admin/demo/datatables-demo.js"></script>
    <!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
</body>
</html>