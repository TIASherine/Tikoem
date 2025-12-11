<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title> Admin Panel - Tikoem </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta name="author" content="Themesberg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets-admin/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('assets-admin/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets-admin/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets-admin/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets-admin/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">

    @include('layouts.admin.style')
</head>

<body>
    <main class="content">
        @include('layouts.admin.header')

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div class="d-block mb-4 mb-md-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"> Dashboard </a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}"> Produk </a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Edit Data </li>
                    </ol>
                </nav>
                <h2 class="h4"> Edit produk </h2>
                <p class="mb-0"> Form Perubahan Data produk </p>
            </div>
        </div>

        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4"> Informasi </h2>

            @if ($errors->any())
            <div class="alert alert-danger p-3 mb-4 rounded-lg">
                <ul class="list-disc ml-5 text-sm">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('product.update') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="name"> Nama Produk </label>
                            <input class="form-control" id="name" name="name" type="text"
                                value="{{ old('name', $dataProduct->name) }}" required>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="category"> Kategori </label>
                            <select class="form-select mb-0" id="category" name="category"
                                aria-label="category select example">
                                <option selected> Kategori </option>
                                <option value="Minuman" {{ $dataProduct->category == 'Minuman' ? 'selected' : '' }}>
                                    Minuman
                                </option>
                                <option value="Makanan" {{ $dataProduct->category == 'Makanan' ? 'selected' : '' }}> Makanan
                                </option>
                                <option value="Snack" {{ $dataProduct->category == 'Snack' ? 'selected' : '' }}> Snack
                                </option>
                                <option value="Lainnya" {{ $dataProduct->category == 'Lainnya' ? 'selected' : '' }}> Lainnya
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="price"> Harga </label>
                            <input class="form-control" id="price" name="price" type="number" step="0.01"
                                min="0" value="{{ old('price', $dataProduct->price) }}" required>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="stock"> Jumlah Stok </label>
                            <input class="form-control" id="stock" name="stock" type="number" min="0"
                                value="{{ old('stock', $dataProduct->stock) }}" placeholder="0" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="supplier"> Supplier </label>
                            <input class="form-control" id="supplier" name="supplier" type="text"
                                value="{{ old('supplier', $dataProduct->supplier) }}" placeholder="Supplier Produk"
                                required>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="product_id" value="{{ $dataProduct->product_id }}" />

                <div class="mt-3">
                    <button class="btn btn-info text-white mt-2 animate-up-2" type="submit"> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <footer class="bg-white rounded shadow p-5 mb-4 mt-4">
            <div class="row">
                <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
                    <p class="mb-0 text-center text-lg-start">© 2019-<span class="current-year"></span> <a
                            class="text-primary fw-normal" href="https://themesberg.com"
                            target="_blank">Themesberg</a>
                    </p>
                </div>
                <div class="col-12 col-md-8 col-xl-6 text-center text-lg-start">
                    <!-- List -->
                    <ul class="list-inline list-group-flush list-group-borderless text-md-end mb-0">
                        <li class="list-inline-item px-0 px-sm-2">
                            <a href="https://themesberg.com/about">About</a>
                        </li>
                        <li class="list-inline-item px-0 px-sm-2">
                            <a href="https://themesberg.com/themes">Themes</a>
                        </li>
                        <li class="list-inline-item px-0 px-sm-2">
                            <a href="https://themesberg.com/blog">Blog</a>
                        </li>
                        <li class="list-inline-item px-0 px-sm-2">
                            <a href="https://themesberg.com/contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </main>

    <!-- Core -->
    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Vendor JS -->
    <script src="{{ asset('assets-admin/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>
</body>

</html>