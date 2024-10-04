<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Bukti Pembayaran</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            background-color: #f0f4f8; /* Soft pastel background */
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 600px;
            padding: 40px;
            border-radius: 15px;
            background-color: #ffffff;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1); /* Softer shadow */
            transition: all 0.3s ease;
            animation: fadeInUp 1s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .container:hover {
            box-shadow: 0px 6px 16px rgba(0, 0, 0, 0.15); /* Slightly stronger hover shadow */
        }

        h4 {
            font-weight: 700;
            font-size: 28px;
            color: #4a5568; /* Soft gray for title */
            margin-bottom: 30px;
            text-align: center;
        }

        label {
            font-weight: 500;
            font-size: 18px;
            color: #2d3748; /* Calm dark gray for labels */
        }

        input[type="file"] {
            border: 2px solid #cbd5e0; /* Soft pastel border */
            padding: 15px;
            border-radius: 10px;
            transition: border 0.3s ease;
            font-size: 16px;
            color: #2d3748;
        }

        input[type="file"]:focus {
            border-color: #a0aec0; /* Lighter gray focus border */
        }

        .btn-primary {
            background-color: #007bff; /* Blue color for the button */
            border-color: #007bff;
            width: 100%;
            padding: 16px;
            font-size: 20px;
            border-radius: 10px;
            transition: background-color 0.3s ease;
            color: #ffffff; /* White text color */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        /* Loading animation */
        .loading-spinner {
            display: none;
            margin: 20px auto;
        }

        .loading {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #007bff; /* Match spinner color with button */
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>

    <div class="container animate__animated animate__fadeInUp">
        <h4 class="text-center">Unggah Bukti Pembayaran</h4>
        <form id="paymentForm">
            <div class="mb-3">
                <label for="bukti_pembayaran" class="form-label">Upload Bukti Pembayaran</label>
                <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" required>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Bukti Pembayaran</button>
        </form>
        <div class="loading">
            <div class="loading-spinner"></div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('paymentForm').addEventListener('submit', function (event) {
            event.preventDefault();
            document.querySelector('.loading-spinner').style.display = 'block';

            setTimeout(() => {
                alert('Bukti pembayaran berhasil diunggah!');
                document.querySelector('.loading-spinner').style.display = 'none';
                document.getElementById('paymentForm').reset();
            }, 2000); // Simulate a 2 second upload time
        });
    </script>
</body>

</html>
