<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Trainer</title>
    <link href="{{asset('assets/vendor-admin/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css') }}" rel="stylesheet">
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

        .table thead th {
            background-color: #4e73df;
            color: white;
            text-align: center;
        }

        .table tbody td {
            vertical-align: middle;
        }

        .table-action-btns {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .table-action-btns button {
        height: 36px;
        width: 36px;
        }
</head>
</style>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('component.NavbarAdmin')
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h1 class="h3">Data Trainer</h1>
                        <button class="btn btn-custom" type="button" data-toggle="modal" data-target="#tambahMateriModal">
                                <span class="text-white font-weight-bold">Tambah Trainer ++</span>
                        </button>
                </div>
                <div class="d-flex justify-content-end m-4">
                    <form action="{{ route('admin.data-trainer.search') }}" method="GET" class="input-group search-bar">
                        <input type="text" class="form-control bg-light border-0 small" name="query" placeholder="Cari Trainer..." value="{{ request()->input('query') }}" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-custom" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('component.truefalse')
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Keahlian</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Bergabung Pada</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trainers as $index => $trainer)
                                    <tr>
                                        <td>{{ $trainers->firstItem() + $index}}</td>
                                        <td>{{ $trainer->name }}</td>
                                        <td>{{ $trainer->keahlian }}</td>
                                        <td>{{ $trainer->alamat }}</td>
                                        <td>{{ $trainer->email }}</td>
                                        <td>{{ $trainer->created_at->format('Y-m-d') }}</td>
                                        <td class="table-action-btns">
                                            <a type="submit" class="btn btn-info btn-action" href="{{ route('admin.dataTrainer.edit', $trainer->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <form id="delete-form-{{ $trainer->id }}" action="{{ route('admin.DataTrainer.destroy', $trainer->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-action" onclick="confirmDelete(event, {{ $trainer->id }})">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $trainers->links('pagination::bootstrap-4') }}
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
        <!-- Modal Tambah Trainer -->
<div class="modal fade" id="tambahMateriModal" tabindex="-1" role="dialog" aria-labelledby="tambahMateriModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahMateriModalLabel">Tambah Materi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form di dalam modal -->
                       <form action="{{ route('register.trainer') }}" method="post" class="mx-1 mx-md-4" enctype="multipart/form-data" id="registerForm">
                  @csrf
                    {{-- input Name --}}
                     <div class="mb-3">
                      <div class="form-outline flex-fill mb-0">
                      <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name"></input>
                      </div>
                    </div>
                {{-- End input Name --}}
                {{-- input Email --}}
                <div class="row">
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" class="form-control" />
                  </div>
                </div>
                {{-- End input Email --}}
                {{-- input password --}}
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" id="password" class="form-control" />
                  </div>
                </div>
                {{-- End input password --}}
              </div>
                {{-- select Kelamin --}}
                    <div class="input-group">
                      <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="jk">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select class="form-control" name="jk"id="inputGroupSelect04" aria-label="Example select with button addon">
                          <option value="laki-laki">laki-laki</option>
                          <option value="perempuan">perempuan</option>
                        </select>
                      </div>
                    </div>
                  {{-- End select Jenis Kelamin --}}
                    <br>
                  {{-- input alamat --}}
                    <div class="mb-3">
                      <div class="form-outline flex-fill mb-0">
                      <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                      </div>
                    </div>
                  {{-- End input alamat --}}
                  <div class="input-group">
                      <div class="form-outline flex-fill mb-0">
                      <label for="keahlian" class="form-label">Keahlian<span class="text-danger">*</span></label>
                        <select class="form-control" name="keahlian"id="inputGroupSelect04" aria-label="Example select with button addon">
                          <option value="desain">Desain</option>
                          <option value="programer">Programer</option>
                        </select>
                      </div>
                    </div>
                  <div class="d-grid gap-2">
                    <button  type="submit" id="kirim" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary form-control">Kirim</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- JavaScript -->
    <script src="assets/vendor-admin/jquery/jquery.min.js"></script>
    <script src="assets/vendor-admin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/js-admin/sb-admin-2.min.js"></script>
    <script src="assets/vendor-admin/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor-admin/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js-admin/demo/datatables-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

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
        })
    }
    </script>
</body>
</html>
