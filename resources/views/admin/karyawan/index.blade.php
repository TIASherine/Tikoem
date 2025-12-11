@extends('layouts.admin.app')

@section('content')
<style>
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

    tbody {
        background-color: white;
        opacity: 60%;
        color: black;
    }
</style>
</head>

<body>
    <!-- Main Content -->
    <section id="content" class="container py-5">
        <!-- Filter Start -->
        <div class="mb-3">
            <form method="GET" action="{{ route('karyawan.index') }}">
                <div class="row">
                    <div class="col-md-2">
                        <select name="role" onchange="this.form.submit()" class="form-select">
                            <option value="All" {{ request('role') == 'All' ? 'selected' : '' }}> Semua </option>
                            <option value="Pelanggan" {{ request('role') == 'Pelanggan' ? 'selected' : '' }}> Pelanggan
                            </option>
                            <option value="Karyawan" {{ request('role') == 'Karyawan' ? 'selected' : '' }}> Karyawan
                            </option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="page" value="{{ $dataKaryawan->currentPage() }}">
            </form>
        </div>
        <!-- Filter End -->

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
                            <th class="border-0"> Full Name </th>
                            <th class="border-0"> Email </th>
                            <th class="border-0"> Role </th>
                            <th class="border-0 rounded-end"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 0;
                        @endphp

                        @foreach ($dataKaryawan as $row)
                        <tr>
                            <td> {{ ($dataKaryawan->currentPage() - 1) * $dataKaryawan->perPage() + $loop->iteration }}
                            </td>
                            <td> {{ $row->name }} </td>
                            <td> {{ $row->email }} </td>
                            <td> {{ $row->role }} </td>
                            <td>
                                <a href="{{ route('karyawan.edit', $row->user_id) }}" class="btn btn-info btn-sm">
                                    <svg class="icon icon-xs me-2" data-slot="icon" fill="none"
                                        stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10">
                                        </path>
                                    </svg>
                                    Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $dataKaryawan->links('pagination::simple-bootstrap-5') }}
                </div>
            </div>
        </div>
    </section>
@endsection