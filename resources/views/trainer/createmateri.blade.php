<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/form.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
</head>
<body>
<div class="container">
        <div class=" text-center mt-5 ">
            <h1>Tambah Kursus</h1>
        </div>
    <div class="row ">
      <div class="col-lg-7 mx-auto">
        <div class="card mt-2 mx-auto p-4 bg-light">
            <div class="card-body bg-light">
            <div class = "container">
      @include('component.truefalse')
        <form action="{{ route('materi.create') }}" method="POST">
            @csrf
            <div class="controls">
                 <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example1c">Title</label>
                    <input type="text" name="title" value="{{old('')}}" id="form3Example1c" placeholder="enter your title" class="form-control" />
                    </div>
                  </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-select mt-3" name="type">
                                      <option value="text">Text</option>
                                      <option value="ebook">E-book</option>
                                      <option value="video">Video</option>
                               </select>
                        </div>
                    </div>
                                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kelas_id">Pilih kelas :</label>
                            <select id="kelas_id" class="form-select mt-3" name="kelas_id">
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                               </select>
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_need">Please enter profil kursus *</label>
                          <input type="file" class="form-control" name="poto">
                        </div>
                    </div> --}}
                </div>
                <div class="row">
                  <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email">Content</label>
                            <input id="form_email" type="string" name="content" class="form-control" placeholder="Please enter price *">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-success btn-send  pt-2 btn-block
                            " value="Send Message" >
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
</body>
</html>