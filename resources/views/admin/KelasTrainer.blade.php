<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <h2>Tambahkan Trainer ke Kelas</h2>

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('addTrainerToClass') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kelas_id">Pilih Kelas</label>
            <select name="kelas_id" id="kelas_id" class="form-control" required>
                @foreach($kelas as $kls)
                    <option value="{{ $kls->id }}">{{ $kls->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="trainer_id">Pilih Trainer</label>
            <select name="trainer_id" id="trainer_id" class="form-control" required>
                @foreach($trainers as $trainer)
                    <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Tambahkan Trainer</button>
    </form>
</div>
</body>
</html>