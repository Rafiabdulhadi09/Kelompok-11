<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Update Data</title>

    <link href="{{asset('assets/vendor-admin/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor-admin/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fc;
        }

        .container-fluid {
            margin-top: 30px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            color: #4e73df;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: auto;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
        }

        .input-group label {
            display: block;
            font-weight: 600;
            color: #4e73df;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 10px 40px 10px 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: border-color 0.2s;
        }

        .input-group input:focus {
            outline: none;
            border-color: #4e73df;
        }

        .input-group i {
            position: absolute;
            right: 10px;
            top: 38px;
            color: #4e73df;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4e73df;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #224abe;
        }

        @media (max-width: 768px) {
            form {
                width: 100%;
            }

            button[type="submit"] {
                font-size: 14px;
            }
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

                <div class="input-group">
                    <label for="x">Masukan Judul</label>
                    <input type="text" value="{{ $sosialmedia->x }}" name="x" id="x" class="form-control" required>
                    <i class="fas fa-heading"></i>
                </div>

                <div class="input-group">
                    <label for="instagram">Masukan Instagram</label>
                    <input type="text" value="{{ $sosialmedia->instagram }}" name="instagram" id="instagram" class="form-control" required>
                    <i class="fab fa-instagram"></i>
                </div>

                <div class="input-group">
                    <label for="youtube">Masukan Youtube</label>
                    <input type="text" value="{{ $sosialmedia->youtube }}" name="youtube" id="youtube" class="form-control" required>
                    <i class="fab fa-youtube"></i>
                </div>
                <div class="input-group">
                    <label for="logo">Masukan Logo</label>
                    <input type="file" value="{{ $sosialmedia->logo}}" name="logo" id="logo" class="form-control" required>
                    <i class="fab fa-youtube"></i>
                </div>
                <div class="input-group">
                    <label for="namaperusahaan">Masukan Nama Perusahaan</label>
                    <input type="text" value="{{ $sosialmedia->nama_perusahaan}}" name="nama_perusahaan" id="namaprusahaan" class="form-control" required>
                    <i class="fab fa-namaperusahaan"></i>
                </div>
                <div class="input-group">
                    <label for="alamat">Masukan Alamat</label>
                    <input type="text" value="{{ $sosialmedia->alamat }}" name="alamat" id="alamat" class="form-control" required>
                    <i class="fab fa-home"></i>
                </div>
                <div class="input-group">
                    <label for="telephone">Masukan No Telephone</label>
                    <input type="text" value="{{ $sosialmedia->telephone }}" name="telephone" id="telephone" class="form-control" required>
                    <i class="fab fa-phone"></i>
                </div>
                <div class="input-group">
                    <label for="email">Masukan Email</label>
                    <input type="text" value="{{ $sosialmedia->email }}" name="email" id="email" class="form-control" required>
                    <i class="fab fa-email"></i>
                </div>

                <button type="submit">KIRIM</button>
            </form>
        </div>
    </div>

    <script src="assets/vendor-admin/jquery/jquery.min.js"></script>
    <script src="assets/vendor-admin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js-admin/sb-admin-2.min.js"></script>
    <script src="assets/vendor-admin/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor-admin/datatables/dataTables.bootstrap4.min.js"></script>
</body>
</html>
