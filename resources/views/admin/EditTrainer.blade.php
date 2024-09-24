<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Trainer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-color: #ffffff;
    }
    .form-container {
      max-width: 900px;
      margin: 50px auto;
      background: #f8f9fa;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
    }
    .form-container h1 {
      text-align: center;
      color: #00A6FF;
    }
    .form-control,
    .form-select {
      background-color: #ffffff;
      color: #000;
      border-color: #00A6FF;
    }
    .form-control:focus,
    .form-select:focus {
      border-color: #00A6FF;
      box-shadow: none;
    }
    .btn-primary {
      background-color: #00A6FF;
      border-color: #00A6FF;
      color: #ffffff;
    }
    .form-label {
      color: #000;
    }
    .img-container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
    }
    .img-container img {
      max-width: 80%; /* Ukuran gambar lebih kecil */
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <section class="vh-100" style="background-color: #ffffff;">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card-body">
            <div class="row justify-content-center">
              <!-- Form Container -->
              <div class="form-container col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <h1 class="fw-bold mb-4">EDIT</h1>
                @include('component.truefalse')
                <form action="{{ route('admin.dataTrainer.update', $user->id) }}" method="post" class="mx-1 mx-md-4">
                  @csrf
                  @method('PUT')
                  <div class="mb-4">
                    <label for="nama" class="form-label">Masukan Nama</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" id="nama" class="form-control" required />
                  </div>

                  <div class="mb-4">
                    <label for="email" class="form-label">Masukan Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" id="email" class="form-control" required />
                  </div>

                  <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">KIRIM</button>
                  </div>
                </form>
              </div>

              <!-- Image Container -->
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2 img-container">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
