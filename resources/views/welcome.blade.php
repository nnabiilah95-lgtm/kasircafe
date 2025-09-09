<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Nescaffe</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .bg-cover {
            background: url('http://127.0.0.1:8000/images/bg-coffe.jpg') no-repeat center center;
            background-size: cover;
            height: 100vh;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.6);
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }

        .btn-custom {
            background-color: #d6001c;
            /* warna khas Nescafe */
            border: none;
        }

        .btn-custom:hover {
            background-color: #b00017;
        }
    </style>
</head>

<body>
    <div class="bg-cover">
        <div class="overlay">
            <div>
                <h1 class="display-4 fw-bold">Welcome to Kasir Nescaffe</h1>
                <p class="lead">Sistem Kasir Café yang Simple & Efisien</p>
                <a href="{{ url('/login') }}" class="btn btn-lg btn-custom text-white mt-3">Login</a>
                <a href="{{ url('/dashboard') }}" class="btn btn-lg btn-custom text-white mt-3">Masuk Dashboard</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
