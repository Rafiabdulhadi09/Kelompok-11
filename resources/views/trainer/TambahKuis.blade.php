<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Buat Kuis</title>
</head>
<body>
  <div class="container mt-5">
    <h3 class="mb-4">Formulir Buat Kuis</h3>
    <form action="{{ route('create.kuis')}}" method="POST">
      @csrf
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="pertanyaan" class="form-label">Pertanyaan</label>
          <input type="text" name="pertanyaan" class="form-control" placeholder="Masukkan pertanyaan" required>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="pilihan_1" class="form-label">Pilihan 1</label>
          <input type="text" name="pilihan_1" class="form-control" placeholder="Masukkan opsi 1" required>
        </div>
        <div class="col-md-6 mb-3"> 
          <label for="pilihan_2" class="form-label">Pilihan 2</label>
          <input type="text" name="pilihan_2" class="form-control" placeholder="Masukkan opsi 2" required>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="pilihan_3" class="form-label">Pilihan 3</label>
          <input type="text" name="pilihan_3" class="form-control" placeholder="Masukkan opsi 3" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="jawaban" class="form-label">Jawaban Benar</label>
          <input type="text" name="jawaban" class="form-control" placeholder="Masukkan jawaban yang benar" required>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="materi_id" class="form-label">Pilih Sub Materi</label>
          <select class="form-select" name="materi_id" id="materi_id" required>
            <option selected disabled>Pilih sub materi</option>
            @foreach ($data as $item)
              <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+0DI1QsgNJsr8J+qfs5K5pdir1f5" crossorigin="anonymous"></script>
</body>
</html>
