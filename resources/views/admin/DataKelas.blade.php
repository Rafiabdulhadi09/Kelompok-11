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

    <style>
        .btn-custom {
            background-color: #4e73df;
            border-color: #4e73df;
            color: white;
        }

        .btn-custom:hover {
            background-color: #224abe;
            border-color: #224abe;
        }

        .btn-add, .btn-warning, .btn-danger, .btn-info {
            color: white;
            font-weight: bold;
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
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        @include('component.NavbarAdmin')

        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h1 class="h3">Data Kelas</h1>
                    <div>
                        <a href="{{ url('create/kelas') }}" class="btn btn-custom btn-add">Tambah Kelas +</a>
                        <a href="{{ route('FormAddTrainer') }}" class="btn btn-warning btn-add">Tambah Trainer Ke Kelas +</a>
                    </div>
                </div>

                <div class="d-flex justify-content-end pt-3">
                    <form action="{{ route('admin.data-kelas.search') }}" method="GET" class="input-group search-bar">
                        <input type="text" class="form-control bg-light border-0 small" name="query" placeholder="Cari Kelas..." value="{{ request()->input('query') }}" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-custom" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Judul Kelas</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Deskripsi</th>
                                    <th class="text-center">Lihat</th>
                                    <th class="text-center">Aksi</th>
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
                                            <a href="{{ route('lihat.materi', $item->id) }}" class="btn btn-warning btn-sm">Materi</a>
                                            <a href="{{ route('kuis.admin', $item->id) }}" class="btn btn-info btn-sm">Kuis</a>
                                        </td>
                                        <td class="table-action-btns">
                                            <a href="{{ route('edit.datakursus', $item->id) }}" class="btn btn-info btn-action">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form id="delete-form-{{ $item->id }}" action="{{ route('kursus.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-action" onclick="confirmDelete(event, {{ $item->id }})">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                            <a href="{{ route('kelas.trainer', $item->id) }}" class="btn btn-custom rounded-pill shadow-sm px-3 py-2">
                                                <i class="fas fa-user"></i> Lihat Trainer
                                            </a>
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
