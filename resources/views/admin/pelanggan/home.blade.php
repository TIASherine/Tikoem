@extends('layouts.pelanggan.app')

@section('content')

<style>
    body {
        background-image: url('https://i.pinimg.com/736x/f9/fb/2f/f9fb2ffac6e09e1104e7d4057735591a.jpg');
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
</style>

<section class="hero-section">
    <div class="container">
        <h2> Selamat datang, {{ Auth::user()->name }}! </h4>
    </div>
</section>

<section id="content" class="container py-5">
    <div class="row g-4">

        <!-- Inspirasi Harian + Tentang -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-between">

                    <div>
                        <h5 class="card-title"><i class="fas fa-coffee me-2"></i>Inspirasi Harian</h5>
                        <p class="text-muted">Lihat semua racikan minuman dan camilan kami. Pilih produk favorit Anda.</p>
                        <a href="{{ route('product.list') }}" class="btn btn-primary mt-3">
                            Telusuri Produk <i class="fas fa-mug-hot ms-2"></i>
                        </a>
                    </div>

                    <hr class="my-4 text-muted">

                    <div class="mt-3">
                        <h6 class="mb-2"><i class="fas fa-info-circle me-2"></i>Tentang Tikoem</h6>
                        <p class="text-muted mb-0">
                            <b> Titik koempol GSG! </b> Nikmat, segar dan terjangkau
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <!-- Pesanan Anda + Keranjang -->
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-between">

                    <div>
                        <h5 class="card-title"><i class="fas fa-clipboard-list me-2"></i>Pesanan Anda</h5>
                        <p class="text-muted">Periksa riwayat pembelian atau lacak status pesanan terbaru Anda.</p>

                        <a href="{{ route('pelanggan.riwayat') }}" class="btn btn-primary mt-3">
                            Riwayat Pesanan <i class="fas fa-scroll ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tim Kopi -->
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title"><i class="fas fa-users-cog me-2"></i>Tim Kami</h5>

                    <div class="mb-3">
                        <span class="badge badge-seller me-2">
                            <i class="fas fa-cash-register me-1"></i> Barista
                        </span>
                        <span class="badge badge-delivery">
                            <i class="fas fa-motorcycle me-1"></i> Kurir
                        </span>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-user-circle fa-2x me-3 text-secondary"></i>Rian Adi
                            </div>
                            <span class="badge badge-seller">Barista</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-user-circle fa-2x me-3 text-secondary"></i>Sinta Dewi
                            </div>
                            <span class="badge badge-delivery">Kurir</span>
                        </li>
                    </ul>

                    <a href="/team" class="btn btn-primary w-100 mt-3">
                        Kenali Kami <i class="fas fa-chevron-right ms-2"></i>
                    </a>

                </div>
            </div>
        </div>

    </div>
</section>

@endsection