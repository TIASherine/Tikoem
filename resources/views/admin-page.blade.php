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
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h2>Selamat datang, Admin!</h2>
            <p>Siap untuk mengelola kedai? Terakhir login pada 01 Okt 2024</p>
        </div>
    </section>

    <!-- Main Content -->
    <section id="content" class="container py-5">
        <div class="row g-4">
            <!-- Row 1 -->
            <div class="row">
                <!-- Profit & Expenses Card -->
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <div class="">
                                    <h5 class="card-title fw-semibold"> Pemasukan & Pengeluaran </h5>
                                </div>
                                <div class="dropdown">
                                    <button id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                                        class="rounded-circle btn-transparent rounded-circle btn-sm px-1 btn shadow-none">
                                        <i class="ti ti-dots-vertical fs-7 d-block"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Chart.js - Profit Chart -->
                            <canvas id="profitChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div> </div>

            <!-- Monthly Earnings Card (Product Sales) -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-start">
                                <div class="col-8">
                                    <h5 class="card-title mb-10 fw-semibold"> Penjualan </h5>
                                    <h4 class="fw-semibold mb-3"> Rp 100.000 </h4>
                                    <div class="d-flex align-items-center pb-1">
                                        <span
                                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-arrow-down-right text-danger"></i>
                                        </span>
                                        <p class="text-dark me-1 fs-3 mb-0">+3%</p>
                                        <p class="fs-3 mb-0"> Kemarin </p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-end">
                                        <div
                                            class="text-white bg-danger rounded-circle p-6 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-currency-dollar fs-6"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="earning"></div>
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
        var profitCtx = document.getElementById('profitChart').getContext('2d');
        var profitChart = new Chart(profitCtx, {
            type: 'line',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ],
                datasets: [{
                        label: 'Pemasukan',
                        data: [120, 150, 110, 130, 170, 190, 160, 200, 180, 210, 230, 220],
                        backgroundColor: '#28a745', // Hijau
                    },
                    {
                        label: 'Pengeluaran',
                        data: [100, 110, 130, 90, 120, 130, 190, 150, 130, 170, 160, 180],
                        backgroundColor: '#dc3545', // Merah
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
                    x: {
                        stacked: false,
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Product Sales Card - Earnings (Donut Chart)
        var earningCtx = document.getElementById('earning').getContext('2d');
        var earningChart = new Chart(earningCtx, {
            type: 'pie',
            data: {
                labels: ['Earnings'],
                datasets: [{
                    data: [68, 30], // Earnings and remaining
                    backgroundColor: ['#28a745', '#f5f5f5'],
                    borderColor: '#ffffff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                cutoutPercentage: 70,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
            }
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
