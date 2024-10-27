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
                            <h1>Data Soal Pada Kelas : {{ $kelas->title }}</h1>
                            <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#TambahKuis">
                                Tambah Kuis
                            </button>
                        </div>
                        @include('component.truefalse')
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;">Pertanyaan</th>
                                            <th style="text-align: center; vertical-align: middle;">Pilihan 1</th>
                                            <th style="text-align: center; vertical-align: middle;">Pilihan 2</th>
                                            <th style="text-align: center; vertical-align: middle;">Pilihan 3</th>
                                            <th style="text-align: center; vertical-align: middle;">Jawaban</th>
                                            <th style="text-align: center; vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach ($kelas->kuis as $item)
                                         <tbody>
                                              <td>{{ $item->pertanyaan }}</td>
                                              <td>{{ $item->pilihan_1 }}</td>
                                              <td>{{ $item->pilihan_2 }}</td>
                                              <td>{{ $item->pilihan_3 }}</td>
                                              <td>{{ $item->jawaban }}</td>
                                              <td>
                                                  <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#editKuisModal-{{ $item->id }}">Edit</button>
                                                 <form action="{{ route('delete.kuis', $item->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                              </td>
                                         </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- Modal Popup untuk Tambah Kuis -->
  <div class="modal fade" id="TambahKuis" tabindex="-1" role="dialog" aria-labelledby="TambahKuis" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                  <h5 class="modal-title" id="TambahKuis">Tambah Kuis</h5>
                  <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('create.kuis') }}" method="POST">
                  @csrf
                  <div class="modal-body">
                      <div class="form-group mb-4">
                          <label for="pertanyaan" class="font-weight-bold">Pertanyaan</label>
                          <input type="text" name="pertanyaan" class="form-control" id="pertanyaan" placeholder="Masukkan pertanyaan" required>
                      </div>

                      <div class="form-group mb-4">
                          <label for="pilihan_1" class="font-weight-bold">Pilihan 1</label>
                          <input type="text" name="pilihan_1" class="form-control" id="pilihan_1" placeholder="Masukkan pilihan 1" required>
                      </div>

                      <div class="form-group mb-4">
                          <label for="pilihan_2" class="font-weight-bold">Pilihan 2</label>
                          <input type="text" name="pilihan_2" class="form-control" id="pilihan_2" placeholder="Masukkan pilihan 2" required>
                      </div>

                      <div class="form-group mb-4">
                          <label for="pilihan_3" class="font-weight-bold">Pilihan 3</label>
                          <input type="text" name="pilihan_3" class="form-control" id="pilihan_3" placeholder="Masukkan pilihan 3" required>
                      </div>

                      <div class="form-group mb-4">
                          <label for="jawaban" class="font-weight-bold">Jawaban</label>
                          <input type="text" name="jawaban" class="form-control" id="jawaban" placeholder="Masukkan jawaban yang benar" required>
                      </div>

                      <div class="form-group mb-4">
                          <label for="kelas_id" class="font-weight-bold">Pilih Kelas</label>
                          <select class="form-control" name="kelas_id" id="kelas_id" required>
                              <option value="" disabled selected>Pilih kelas</option>
                                  <option value="{{ $kelas->id }}">{{ $kelas->title }}</option>
                          </select>
                      </div>
                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary">Kirim Kuis</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
    @foreach ($kelas->kuis as $item)
    <div class="modal fade" id="editKuisModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editKuisModalLabel-{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editKuisModalLabel-{{ $item->id }}">Edit Kuis</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('edit.kuis', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group mb-4">
                            <label for="pertanyaan" class="font-weight-bold">Pertanyaan</label>
                            <input type="text" name="pertanyaan" class="form-control" id="pertanyaan" value="{{ $item->pertanyaan }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="pilihan_1" class="font-weight-bold">Pilihan 1</label>
                            <input type="text" name="pilihan_1" class="form-control" id="pilihan_1" value="{{ $item->pilihan_1 }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="pilihan_2" class="font-weight-bold">Pilihan 2</label>
                            <input type="text" name="pilihan_2" class="form-control" id="pilihan_2" value="{{ $item->pilihan_2 }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="pilihan_3" class="font-weight-bold">Pilihan 3</label>
                            <input type="text" name="pilihan_3" class="form-control" id="pilihan_3" value="{{ $item->pilihan_3 }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="jawaban" class="font-weight-bold">Jawaban</label>
                            <input type="text" name="jawaban" class="form-control" id="jawaban" value="{{ $item->jawaban }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="kelas_id" class="font-weight-bold">Kelas</label>
                            <select class="form-control" name="kelas_id" id="kelas_id" disabled>
                                <option value="{{ $kelas->id }}" selected>{{ $kelas->title }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
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
