<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Buat Kuis</title>
  <style>
    body {
        font-family: 'Nunito', sans-serif;
        background-color: #f8f9fc;
    }
    .container {
        margin-top: 50px;
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        color: #4e73df;
        margin-bottom: 20px;
    }
    button {
        background-color: #4e73df;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        transition: background-color 0.3s;
    }
    button:hover {
        background-color: #3b5b9a;
    }
  </style>
</head>
<body>

<div class="container">
    <h2>Buat Kuis</h2>
    <form action="{{ route('create.kuis') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="pertanyaan" class="form-control" placeholder="Masukkan pertanyaan" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <input type="text" name="pilihan_1" class="form-control" placeholder="Masukkan opsi 1" required>
            </div>
            <div class="col">
                <input type="text" name="pilihan_2" class="form-control" placeholder="Masukkan opsi 2" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <input type="text" name="pilihan_3" class="form-control" placeholder="Masukkan opsi 3" required>
            </div>
            <div class="col">
                <input type="text" name="jawaban" class="form-control" placeholder="Masukkan jawaban" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="submateri_id" class="form-label">Pilih Sub Materi</label>
            <select class="form-select" name="submateri_id" id="submateri_id" required>
                <option value="" disabled selected>Pilih sub materi</option>
                @foreach ($data as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>

</body>
</html>
