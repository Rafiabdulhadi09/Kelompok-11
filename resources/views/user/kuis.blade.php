<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
</head>
<body>
    @if (session('message'))
        <div class="alert alert-success mt-4">
            {{ session('message') }}
        </div>
    @endif
 <form action="{{ route('kirim.kuis') }}" method="POST">
        @csrf
        @foreach ($data->kuis as $item)
            <h3>{{ $item->pertanyaan }}</h3>

            <label>
                <input type="radio" name="pertanyaan[{{ $item->id }}]" value="{{ $item->pilihan_1 }}">
                {{ $item->pilihan_1 }}
            </label><br>

            <label>
                <input type="radio" name="pertanyaan[{{ $item->id }}]" value="{{ $item->pilihan_2 }}">
                {{ $item->pilihan_2 }}
            </label><br>

            <label>
                <input type="radio" name="pertanyaan[{{ $item->id }}]" value="{{ $item->pilihan_3 }}">
                {{ $item->pilihan_3 }}
            </label><br>
        @endforeach
        <button type="submit">Kirim</button>
    </form>

</body>
</html>