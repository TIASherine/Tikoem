<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Tikoem</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --primary-color: #7B4B33;
            --secondary-color: #D4B892;
            --tertiary-color: #6C8360;
            --dark-color: #3B302B;
            --light-color: #f5ece5;
            --background-color: rgb(250, 247, 243);
            --card-color: #f7f0eaff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background-color);
            color: var(--dark-color);
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

        .hero-section {
            background-image: linear-gradient(rgba(123, 75, 51, 0.50), rgba(123, 75, 51, 0.50)),
                url('/assets/images/admin_banner.png');
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

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top z-50">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-coffee fa-2x"></i>
                <div class="logo-text">
                    Tikoem
                    <small class="text-muted d-block" style="font-size: 0.65rem; font-weight: 500;"> Kafe GSG </small>
                </div>
            </a>

            <!-- Toggle Button -->
            <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
                <i class="fas fa-bars"></i> Menu
            </button>

        </div>
    </nav>

    <!-- Offcanvas Sidebar -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title fw-bold" style="color: var(--primary-color);" id="sidebarMenuLabel">Menu</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-3 d-flex flex-column" style="height: 100%;">
            <ul class="nav flex-column mb-auto">
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-dark fw-semibold">
                        <i class="fas fa-users me-2"></i> Daftar Karyawan
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-dark fw-semibold">
                        <i class="fas fa-box-open me-2"></i> Produk
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column mt-auto">
                <li class="nav-item mb-2">
                    <a href="/auth/logout" class="nav-link text-dark fw-semibold">
                        <i class="fas fa-sign-out me-2"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h2>Selamat datang, {{ session('name') }} !</h2>
        </div>
    </section>

    <!-- Main Content -->
    <section id="content" class="container py-5">
        <div class="d-flex align-items-center">
            <!-- Search form -->
            <form class="navbar-search form-inline" id="navbar-search-main">
                <div class="input-group input-group-merge search-bar" style="border: 1px solid black;">
                    <span class="input-group-text" id="topbar-addon">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" class="form-control" id="topbarInputIconLeft"
                        placeholder="Search" aria-label="Search" aria-describedby="topbar-addon">
                </div>
            </form>
            <!-- / Search form -->
        </div>

        <br>

        <div class="row g-4">
            <!-- Pemasukan & Pengeluaran Card -->
            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <h5 class="card-title fw-semibold">Pemasukan & Pengeluaran</h5>
                            </div>
                        </div>
                        <!-- Chart.js - Profit Chart -->
                        <canvas id="earning"></canvas>
                    </div>
                </div>
            </div>

            <!-- Aktivitas Terbaru Card -->
            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="card h-100 overflow-auto" style="max-height: 400px;">
                    <div class="card-body">
                        <h5 class="card-title mb-3 fw-semibold">Aktivitas Terbaru</h5>
                        <ul class="timeline-widget mb-0 position-relative mb-n5"
                            style="list-style: none; padding-left: 0;">
                            <li class="timeline-item d-flex position-relative overflow-hidden mb-3">
                                <div class="timeline-time text-dark flex-shrink-0 text-end" style="width: 60px;">09:30
                                </div>
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center mx-2">
                                    <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-2"
                                        style="width: 12px; height: 12px; border-radius: 50%;"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"
                                        style="width: 2px; background-color: var(--primary-color); flex-grow: 1;"></span>
                                </div>
                                <div class="timeline-desc fs-6 text-dark mt-n1 flex-grow-1">Payment received from John
                                    Doe of $385.90
                                </div>
                            </li>
                            <li class="timeline-item d-flex position-relative overflow-hidden mb-3">
                                <div class="timeline-time text-dark flex-shrink-0 text-end" style="width: 60px;">10:00
                                    am</div>
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center mx-2">
                                    <span class="timeline-badge border-2 border flex-shrink-0 my-2"
                                        style="width: 12px; height: 12px; border-radius: 50%; border-color: var(--tertiary-color) !important;"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"
                                        style="width: 2px; background-color: var(--tertiary-color); flex-grow: 1;"></span>
                                </div>
                                <div class="timeline-desc fs-6 text-dark mt-n1 fw-semibold flex-grow-1">New sale
                                    recorded <a href="javascript:void(0)" class="d-block fw-normal"
                                        style="color: var(--primary-color);">#ML-3467</a>
                                </div>
                            </li>
                            <li class="timeline-item d-flex position-relative overflow-hidden mb-3">
                                <div class="timeline-time text-dark flex-shrink-0 text-end" style="width: 60px;">12:00
                                    am</div>
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center mx-2">
                                    <span class="timeline-badge border-2 border border-success flex-shrink-0 my-2"
                                        style="width: 12px; height: 12px; border-radius: 50%;"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"
                                        style="width: 2px; background-color: #28a745; flex-grow: 1;"></span>
                                </div>
                                <div class="timeline-desc fs-6 text-dark mt-n1 flex-grow-1">Payment was made of $64.95
                                    to Michael
                                </div>
                            </li>
                            <!-- Add more timeline items as needed -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Tikoem Kafe GSG. All rights reserved.</p>
    </footer>

    <!-- Scripts -->
    <script>
        // Profit Chart (Line Chart)
        var earnintCtx = document.getElementById('earning').getContext('2d');
        var earning = new Chart(earnintCtx, {
            type: 'line',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ],
                datasets: [{
                        label: 'Pemasukan',
                        data: [120, 150, 110, 130, 170, 190, 160, 200, 180, 210, 230, 220],
                        backgroundColor: 'rgba(40, 167, 69, 0.2)',
                        borderColor: 'rgba(40, 167, 69, 1)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Pengeluaran',
                        data: [100, 110, 130, 90, 120, 130, 190, 150, 130, 170, 160, 180],
                        backgroundColor: 'rgba(220, 53, 69, 0.2)',
                        borderColor: 'rgba(220, 53, 69, 1)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>