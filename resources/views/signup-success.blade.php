<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat Datang di Tikoem</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Inter & Poppins Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #7B4B33;
            --secondary-color: #D4B892;
            --dark-color: #3B302B;
            --light-color: #b8a89bff;
            --background-color: #FAF7F3;
            --highlight-color: #6C8360;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-image: url('https://i.pinimg.com/736x/57/19/31/57193110209ccde092dd7e46cb5b5ce7.jpg');
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            color: var(--dark-color);
            min-height: 100vh;
        }

        .navbar {
            background-color: #927a58ff !important;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand .logo-text {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: var(--primary-color) !important;
        }

        .nav-link {
            font-weight: 500;
            color: var(--dark-color) !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .hero-section {
            background-color: var(--light-color);
            background-image: none;
            color: var(--dark-color);
            padding: 80px 0 120px 0;
            text-align: center;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .hero-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .confirmation-card {
            background-color: white;
            border-radius: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            max-width: 600px;
            margin: -80px auto 50px auto;
            padding: 30px;
        }

        .detail-item {
            border-left: 4px solid var(--secondary-color);
        }

        .btn-main {
            background-color: var(--primary-color);
            color: white;
            transition: background-color 0.3s ease;
            font-weight: 600;
            padding: 0.75rem 1rem;
            border-radius: 1rem !important;
            font-size: 1.25rem;
        }

        .btn-main:hover {
            background-color: var(--dark-color);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .footer {
            margin-top: 0;
            padding: 30px 0;
            background-color: var(--dark-color);
            color: white;
            text-align: center;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }

        .navbar-brand i {
            margin-right: 0.5rem;
        }

        .hero-section .fa-check-circle {
            color: var(--highlight-color) !important;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('assets-admin/img/icons/Logo.png') }}" height="50px" width="50px" alt="Logo">
                <div class="logo-text ms-2">
                    Tikoem
                    <small class="text-muted" style="font-size: 0.65rem; display: block; font-weight: 500;">
                        Cafe GSG
                    </small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="text-white">
                <i class="fas fa-check-circle me-3"></i>
                Pendaftaran Berhasil!
            </h1>
        </div>
    </section>

    <!-- Confirmation Card -->
    <div class="confirmation-card mx-auto">
        <h3 class="h4 font-weight-bold mb-4 text-center" style="color: var(--primary-color);">
            Detail Akun Anda
        </h3>

        <!-- Name -->
        <div class="detail-item p-3 mb-4 rounded bg-light">
            <p class="text-secondary mb-1">
                <i class="fas fa-user me-2"></i> Nama Anda
            </p>
            <p class="h5 font-weight-bold" style="color: var(--dark-color);">
                {{ Auth::user()->name }}
            </p>
        </div>

        <!-- Email -->
        <div class="detail-item p-3 mb-4 rounded bg-light">
            <p class="text-secondary mb-1">
                <i class="fas fa-user me-2"></i> Email Anda
            </p>
            <p class="h5 font-weight-bold" style="color: var(--dark-color);">
                {{ Auth::user()->email }}
            </p>
        </div>

        <!-- Role -->
        <div class="detail-item p-3 mb-4 rounded bg-light">
            <p class="text-secondary mb-1">
                <i class="fas fa-key me-2"></i> Role Anda
            </p>
            <p class="h5 font-weight-bold" style="color: var(--dark-color);">
                {{ Auth::user()->role }}
            </p>
        </div>

        <a href="/home" class="btn btn-main w-100 d-block text-center">
            Mulai ke Dashboard <i class="fas fa-arrow-right ms-2"></i>
        </a>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Tikoem. Diracik dengan sepenuh hati.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
