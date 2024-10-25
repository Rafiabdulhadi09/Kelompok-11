<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <section class="vh-100" style="background-color: #ffffff;">
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Daftar</p>
                @include('component.truefalse')
                <form id="registerForm" action="{{ url('register/user') }}" method="post" class="mx-1 mx-md-4" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                  {{-- input Name --}}
                  <div class="d-flex flex-row align-items-center mb-4">
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <label class="form-label" for="nama">Masukan Nama <span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" id="nama" class="form-control" />
                      </div>
                  </div>
                  {{-- End input Name --}}
                    {{-- input Email --}}
                    <div class="col-md-6 mb-4">
                      <div data-mdb-input-init class="form-outline">
                      <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" />
                      </div>
                    </div>
                    {{-- End input Email --}}
                    {{-- input password --}}
                    <div class="col-md-6 mb-4">
                      <div data-mdb-input-init class="form-outline">
                      <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" id="password" class="form-control" />
                      </div>
                    </div>
                    {{-- End input password --}}
                  </div>
                  {{-- select Kelamin --}}
                  <div class="input-group">
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="jk">Jenis Kelamin<span class="text-danger">*</span></label>
                      <select class="form-select" name="jk"id="inputGroupSelect04" aria-label="Example select with button addon">
                        <option value="laki-laki">laki-laki</option>
                        <option value="perempuan">perempuan</option>
                      </select>
                    </div>
                  </div>
                  {{-- End select Jenis Kelamin --}}
                  <br>
                  {{-- input alamat --}}
                  <div class="mb-3">
                    <div class="form-outline flex-fill mb-0">
                    <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                      <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                    </div>
                  </div>
                  {{-- End input alamat --}}
                  
                  <div class="d-grid gap-2">
                    <button type="button" id="register" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Register</button>
                  </div>
                </form>
              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('register').addEventListener('click', function (event) {
      event.preventDefault(); // Mencegah form dikirim langsung
      
      let email = document.getElementById('email').value;
      let password = document.getElementById('password').value;
      let name = document.getElementById('nama').value;
      let alamat = document.getElementById('alamat').value;
      
      // Validasi sederhana untuk input kosong
      if (!email || !password || !name || !alamat) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Semua kolom wajib diisi!',
          confirmButtonText: 'Coba Lagi'
        });
      } else {
        // Jika valid, tampilkan alert sukses dan kirim form
        Swal.fire({
          position: "center",
          icon: "success",
          title: "Pendaftaran berhasil!",
          showConfirmButton: false,
          timer: 1500
        }).then(function() {
          // Kirim form secara manual
          document.getElementById('registerForm').submit();
        });
      }
    });
  </script>
  
</section>
</body>
</html>
