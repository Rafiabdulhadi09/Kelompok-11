<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Update Data</title>

    <link href="{{asset('assets/vendor-admin/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor-admin/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fc;
        }

        .container-fluid {
            margin-top: 30px;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 28px;
            color: #4e73df;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
            color: #4e73df;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 5px rgba(78, 115, 223, 0.5);
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4e73df;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #224abe;
        }
    </style>
</head>
<body id="page-top">
    <div id="wrapper">
        @include('component.NavbarAdmin')

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h1>Form Update Data</h1>
            <form id="updateForm" action="{{ route('update_sosialmedia', $sosialmedia->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="x">Masukan Judul</label>
                    <input type="text" value="{{ $sosialmedia->x }}" name="x" id="x" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="instagram">Masukan Instagram</label>
                    <input type="text" value="{{ $sosialmedia->instagram }}" name="instagram" id="instagram" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="youtube">Masukan Youtube</label>
                    <input type="text" value="{{ $sosialmedia->youtube }}" name="youtube" id="youtube" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="logo">Masukan Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control">
                </div>

                <div class="form-group">
                    <label for="namaperusahaan">Masukan Nama Perusahaan</label>
                    <input type="text" value="{{ $sosialmedia->nama_perusahaan }}" name="nama_perusahaan" id="namaperusahaan" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Masukan Alamat</label>
                    <input type="text" value="{{ $sosialmedia->alamat }}" name="alamat" id="alamat" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="telephone">Masukan No Telephone</label>
                    <input type="text" value="{{ $sosialmedia->telephone }}" name="telephone" id="telephone" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Masukan Email</label>
                    <input type="text" value="{{ $sosialmedia->email }}" name="email" id="email" class="form-control" required>
                </div>

                <button type="submit">KIRIM</button>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/vendor-admin/jquery/jquery.min.js"></script>
    <script src="assets/vendor-admin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js-admin/sb-admin-2.min.js"></script>
    <script src="assets/vendor-admin/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor-admin/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

</body>
</html>
