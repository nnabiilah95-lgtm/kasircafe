<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kasir Nescaffé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;

            /* Background warna + gambar cangkir kopi */
            background: url("/images/bg.login.jpg") no-repeat center center fixed;
            background-size: cover;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(111, 33, 0, 0.6); /* gradasi coklat kopi */
            z-index: -1;
        }

        .login-box {
            width: 380px;
            padding: 30px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.4);
        }

        h1 {
            font-weight: bold;
            color: white;
            margin-bottom: 30px;
        }

        .btn-login {
            background-color: #b13c2e;
            border: none;
        }

        .btn-login:hover {
            background-color: #922b21;
        }
    </style>
</head>

<body>
    <div class="overlay"></div>

    <div class="container text-center">
        <h1>Kasir Nescaffé</h1>
        <div class="login-box mx-auto">
            <h3 class="mb-4">Login</h3>

            <!-- Flash message -->
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email"
                        placeholder="admin@mail.com" required>
                </div>

                <div class="mb-3 text-start">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password"
                        placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn btn-login w-100 text-white">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
