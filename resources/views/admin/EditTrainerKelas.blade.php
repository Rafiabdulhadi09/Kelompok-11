<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Trainer Kelas</title>
    <style>
        body {
            background-color: #f1f1f1; /* Latar belakang putih */
            color: #000; /* Teks hitam */
        }

        .form-container {
            max-width: 700px;
            margin: 100px auto;
            background: #fff; /* Warna form lebih terang */
            padding: 60px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            color: #000; /* Teks hitam */
        }

        .form-control,
        .form-select {
            background-color: #ffffff; /* Latar belakang putih */
            color: #000; /* Teks hitam */
            border-color: #00A6FF; /* Border biru */
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #00A6FF;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #00A6FF; /* Warna biru */
            border-color: #00A6FF;
            color: #ffffff; /* Teks putih pada tombol */
        }

        label {
            color: #000; /* Teks hitam */
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Edit Trainer untuk Kelas {{ $kelas->name }}</h2>

        <!-- Menampilkan pesan jika ada -->
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('updateTrainerToClass', $kelas->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="kelas_id">Pilih Kelas</label>
                <select class="form-select" name="kelas_id" id="kelas_id" required>
                    <option value="{{ $kelas->id }}">{{ $kelas->id }}</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="user_id">Pilih Trainer</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach($trainers as $trainer)
                        <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Perbarui Trainer</button>
        </form>
    </div>
</body>

</html>
