
@extends($layout)

@section('content')
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
    </style>
</head>

<body>
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
@endsection