<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
  <form action="{{ route('create.kuis')}}" method="POST">
    @csrf
  <div class="row">
  <div class="col">
    <input type="text" name="pertanyaan" class="form-control" placeholder="Masukan pertanyaan">
    <input type="text" name="pilihan_1" class="form-control" placeholder="Masukan opsi">
    <input type="text" name="pilihan_2"class="form-control" placeholder="Masukan opsi">
  </div>
  <div class="col">
    <input type="text" name="pilihan 3" class="form-control" placeholder="Masukan opsi">
    <input type="text" name="jawaban" class="form-control" placeholder="Masukan jawaban">
     <div class="col-md-4">
     <div class="mb-3">
                <label for="kelas_id">Pilih sub materi</label>
                <select class="form-select" name="submateri_id" id="submateri_id" required>
                  @foreach ($data as $item)
                      <option value="{{ $item->id }}">{{ $item->title }}</option>
                  @endforeach
                </select>
    </div>
    <button type="submit">kirim</button>
  </div>
  </div>
</div>
</form>
</body>
</html>