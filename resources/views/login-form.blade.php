<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login Tikoem</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Inter & Poppins Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary-color: #7B4B33;
            --secondary-color: #D4B892;
            --dark-color: #3B302B;
            --light-color: #EFE9E4;
            --background-color: #FAF7F3;
            --highlight-color: #6C8360;
        }

        body {
            background-image: url('https://i.pinimg.com/736x/57/19/31/57193110209ccde092dd7e46cb5b5ce7.jpg');
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Inter', sans-serif;
        }

        .login-card {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border-radius: 1.5rem;
            background-color: #ffffff;
            border: none;
            overflow: hidden;
        }

        .card-header {
            background-color: var(--primary-color);
            color: white;
            border-top-left-radius: 1.5rem;
            border-top-right-radius: 1.5rem;
            text-align: center;
            padding: 1.5rem;
        }

        .header-content h3 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            margin-bottom: 0.25rem;
            font-size: 1.8rem;
        }

        .header-content p {
            font-weight: 300;
        }

        .card-body {
            padding: 2.5rem;
        }

        .form-control {
            border-radius: 0.75rem;
            border: 1px solid var(--secondary-color);
            padding: 0.75rem 1rem;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(123, 75, 51, 0.25);
        }


        .btn-primary {
            border-radius: 0.75rem;
            background-color: var(--primary-color);
            border: none;
            padding: 0.75rem 1rem;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--dark-color);
        }

        .card-footer {
            background-color: transparent;
            text-align: center;
            padding-bottom: 1.5rem;
        }

        .small-text {
            color: var(--dark-color);
        }

        a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        a:hover {
            color: var(--dark-color);
        }

        .alert-danger {
            color: #842029;
            background-color: #f8d7da;
            border-color: #f5c2c7;
            border-radius: 0.75rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6">
                <div class="card login-card">
                    <div class="card-header">
                        @if (session('message_success'))
                        <div id="success-alert" class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            {{ session('message_success') }}
                        </div>
                        @endif

                        <div class="header-content">
                            <i class="fas fa-mug-hot fa-3x mb-2" style="color: var(--secondary-color);"></i>
                            <h3> Masuk Kembali Ke Akun Anda </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status') === 'error')
                        <div class="alert alert-danger mb-4" role="alert">
                            Nama pengguna atau kata sandi salah. Silakan coba lagi.
                        </div>
                        @endif

                        <form action="{{ route('auth.login.post') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="form-label">Nama Pengguna</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Masukkan nama pengguna Anda" required value="{{ old('name') }}">
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukkan kata sandi Anda" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Masuk ke Tikoem</button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer">
                        <p class="small-text"> Belum punya akun? <a href="/auth/signup"> Daftar sekarang</a></p>
                        <p class="small-text mt-2"><a href="#">Lupa Kata Sandi?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            setTimeout(() => {
                successAlert.remove();
            }, 1500);
        }
    });
</script>