<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>
    <link href="{{asset('assets/vendor-admin/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor-admin/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        @include('component.NavbarAdmin')

     <div class="container-fluid">
    @include('component.truefalse')

    <div class="card shadow-sm mt-4">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Edit Data User</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.dataUser.update', $pengguna->id) }}" method="post">
                @csrf
                @method('PUT')
                <!-- Input Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Masukkan Nama</label>
                    <input type="text" name="name" value="{{ $pengguna->name }}" id="nama" class="form-control" required>
                </div>

                <!-- Input Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Masukkan Email</label>
                    <input type="email" name="email" value="{{ $pengguna->email }}" id="email" class="form-control" required>
                </div>
                <!-- Input Email -->
                <div class="mb-3">
                    <label for="password" class="form-label">Masukkan Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <!-- Tombol Submit -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Kirim Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

      </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modal Logout -->
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

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"></script>
    <script src="{{asset('assets/vendor-admin/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor-admin/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/js-admin/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('assets/vendor-admin/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/vendor-admin/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js-admin/demo/datatables-demo.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
