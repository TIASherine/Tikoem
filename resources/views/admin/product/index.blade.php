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

    <!-- CSS -->
    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets-admin/css/custom .css') }}" rel="stylesheet">

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
    @include('layouts.admin.header')

    <!-- Main Content -->
    <section id="content" class="container py-5">
        <!-- Filter Start -->
        <div class="mb-3">
            <form method="GET" action="{{ route('product.index') }}" class="col-md-7 row g-2">
                <div class="col-md-4">
                    <label for="categoryFilter" class="form-label visually-hidden">Filter Kategori</label>
                    <select name="category" onchange="this.form.submit()" class="form-select" id="categoryFilter">
                        <option value="All" {{ request('category') == 'All' ? 'selected' : '' }}> Semua Kategori
                        </option>
                        <option value="Minuman" {{ request('category') == 'Minuman' ? 'selected' : '' }}> Minuman
                        </option>
                        <option value="Makanan" {{ request('category') == 'Makanan' ? 'selected' : '' }}> Makanan
                        </option>
                        <option value="Snack" {{ request('category') == 'Snack' ? 'selected' : '' }}> Snack </option>
                        <option value="Lainnya" {{ request('category') == 'Lainnya' ? 'selected' : '' }}> Lainnya
                        </option>
                    </select>
                    @if (request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari Produk..."
                            aria-label="Search" value="{{ request('search') }}">

                        <!-- Search Button -->
                        <button type="submit" class="input-group-text btn btn-primary">
                            <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        @if (request('search') || (request('category') && request('category') != 'All'))
                            <a href="{{ route('product.index') }}" class="btn btn-outline-secondary">Clear</a>
                        @endif

                        @if (request('category') && request('category') != 'All')
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                    </div>
                </div>
            </form>

            <div class="col-md-12 text-end">
                <a href="{{ route('product.create') }}" class="btn btn-primary">
                    + Tambah Produk
                </a>
            </div>

            <br>

            <div class="row g-4">
                <div class="col-md-12 mt-4">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card border-0 shadow mb-4"></div>
                    <table class="table table-centered table-nowrap mb-0 rounded" id="table-karyawan">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0 rounded-start"> No </th>
                                <th class="border-0"> Nama Produk </th>
                                <th class="border-0"> Harga </th>
                                <th class="border-0"> Kategori </th>
                                <th class="border-0"> Jumlah Stok </th>
                                <th class="border-0"> Supplier </th>
                                <th class="border-0 rounded-end"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp

                            @foreach ($dataProduct as $row)
                                <tr>
                                    <td> {{ ($dataProduct->currentPage() - 1) * $dataProduct->perPage() + $loop->iteration }}
                                    </td>
                                    <td> {{ $row->name }} </td>
                                    <td> {{ $row->price }} </td>
                                    <td> {{ $row->category }} </td>
                                    <td> {{ $row->stock }} </td>
                                    <td> {{ $row->supplier }} </td>
                                    <td>
                                        <a href="{{ route('product.edit', $row->product_id) }}"
                                            class="btn btn-info btn-sm">
                                            <svg class="icon icon-xs me-2" data-slot="icon" fill="none"
                                                stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10">
                                                </path>
                                            </svg>
                                            Edit
                                        </a>

                                        <a href="{{ route('product.destroy', $row->product_id) }}"
                                            class="btn btn-danger btn-sm">
                                            <svg class="icon icon-xs me-2" data-slot="icon" fill="none"
                                                stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0">
                                                </path>
                                            </svg>
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $dataProduct->links('pagination::simple-bootstrap-5') }}
                    </div>
                </div>
            </div>
    </section>


    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Tikoem Kafe GSG. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
