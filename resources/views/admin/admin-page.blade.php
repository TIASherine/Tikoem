@php
use App\Models\Users;
$totalKaryawan = Users::where('role', 'Karyawan')->count();
@endphp

@extends('layouts.admin.app')

@section('content')

<style>
    .hero-section {
        background-image: linear-gradient(rgba(123, 75, 51, 0.50), rgba(123, 75, 51, 0.50)),
            url('https://i.pinimg.com/1200x/37/38/95/3738952fb99eefececb10cad655c6009.jpg');
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
<!-- Main Content -->

<section class="hero-section">
    <div class="container">
        <h2> Halo Admin, {{ Auth::user()->name }}! </h4>
    </div>
</section>

<div id="dashboard-content" class="container py-4">
    <div class="row g-4">

        <div class="col-lg-8 d-flex align-items-stretch">
            <section class="card w-100">
                <div class="card-body">
                    <header class="d-flex align-items-center justify-content-between mb-3">
                        <h2 class="card-title h5 fw-semibold">Pemasukan & Pengeluaran</h2>
                    </header>
                    <canvas id="earningMonthly"></canvas>
                    <canvas id="earningWeekly"></canvas>

                </div>
            </section>
        </div>

        <!-- TOTAL KARYAWAN CARD -->
        <div class="col-md-4 h-40">
            <div class="card shadow-sm border-0 p-3" style="border-left: 5px solid #0d6efd;">
                <div>
                    <h6 class="text-muted mb-1">Total Karyawan Terdaftar</h6>
                    <h3 class="fw-bold">{{ $totalKaryawan }}</h3>
                </div>
            </div>

            <br>

            <!-- COMMENT CARD -->
            <div class="bg-white shadow-md rounded-xl p-4 border border-gray-200 h-30">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gray-300 rounded-full"></div>
                    <div>
                        <h3 class="font-semibold text-gray-800"> Yenni </h3>
                        <p class="text-sm text-gray-500"> Mahasiswa G-24 </p>
                    </div>
                </div>
                <div class="mt-3 text-gray-700">
                    <p> Sistem layanan ini sangat membantu, malas antri soalnyaa.</p>
                </div>
                <div class="mt-4 text-sm text-gray-500">
                    <p>🕒 2 hari yang lalu</p>
                </div>
            </div>

            <br>

            <div class="bg-white shadow-md rounded-xl p-4 border border-gray-200 h-30">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gray-300 rounded-full"></div>
                    <div>
                        <h3 class="font-semibold text-gray-800"> Michael </h3>
                        <p class="text-sm text-gray-500"> AIL SI </p>
                    </div>
                </div>
                <div class="mt-3 text-gray-700">
                    <p> Jelas mempermudah untuk beli makan.</p>
                </div>
                <div class="mt-4 text-sm text-gray-500">
                    <p>🕒 1 hari yang lalu</p>
                </div>
            </div>
        </div>



    </div>
</div>

@endsection