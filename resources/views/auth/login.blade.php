<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('{{ asset('img/bg-login.jpg') }}') no-repeat center center / cover;
            position: relative;
        }

        /* Lapisan transparan + blur di atas background */
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(5px);
            z-index: 0;
        }

        .login-container {
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            padding: 30px;
            position: relative;
            z-index: 1;
        }

        .login-wrapper {
            display: flex;
            width: 90%;
            max-width: 1000px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }

        .login-image {
            flex: 1;
            background: url('{{ asset('img/satpam.JPG') }}') no-repeat center center;
            background-size: cover;
        }

        .login-form {
            flex: 1;
            padding: 50px 40px;
        }

        .login-form h2 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 500;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        .logo {
            display: block;
            margin: 0 auto 20px;
            width: 60px;
        }

        @media (max-width: 768px) {
            .login-wrapper {
                flex-direction: column;
            }
            .login-image {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-wrapper">
            <!-- Kiri: Gambar -->
            <div class="login-image d-none d-md-block"></div>

            <!-- Kanan: Form Login -->
            <div class="login-form">
                <img src="{{ asset('img/logo.jpg') }}" alt="Logo" class="logo">
                <h2>Login Admin</h2>

                @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ url('/login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required autofocus placeholder="admin@domain.com">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" name="password" required placeholder="********">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
