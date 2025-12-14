@extends('layouts.admin.app')

@section('content')
<style>
    .content {
        margin: 20px 100px;
    }

    .card {
        border-radius: 16px !important;
        background-color: var(--card-color) !important;
        border: none !important;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
    }

    .card:hover {
        transform: translateY(-3px);
        transition: 0.3s ease;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
    }

    .btn-info {
        background-color: var(--primary-color) !important;
        border: none !important;
    }

    .btn-info:hover {
        background-color: #643B26 !important;
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
</style>
</head>

<body>
    <main class="content">
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
                        <li class="breadcrumb-item"><a href="{{ route('karyawan.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Edit Data</li>
                    </ol>
                </nav>
                <h2 class="h4"> Edit Karyawan </h2>
                <p class="mb-0"> Form Perubahan Data Karyawan </p>
            </div>

            <a href="{{ route('karyawan.index') }}" 
            class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"> 
            Kembali
            </a>
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

            <form method="POST" action="{{ route('karyawan.update') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="name"> Nama Lengkap </label>
                            <input class="form-control" id="name" name="name" type="text"
                                value="{{ $dataKaryawan->name }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" name="email" type="email"
                                value="{{ $dataKaryawan->email }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <h4 class="mt-2">{{ $dataKaryawan->role }}</h4>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="user_id" value="{{ $dataKaryawan->user_id }}" />

                <div class="mt-3">
                    <button class="btn btn-info text-white mt-2 animate-up-2" type="submit"> Simpan Perubahan </button>
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
    @endsection