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
                    <div class="d-grid gap-2 d-md-block m-3">
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       <div class="card-header py-3">
                            <h1>Data SubMateri Pada Materi : {{ $materi->title }}</h1>
                            <a class="btn btn-warning" href="#" data-toggle="modal" data-target="#tambahSubmateriModal">Tambah Submateri</a>
                        </div>
                        @include('component.truefalse')
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Judul SubMateri</th>
                                            <th>SubMateri</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            @if($submateri->isEmpty())
                                                <p>Tidak ada materi untuk kelas ini.</p>
                                            @else
                                                @foreach($submateri as $sub)
                                                    <tr>
                                                        <td>{{ $sub->title }}</td>
                                                        <td>
                                                            @if ($sub->type == 'video')
                                                                <!-- Embed YouTube video -->
                                                                @php
                                                                    $videoId = '';
                                                                    if (preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $sub->content, $matches)) {
                                                                        $videoId = $matches[1];
                                                                    }
                                                                @endphp
                                                                @if ($videoId)
                                                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                @else
                                                                    <a href="{{ $sub->content }}" target="_blank">{{ $sub->content }}</a>
                                                                @endif
                                                            @elseif ($sub->type == 'ebook')
                                                                <!-- Preview PDF -->
                                                                <embed src="{{ asset('storage/' . $sub->content) }}" type="application/pdf" width="75%" height="250px">
                                                            @else
                                                                <!-- Text content -->
                                                                {{ $sub->content }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-info" href="{{ route('submateri.edit', $sub->id) }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                                </svg>
                                                            </a>
                                                            <form id="delete-form-{{ $sub->id }}" action="{{ route('submateri.destroy', $sub->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger" onclick="confirmDelete(event, {{ $sub->id }})">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                                                    </svg>
                                                                </button>
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
          {{-- <div class="form-group">
            <label for="materi_id">Pilih Materi</label>
            <select id="materi_id" class="form-control" name="materi_id">
                <option value="{{ $materi->id }}">{{ $materi->title }}</option>
            </select>
          </div> --}}
          <input type="hidden" name="materi_id" value="{{ $materi->id }}">

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