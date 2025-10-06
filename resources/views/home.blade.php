<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Tikoem </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
    :root {
        --primary-color: #7B4B33;
        --secondary-color: #D4B892;
        --tertiary-color: #6C8360;
        --dark-color: #3B302B;
        --light-color: #EFE9E4;
        --background-color: #d5cbbeff;
        --card-color: #f7f0eaff;
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--background-color);
        color: var(--dark-color);
        background-image: url('https://i.pinimg.com/736x/f9/fb/2f/f9fb2ffac6e09e1104e7d4057735591a.jpg');
    }

    .navbar {
        background-color: var(--card-color) !important;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
    }

    .navbar-brand {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: var(--primary-color) !important;
        display: flex;
        align-items: center;
    }

    .navbar-brand .logo-text {
        margin-left: 8px;
        font-size: 1.3rem;
    }

    .nav-link {
        font-weight: 500;
        color: var(--dark-color) !important;
        transition: color 0.3s ease;
    }

    .nav-link:hover,
    .nav-link.active {
        color: var(--primary-color) !important;
    }

    .hero-section {
        background-image: linear-gradient(rgba(123, 75, 51, 0.50), rgba(123, 75, 51, 0.50)),
            url('https://i.pinimg.com/736x/70/b2/43/70b2430b4eae81b01749e693c16baa67.jpg');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 80px 0;
        text-align: center;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
    }

    .hero-section h1 {
        font-weight: 700;
        font-size: 2.8rem;
    }

    .card {
        border: none;
        border-radius: 16px;
        background-color: var(--card-color);
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card .list-group-item {
    background-color: var(--card-color);
    border: none;
    border-top: 1px solid rgba(0, 0, 0, 0.05);
}

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
    }

    .card-title {
        color: var(--primary-color);
        font-weight: 600;
    }

    .btn-primary {
        background-color: var(--primary-color);
        border: none;
        font-weight: 600;
        border-radius: 10px;
    }

    .btn-primary:hover {
        background-color: #643B26;
    }

    .alert-primary {
        background-color: #FFF7F3;
        color: var(--primary-color);
        border-left: 5px solid var(--primary-color);
        border-radius: 8px;
    }

    .alert-success {
        background-color: #F6F8F4;
        color: var(--tertiary-color);
        border-left: 5px solid var(--tertiary-color);
        border-radius: 8px;
    }

    .accordion-item {
        border: 1px solid var(--light-color);
        border-radius: 12px;
        margin-top: 10px;
    }

    .accordion-button {
        background-color: var(--background-color);
        color: var(--dark-color);
        font-weight: 600;
    }

    .accordion-button:not(.collapsed) {
        background-color: var(--primary-color);
        color: white;
    }

    .badge {
        font-weight: 600;
        border-radius: 50px;
        padding: 0.5em 0.8em;
    }

    .badge-seller {
        background-color: var(--secondary-color);
        color: var(--dark-color);
    }

    .badge-delivery {
        background-color: var(--tertiary-color);
        color: white;
    }

    .table thead {
        background-color: var(--primary-color);
        color: white;
    }

    .footer {
        margin-top: 60px;
        padding: 30px 0;
        background-color: var(--dark-color);
        color: white;
        text-align: center;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
    }

    .footer p {
        color: #c7c7c7;
    }
</style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top z-50">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-coffee fa-2x"></i>
                <div class="logo-text">
                    Tikoem
                    <small class="text-muted d-block" style="font-size: 0.65rem; font-weight: 500;"> Kafe GSG </small>
                </div>
            </a>
            <div id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Daftar Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Pesanan Baru</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tim Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="/auth"> {{ $state }} </a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container">
            <h2> Selamat datang, {{ $username }}! </h4>
            <p>Siap untuk hari penuh aroma kopi? Terakhir login {{ $last_login }} </p>
        </div>
    </section>

    <section id="content" class="container py-5">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-bell me-2"></i>Papan Notifikasi Pesanan</h5>
                        <p class="text-muted mb-4">Informasi terbaru agar kopi tak menunggu.</p>
                        <div class="alert alert-primary mb-3">Pesanan dari Budi sudah masuk! Siap diracik.</div>
                        <div class="alert alert-success mb-3">Pesanan dari Ani telah selesai. Siap diantar!</div>
                        <div class="alert alert-primary mb-3">Pesanan dari Cici sedang dalam proses pembuatan.</div>
                        <div class="alert alert-success mb-3">Pesanan dari Dewi sudah di tangan Kurir.</div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title"><i class="fas fa-coffee me-2"></i>Inspirasi Harian</h5>
                            <p class="text-muted">Lihat semua racikan minuman dan camilan kami.</p>
                            <a href="#" class="btn btn-primary mt-3">Telusuri Menu <i class="fas fa-mug-hot ms-2"></i></a>
                        </div>

                        <hr class="my-4 text-muted">

                        <div class="accordion" id="accordionInfo">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false">
                                        <i class="fas fa-info-circle me-2"></i>Tentang Tikoem
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionInfo">
                                    <div class="accordion-body text-muted">
                                        Tikoem adalah kedai kopi harian yang mengutamakan kenyamanan, kualitas biji kopi lokal terbaik, dan suasana hangat untuk semua pelanggan setia kami.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-clipboard-list me-2"></i>Antrean Pesanan Aktif</h5>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Pelanggan</th>
                                        <th>Racikan</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#001</td>
                                        <td>Ani</td>
                                        <td>Es Kopi Susu Aren</td>
                                        <td>1</td>
                                        <td>Rp 13.000</td>
                                        <td><span class="badge bg-success">Siap Diantar</span></td>
                                    </tr>
                                    <tr>
                                        <td>#002</td>
                                        <td>Budi</td>
                                        <td>Nasi Goreng Spesial</td>
                                        <td>2</td>
                                        <td>Rp 30.000</td>
                                        <td><span class="badge bg-danger">Dibatalkan</span></td>
                                    </tr>
                                    <tr>
                                        <td>#003</td>
                                        <td>Cici</td>
                                        <td>Hot Cappuccino</td>
                                        <td>1</td>
                                        <td>Rp 15.000</td>
                                        <td><span class="badge bg-warning text-dark">Diracik</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-users-cog me-2"></i>Tim Kopi Terbaik</h5>
                        <div class="mb-3">
                            <span class="badge badge-seller me-2"><i class="fas fa-cash-register me-1"></i> Barista/Kasir</span>
                            <span class="badge badge-delivery"><i class="fas fa-motorcycle me-1"></i> Kurir</span>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div><i class="fas fa-user-circle fa-2x me-3 text-secondary"></i>Rian Adi</div>
                                <span class="badge badge-seller">Barista</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div><i class="fas fa-user-circle fa-2x me-3 text-secondary"></i>Sinta Dewi</div>
                                <span class="badge badge-delivery">Kurir</span>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-primary w-100 mt-3">Kelola Tim <i class="fas fa-chevron-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Tikoem. Diracik dengan sepenuh hati.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
