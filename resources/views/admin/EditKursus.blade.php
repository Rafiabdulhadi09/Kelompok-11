<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Kursus</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-color: #f0f2f5;
    }
    .form-container {
      max-width: 900px;
      margin: 50px auto;
      background: #ffffff;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
    }
    .form-container h1 {
      text-align: center;
      color: #007bff;
    }
    .form-control,
    .form-select,
    textarea {
      background-color: #f8f9fa;
      color: #000;
      border-color: #007bff;
    }
    .form-control:focus,
    .form-select:focus,
    textarea:focus {
      border-color: #007bff;
      box-shadow: none;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      color: #ffffff;
    }
    .form-label {
      color: #000;
    }
    .form-outline {
      position: relative;
    }
    .form-outline label {
      position: absolute;
      top: -10px;
      left: 12px;
      background: #ffffff;
      padding: 0 5px;
      font-size: 14px;
      color: #6c757d;
      transition: all 0.3s;
    }
    .form-control:focus + .form-label,
    .form-control:not(:placeholder-shown) + .form-label,
    textarea:focus + .form-label,
    textarea:not(:placeholder-shown) + .form-label {
      top: -20px;
      font-size: 12px;
      color: #007bff;
    }
    .img-container {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }
    .img-container img {
      max-width: 100%;
      width: 500px; /* Membesarkan ukuran gambar */
      border-radius: 10px;
      box-shadow: 0px 5px 20px 0px rgba(0, 123, 255, 0.3);
      transition: transform 0.5s ease-in-out;
      animation: float 3s ease-in-out infinite; /* Animasi gerakan */
    }
    /* Efek hover memperbesar gambar */
    .img-container img:hover {
      transform: scale(1.1);
    }
    /* Animasi gerakan naik-turun */
    @keyframes float {
      0% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-10px);
      }
      100% {
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>
  <section class="vh-100">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card-body">
            <div class="row justify-content-center">
              <!-- Form Container -->
              <div class="form-container col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <h1 class="fw-bold mb-4">EDIT KURSUS</h1>
                @include('component.truefalse')
                <form action="{{ route('kursus.update', $datakursus->id) }}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="mb-4">
                    <label for="title" class="form-label">Masukan Judul</label>
                    <input type="text" name="title" value="{{ $datakursus->title }}" id="title" class="form-control" required />
                  </div>

                  <div class="mb-4">
                    <label for="price" class="form-label">Masukan Harga</label>
                    <input type="text" name="price" value="{{ $datakursus->price }}" id="price" class="form-control" required />
                  </div>

                  <div class="mb-4">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control" rows="5" required>{{ $datakursus->description }}</textarea>
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
