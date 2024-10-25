<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Kuis</title>
    <link href="{{asset('assets/vendor-admin/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            <!-- Card for the form -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h1 class="h3 text-center">Buat Kuis</h1>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group mb-3">
                            <label for="pertanyaan">Pertanyaan</label>
                            <input type="text" name="pertanyaan" class="form-control" id="pertanyaan" placeholder="Masukkan pertanyaan" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="pilihan_1">Pilihan 1</label>
                            <input type="text" name="pilihan_1" class="form-control" id="pilihan_1" placeholder="Masukkan pilihan 1" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="pilihan_2">Pilihan 2</label>
                            <input type="text" name="pilihan_2" class="form-control" id="pilihan_2" placeholder="Masukkan pilihan 2" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="pilihan_3">Pilihan 3</label>
                            <input type="text" name="pilihan_3" class="form-control" id="pilihan_3" placeholder="Masukkan pilihan 3" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jawaban">Jawaban</label>
                            <input type="text" name="jawaban" class="form-control" id="jawaban" placeholder="Masukkan jawaban yang benar" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="materi_id"> Pilih materi id:</label>
                            @foreach ($data as $item)
                                <select class="form-control" name="materi_id" id="materi_id" required>
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            </select>
                            @endforeach
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block">Kirim Kuis</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->
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

    <script>
        function confirmDelete(event, Id) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + Id).submit();
                }
            });
        }
    </script>

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
