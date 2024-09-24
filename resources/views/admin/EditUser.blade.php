<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-color: #ffffff;
    }
    .form-container {
      max-width: 500px;
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
      max-width: 60%; /* Ukuran gambar lebih kecil */
      border-radius: 10px;
      animation: float 3s ease-in-out infinite; /* Menambahkan animasi */
      transition: transform 0.5s ease-in-out;
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
    /* Efek hover memperbesar gambar */
    .img-container img:hover {
      transform: scale(1.1);
    }
  </style>
</head>
<body>
  <div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="form-container">
      <div class="img-container">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" alt="Sample image">
      </div>
      <h1>Edit Data User</h1>
      <form action="{{ route('admin.dataUser.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="nama" class="form-label">Masukan Nama</label>
          <input type="text" name="name" value="{{ old('name', $user->name) }}" id="nama" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Masukan Email</label>
          <input type="email" name="email" value="{{ old('email', $user->email) }}" id="email" class="form-control" required>
        </div>
        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-primary btn-lg">KIRIM</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
