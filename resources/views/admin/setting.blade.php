<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hallo word</h1>
    <form action="{{route('update_sosialmedia'), $sosialmedia->id}}" method="POST">
        @csrf
        @method="PUT"
    <label for="x" class="form-label">Masukan Judul</label>
    <input type="text" value="{{ $item->x }}" name="x" id="x" class="form-control" required />

    <label for="instagram" class="form-label">Masukan Judul</label>
    <input type="text" value="{{ $item->instagram }}" name="instagram" id="instagram" class="form-control" required />

    <label for="youtube" class="form-label">Masukan Judul</label>
    <input type="text" value="{{ $item->youtube }}" name="youtube" id="youtube" class="form-control" required />
       
        <button type="submit">Kirim</button>
    </form>
</body>
</html>