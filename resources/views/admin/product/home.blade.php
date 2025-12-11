@extends('layouts.pelanggan.app')

@section('content')
<style>
    body {
        background-image: url('https://i.pinimg.com/736x/be/b2/a0/beb2a029ffa2efc0dd6465519067fdc3.jpg');
    }

    h1 {
        text-align: center;
        margin-top: 40px;
        margin-bottom: 20px;
        color: #5d4037;
        font-size: 32px;
        font-weight: 600;
    }

    .produk-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        width: 90%;
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .card {
        background: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }

    .card h3 {
        font-size: 20px;
        color: #5d4037;
        margin-top: 0;
        margin-bottom: 5px;
    }

    .card p {
        font-size: 18px;
        font-weight: bold;
        color: #2e8b57;
        margin-bottom: 15px;
    }

    .card button {
        margin-top: 10px;
        padding: 10px 20px;
        background: #5d4037;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        transition: background 0.3s;
    }

    .card button:hover {
        background: #4e342e;
    }

    .back {
        text-align: center;
        margin: 40px auto;
    }

    .back a {
        color: #5d4037;
        text-decoration: none;
        font-weight: bold;
        padding: 10px 15px;
        border: 1px solid #5d4037;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .back a:hover {
        background: #5d4037;
        color: white;
    }
</style>
</head>

<body>
    <h1> Daftar Produk </h1>

    <div class="produk-container">
        @foreach ($dataProduct as $p)
        <div class="card">
            <h3>{{ $p->name }}</h3>
            <p>Rp {{ number_format($p->price, 0, ',', '.') }}</p>

            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $p->product_id }}">
                <input type="hidden" name="quantity" value="1">
                <button type="submit"> Tambah ke Keranjang </button>
            </form>
        </div>
        @endforeach
    </div>

    <div class="back">
        <a href="{{ route('pelanggan.index') }}"> ← Kembali ke Beranda </a> &nbsp; <a href="{{ route('cart.index') }}"> Cek Keranjang → </a>
    </div>

    @endsection