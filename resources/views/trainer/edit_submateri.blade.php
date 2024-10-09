<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Submateri</title>
    <link rel="stylesheet" href="{{ asset('assets/css/form.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="text-center mt-5">
            <h1>Edit Submateri</h1>
        </div>
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card mt-2 mx-auto p-4 bg-light">
                    <div class="card-body bg-light">
                        <div class="container">
                            @include('component.truefalse')
                            <!-- Update Action -->
                            <form action="{{ route('submateri.update', $submateri->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') <!-- Menggunakan PUT untuk update data -->
                                <div class="controls">
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example1c">Title</label>
                                            <!-- Pre-fill dengan data existing -->
                                            <input type="text" name="title" id="form3Example1c"
                                                value="{{ $submateri->title }}" placeholder="Enter your title" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="typeSelect">Tipe Submateri:</label>
                                                <select id="typeSelect" class="form-control" name="type" onchange="handleTypeChange()">
                                                    <option value="">Pilih tipe submateri</option>
                                                    <option value="text" {{ $submateri->type == 'text' ? 'selected' : '' }}>Text</option>
                                                    <option value="ebook" {{ $submateri->type == 'ebook' ? 'selected' : '' }}>E-book</option>
                                                    <option value="video" {{ $submateri->type == 'video' ? 'selected' : '' }}>Video</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6" id="textInput" style="display: none;">
                                            <div class="form-group">
                                                <label for="text_content">Text Content</label>
                                                <textarea id="text_content" name="text_content"
                                                    class="form-control" placeholder="Enter text content" rows="5">{{ $submateri->text_content }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="videoInput" style="display: none;">
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
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.8 -->
            </div>
            <!-- /.row-->
        </div>
    </div>

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
</body>

</html>
