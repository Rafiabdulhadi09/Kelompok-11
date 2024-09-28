<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form action="{{ route('kirim.bukti') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
    <div class="form-group">
        <label for="bukti_pembayaran">Unggah Bukti Pembayaran</label>
        <input type="file" name="bukti_pembayaran" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Kirim Bukti Pembayaran</button>
</form>
</body>
</html>