<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kuis</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fc;
        }
        .alert {
            margin-bottom: 20px;
        }
        h2 {
            margin-bottom: 30px;
            color: #4e73df;
            font-weight: 600;
        }
        h5 {
            margin-top: 20px;
            color: #4e73df;
            font-weight: 500;
        }
        .form-check {
            margin-bottom: 15px;
        }
        button {
            margin-top: 20px;
            background-color: #4e73df;
            color: white;
            font-weight: 500;
            font-size: 16px;
            letter-spacing: 1px;
        }
        button:hover {
            background-color: #3b5b9a;
        }
    </style>
</head>
<body>
<<<<<<< HEAD
    <div class="p-3 m-3 bg-body-secondary text-dark rounded">
        @if (session('message'))
            <div class="alert alert-success mt-4">
                {{ session('message') }}
            </div>
        @endif
=======
    @if (session('message'))
        <div class="alert alert-success mt-4">
            {{ session('message') }}
        </div>
    @endif
 <form action="{{ route('kirim.kuis', $submateri->id) }}" method="POST">
        @csrf
        @foreach ($kuis as $item)
            <h3>{{ $item->pertanyaan }}</h3>
>>>>>>> 5de1eed838f86e7284c65adb7edc6b7241ebf076

        <h2 class="text-center mb-2">Selamat Mengerjakan</h2>
        <form action="{{ route('kirim.kuis') }}" method="POST">
            @csrf
            @foreach ($data->kuis as $item)
                <h5>{{ $loop->iteration }}. {{ $item->pertanyaan }}</h5>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pertanyaan[{{ $item->id }}]" value="{{ $item->pilihan_1 }}" id="pertanyaan_{{ $item->id }}_1">
                    <label class="form-check-label" for="pertanyaan_{{ $item->id }}_1">
                        {{ $item->pilihan_1 }}
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pertanyaan[{{ $item->id }}]" value="{{ $item->pilihan_2 }}" id="pertanyaan_{{ $item->id }}_2">
                    <label class="form-check-label" for="pertanyaan_{{ $item->id }}_2">
                        {{ $item->pilihan_2 }}
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pertanyaan[{{ $item->id }}]" value="{{ $item->pilihan_3 }}" id="pertanyaan_{{ $item->id }}_3">
                    <label class="form-check-label" for="pertanyaan_{{ $item->id }}_3">
                        {{ $item->pilihan_3 }}
                    </label>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary btn-block">Kirim</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>