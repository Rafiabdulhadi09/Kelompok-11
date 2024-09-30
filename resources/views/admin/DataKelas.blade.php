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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom styles for this page -->
    <link href="{{asset('assets/vendor-admin/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
@include('component.NavbarAdmin')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-grid gap-2 d-md-block m-3">
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       <div class="card-header py-3">
                            <h1>Data Kelas</h1>
                             <button class="btn btn-primary" type="button"><a href="{{ url('create/kelas') }}"><span class="text-white font-weight-bold">Tambah data +</span></a></button>
                             <button class="btn btn-warning" type="button"><a href="{{ route('FormAddTrainer') }}"><span class="text-white font-weight-bold">Tambah Trainer Ke Kelas +</span></a></button>
                        </div>
                        <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search pt-3">
                        <div class="input-group">
                        <form action="{{ route('admin.data-kelas.search') }}" method="GET" class="input-group align-right" >
                            <input type="text" class="form-control bg-light border-0 small" name="query" placeholder="Cari Kelas..." value="{{ request()->input('query') }}" aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                                </div>
                             </form></div>
                             </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Trainer</th>
                                            <th class="text-center">Poto</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    @foreach($items as $index => $item)
        <tr>
            <td class="text-center">{{ $loop->iteration + ($items->currentPage() - 1) * $items->perPage() }}</td>
            <td class="text-center">{{ $item->title }}</td>
            <td class="text-center">{{ formatRupiah($item->price) }}</td>
            <td class="text-center">{{ $item->description }}</td>
            <td class="text-center">
                @if($item->trainers->isNotEmpty())
                    @foreach($item->trainers as $trainer)
                        {{ $trainer->name }}
                    @endforeach
                @else
                    <em>Belum ada trainer</em>
                @endif
            </td>
            <td class="text-center">
                @if($item->poto)
                    <img src="{{ asset('storage/' . $item->poto) }}" alt="Poto" width="100">
                @else
                    <em>Belum ada poto</em>
                @endif
                </td>

            <td class="text-center">
                <a href="{{ route('edit.datakursus', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('kursus.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

                                </table>
                            </div>
                            {{ $items->links('pagination::bootstrap-4') }}
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
                        <span aria-hidden="true"></span>
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
                // Aksi untuk submit form hapus data
                document.getElementById('delete-form-' + Id).submit();
            }
        })
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
</body>
</html>