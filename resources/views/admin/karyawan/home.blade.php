@extends('layouts.karyawan.app')

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

    /* Cards */
    .stats-grid {
        display: grid;
        grid-template-columns:
            repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .stat-card {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-left: 5px solid #d51c19ff;
    }

    .stat-card h3 {
        margin: 0;
        color: #7f8c8d;
        font-size: 14px;
    }

    .stat-card p {
        margin: 10px 0 0;
        font-size: 24px;
        font-weight: bold;
        color: #2c3e50;
    }

    table {
        background-color: white;
    }
</style>
</head>

<body>
    <section class="hero-section">
        <div class="container">
            <h2> Selamat Bekerja, {{ Auth::user()->name }}! </h4>
        </div>
    </section>

    <section id="content" class="container py-5">
        <div class="row g-4">
            <!-- Notif Popup -->
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
                <div id="toastPesanan" class="toast align-items-center text-white bg-primary border-0" role="alert">
                    <div class="d-flex">
                        <div class="toast-body">
                            🔔 Pesanan baru masuk! Segera cek antrean.
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                    </div>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <h3> Pesanan Yang Harus Diproses </h3>
                    <p id="pesananBaru">{{ $pesananBaru }} Item </p>
                </div>
                <div class="stat-card">
                    <h3>Pendapatan Hari Ini</h3>
                    <p id="pendapatanHarian"> Rp {{ number_format($pendapatanHarian) }} </p>
                </div>
                <div class="stat-card">
                    <h3>Status Toko</h3>
                    <p>Buka ✅</p>
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
                                        <th> Nomor Pesanan </th>
                                        <th> Pelanggan </th>
                                        <th> Pesanan </th>
                                        <th> Jumlah </th>
                                        <th> Total </th>
                                        <th> Pembayaran </th>
                                        <th> Status </th>
                                    </tr>
                                </thead>

                                @forelse ($dataOrder as $order)
                                <tbody>
                                    <tr>
                                        <td>{{ $startNumber-- }} </td>
                                        <td> {{ $order->user->name }} </td>
                                        <td>
                                            @foreach ($order->items as $item)
                                            {{ $item->product->name }} <br>
                                            @endforeach
                                        </td>

                                        <td>
                                            @foreach ($order->items as $item)
                                            {{ $item->quantity }} <br>
                                            @endforeach
                                        </td>

                                        <td> {{ $order->total_price }} </td>
                                        <td> {{ $order->payment_method }} </td>
                                        <td>
                                            @if ($order->status == 'Batal')
                                            <span class="badge bg-warning"> Batal </span>
                                            @elseif ($order->status == 'Pending')
                                            <span class="badge bg-primary"> Diproses </span>
                                            @else ($order->status == 'Selesai')
                                            <span class="badge bg-success"> Selesai </span>
                                            @endif
                                        </td>
                                    </tr>

                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted"> Belum Ada Pesanan </td>
                                    </tr>

                                    @endforelse
                                </tbody>
                            </table>

                            <div class="mt-3">
                                {{ $dataOrder->links('pagination::simple-bootstrap-5') }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-users-cog me-2"></i>Tim Kopi Terbaik</h5>
                        <div class="mb-3">
                            <span class="badge badge-seller me-2"><i class="fas fa-cash-register me-1"></i>
                                Barista/Kasir</span>
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
                        <a href="#" class="btn btn-primary w-100 mt-3">Kelola Tim <i
                                class="fas fa-chevron-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection