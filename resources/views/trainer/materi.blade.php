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

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor-admin/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">   
        @include('component/NavbarTrainer')

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="d-grid gap-2 d-md-block m-3">
            </div>
            
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h1>Data Materi</h1>
                    <!-- Ganti href menjadi data-toggle modal -->
                    <button class="btn btn-warning" data-toggle="modal" data-target="#tambahSubmateriModal">
                        Tambah Submateri
                    </button>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;">Judul</th>
                                    <th style="text-align: center; vertical-align: middle;">Materi</th>
                                    <th style="text-align: center; vertical-align: middle;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($materi->isEmpty())
                                    <p>Tidak ada materi untuk kelas ini.</p>
                                @else
                                    @foreach($materi as $item)
                                        <tr>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->content }}</td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('materi.edit', $item->id) }}">Edit</a>
                                                <form id="delete-form-{{ $item->id }}" action="{{ route('materi.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Submateri -->
    <div class="modal fade" id="tambahSubmateriModal" tabindex="-1" role="dialog" aria-labelledby="tambahSubmateriModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tambahSubmateriModalLabel">Tambah Submateri</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Form Tambah Submateri -->
            <form action="{{ route('create.submateri') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="typeSelect">Tipe Submateri</label>
                <select id="typeSelect" class="form-control" name="type" onchange="handleTypeChange()">
                <option value="">Pilih tipe submateri</option>
                <option value="text">Text</option>
                <option value="ebook">E-book</option>
                <option value="video">Video</option>
                </select>
            </div>
            <div class="form-group">
                <label for="materi_id">Pilih Kelas</label>
                <select id="materi_id" class="form-control" name="materi_id">
                @foreach ($materi as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
                </select>
            </div>

            <!-- Input Tambahan Berdasarkan Tipe -->
            <div id="textInput" style="display: none;">
                <div class="form-group">
                <label for="text_content">Text Content</label>
                <textarea id="text_content" name="text_content" class="form-control" rows="5"></textarea>
                </div>
            </div>

            <div id="videoInput" style="display: none;">
                <div class="form-group">
                <label for="video_link">YouTube Link</label>
                <input type="text" name="video_link" class="form-control">
                </div>
            </div>

            <div id="ebookInput" style="display: none;">
                <div class="form-group">
                <label for="ebook_file">Upload E-book</label>
                <input type="file" name="ebook_file" class="form-control">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    </div>


    <!-- JavaScript untuk mengubah tampilan input berdasarkan tipe -->
    <script>
        function handleTypeChange() {
        var selectedType = document.getElementById('typeSelect').value;
        document.getElementById('textInput').style.display = 'none';
        document.getElementById('videoInput').style.display = 'none';
        document.getElementById('ebookInput').style.display = 'none';

        if (selectedType === 'text') {
            document.getElementById('textInput').style.display = 'block';
        } else if (selectedType === 'video') {
            document.getElementById('videoInput').style.display = 'block';
        } else if (selectedType === 'ebook') {
            document.getElementById('ebookInput').style.display = 'block';
        }
        }
    </script>


    <!-- Bootstrap core JavaScript-->
     <!-- Bootstrap and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="assets/vendor-admin/jquery/jquery.min.js"></script>
    <script src="assets/vendor-admin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor-admin/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor-admin/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js-admin/demo/datatables-demo.js"></script>
</body>

</html>
