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
                            <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#TambahKuis">
                                Tambah Kuis
                            </button>
                            </div>
                             </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;">Title</th>
                                            <th style="text-align: center; vertical-align: middle;">Price</th>
                                            <th style="text-align: center; vertical-align: middle;">Description</th>
                                            <th style="text-align: center; vertical-align: middle;">Poto</th>
                                            <th style="text-align: center; vertical-align: middle;">Action</th>
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
    <!-- Modal Popup untuk Tambah Kuis -->
    <div class="modal fade" id="TambahKuis" tabindex="-1" role="dialog" aria-labelledby="TambahKuis" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="TambahKuis">Tambah Kuis</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('create.kuis') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Dropdown Pilih Kelas -->
                        <div class="form-group mb-4">
                            <label for="kelas_id" class="font-weight-bold">Pilih Kelas</label>
                            <select class="form-control" name="kelas_id" id="kelas_id" required>
                                <option value="" disabled selected>Pilih kelas</option>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Loop untuk 10 soal -->
                        @for ($i = 1; $i <= 10; $i++)
                            <h5 class="mt-4">Soal {{ $i }}</h5>
                            <div class="form-group mb-4">
                                <label for="pertanyaan_{{ $i }}" class="font-weight-bold">Pertanyaan</label>
                                <input type="text" name="pertanyaan[{{ $i }}]" class="form-control" id="pertanyaan_{{ $i }}" placeholder="Masukkan pertanyaan" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="pilihan_1_{{ $i }}" class="font-weight-bold">Pilihan 1</label>
                                <input type="text" name="pilihan_1[{{ $i }}]" class="form-control" id="pilihan_1_{{ $i }}" placeholder="Masukkan pilihan 1" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="pilihan_2_{{ $i }}" class="font-weight-bold">Pilihan 2</label>
                                <input type="text" name="pilihan_2[{{ $i }}]" class="form-control" id="pilihan_2_{{ $i }}" placeholder="Masukkan pilihan 2" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="pilihan_3_{{ $i }}" class="font-weight-bold">Pilihan 3</label>
                                <input type="text" name="pilihan_3[{{ $i }}]" class="form-control" id="pilihan_3_{{ $i }}" placeholder="Masukkan pilihan 3" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="jawaban_{{ $i }}" class="font-weight-bold">Jawaban</label>
                                <input type="text" name="jawaban[{{ $i }}]" class="form-control" id="jawaban_{{ $i }}" placeholder="Masukkan jawaban yang benar" required>
                            </div>
                        @endfor
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Kirim Kuis</button>
                    </div>
                </form>
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