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
        @include('component.NavbarTrainer')

        <div class="container-fluid">
          @include('component.truefalse')
            <div class="card shadow-sm mt-4">
              <div class="card-header bg-primary text-white">
                  <h5 class="card-title mb-0">Edit Data Materi</h5>
              </div>
              <div class="card-body">
                <form action="{{ route('submateri.update', $submateri->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') <!-- Menggunakan PUT untuk update data -->
                                <div class="controls">
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example1c">Title</label>
                                            <!-- Pre-fill dengan data existing -->
                                            <input type="text" name="title" id="form3Example1c"
                                                value="{{ $submateri->title }}" placeholder="Enter your title" class="form-control" />
                                        </div>
                                    </div>
                                            <div class="form-group">
                                                <label for="typeSelect">Tipe Submateri:</label>
                                                <select id="typeSelect" class="form-control" name="type" onchange="handleTypeChange()">
                                                    <option value="">Pilih tipe submateri</option>
                                                    <option value="text" {{ $submateri->type == 'text' ? 'selected' : '' }}>Text</option>
                                                    <option value="ebook" {{ $submateri->type == 'ebook' ? 'selected' : '' }}>E-book</option>
                                                    <option value="video" {{ $submateri->type == 'video' ? 'selected' : '' }}>Video</option>
                                                </select>
                                            </div>
                                        <div id="textInput" style="display: none;">
                                            <div class="form-group">
                                                <label for="text_content">Text Content</label>
                                                <textarea id="text_content" name="text_content"
                                                    class="form-control" placeholder="Enter text content" rows="5">{{ $submateri->text_content }}</textarea>
                                            </div>
                                        </div>
                                        <div id="videoInput" style="display: none;">
                                            <div class="form-group">
                                                <label for="video_link">YouTube Link</label>
                                                <input id="video_link" type="text" name="video_link"
                                                    value="{{ $submateri->video_link }}" class="form-control" placeholder="Enter YouTube link">
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="ebookInput" style="display: none;">
                                            <div class="form-group">
                                                <label for="ebook_file">Upload E-book</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="ebook_file" name="ebook_file">
                                                    <label class="custom-file-label" for="ebook_file">{{ $submateri->ebook_file ? $submateri->ebook_file : 'Choose file...' }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-primary btn-send pt-2 btn-block"
                                                value="Update Submateri">
                                        </div>
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
      <script>
        function handleTypeChange() {
            var type = document.getElementById("typeSelect").value;
            document.getElementById("textInput").style.display = "none";
            document.getElementById("videoInput").style.display = "none";
            document.getElementById("ebookInput").style.display = "none";

            if (type === "text") {
                document.getElementById("textInput").style.display = "block";
            } else if (type === "video") {
                document.getElementById("videoInput").style.display = "block";
            } else if (type === "ebook") {
                document.getElementById("ebookInput").style.display = "block";
            }
        }

        // Script to update the label of the custom file input
        $(document).ready(function () {
            $('.custom-file-input').on('change', function () {
                var fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });
        });

        // Menampilkan input sesuai tipe yang sudah dipilih sebelumnya
        $(document).ready(function () {
            handleTypeChange();
        });
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
