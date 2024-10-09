<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unggah Bukti Pembayaran</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Alert untuk pesan sukses -->
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Unggah Bukti Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <h5>No Rekening : 12345678901234</h5>
                        <form action="{{ route('kirim.bukti') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                            <div class="mb-3">
                                <label for="bukti_pembayaran" class="form-label">Unggah Bukti Pembayaran</label>
                                <input type="file" name="bukti_pembayaran" class="form-control" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">Kirim Bukti Pembayaran</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
