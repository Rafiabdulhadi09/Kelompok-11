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
  <div class="container border border-light-subtle">
    <h2>Tambahkan Trainer ke Kelas</h2>

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('addTrainerToClass') }}" method="POST">
        @csrf
              <div class="col-md-7 col-lg-5 col-xl-5 ">
          <label for="kelas_id">Pilih Kelas</label>
            <select class="form-select" aria-label="Default select example" name="kelas_id" id="kelas_id" required>
                @foreach($kelas as $kls)
                    <option value="{{ $kls->id }}">{{ $kls->title }}</option>
                @endforeach
            </select>

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