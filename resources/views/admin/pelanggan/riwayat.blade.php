<!DOCTYPE html>
<html>

<head>
    <title>Riwayat Pesanan</title>
    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f2f4f7;
            padding: 25px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 26px;
            margin-bottom: 25px;
        }

        .list {
            max-width: 700px;
            margin: auto;
        }

        .item {
            display: flex;
            align-items: center;
            background: white;
            padding: 15px 18px;
            border-radius: 12px;
            margin-bottom: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: 0.2s;
        }

        .item:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
        }

        .icon-box {
            width: 48px;
            height: 48px;
            background: #e3f2fd;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 22px;
            color: #1976d2;
            font-weight: bold;
        }

        .details {
            flex: 1;
        }

        .product-name {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 3px;
        }

        .qty {
            font-size: 14px;
            color: #666;
        }

        .price {
            font-size: 16px;
            font-weight: 700;
            color: #333;
        }

        .back {
            text-align: center;
            margin-top: 25px;
        }

        .back a {
            background: #1976d2;
            color: white;
            padding: 12px 22px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 15px;
            transition: 0.2s;
        }

        .back a:hover {
            background: #125ea8;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            display: inline-block;
            margin-left: 12px;
            text-transform: capitalize;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }

        .status-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .status-cancel {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>

<body>

    <h1>Riwayat Pesanan 📦</h1>

    <div class="list">

        @foreach($dataOrder as $order)

        <h3>Pesanan #{{ $order->order_id }} </h3>

        @foreach($order->items as $item)
        <div class="item">
            <div class="icon-box">🛒</div>

            <div class="details">
                <div class="product-name">
                    {{ $item->product->name }}
                </div>

                <div class="qty">
                    Qty: {{ $item->quantity }}
                </div>
            </div>

            <div class="price">
                Rp {{ number_format($item->total_price, 0, ',', '.') }}
            </div>

            {{-- BADGE STATUS --}}
            <div>
                @php
                $statusClass = [
                'pending' => 'status-pending',
                'success' => 'status-success',
                'cancel' => 'status-cancel',
                ][$order->status] ?? 'status-pending';
                @endphp

                <span class="status-badge {{ $statusClass }}">
                    {{ $order->status }}
                </span>
            </div>
        </div>

        @endforeach

        @endforeach


    </div>

    <div class="back">
        <a href="{{ route('home') }}">⟵ Kembali</a>
    </div>

</body>

</html>