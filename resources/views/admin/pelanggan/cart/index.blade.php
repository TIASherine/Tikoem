<!DOCTYPE html>
<html>

<head>
    <title>Keranjang Belanja</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f4ffec;
            padding: 40px;
            background-image: url('https://i.pinimg.com/736x/57/19/31/57193110209ccde092dd7e46cb5b5ce7.jpg');
        }

        .receipt {
            width: 420px;
            background: #fff;
            padding: 25px;
            margin: auto;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .receipt h2 {
            text-align: center;
            color: #5d4037;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px dashed #aaa;
            text-align: left;
        }

        th {
            color: #5d4037;
            font-weight: 700;
        }

        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }

        .payment-box {
            margin-top: 20px;
        }

        .payment-box label {
            font-weight: 600;
        }

        .pesan-btn {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background: green;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .qris-box {
            margin-top: 15px;
            padding: 10px;
            border: 1px dashed #999;
            border-radius: 10px;
            display: none;
        }

        .qris-box img {
            width: 180px;
            display: block;
            margin: auto;
        }

        .notif {
            text-align: center;
            background: green;
            color: white;
            padding: 10px;
            margin-bottom: 15px;
        }

        .delete-btn {
            background: none;
            border: none;
            color: red;
            cursor: pointer;
        }
    </style>
</head>

<body>

    @if(session('success'))
    <div class="notif">
        {{ session('success') }}
    </div>
    @endif

    <div class="receipt">
        <h2>🧾 Struk Belanja</h2>

        <table>
            <tr>
                <th>Produk</th>
                <th>Qty</th>
                <th>Total</th>
                <th colspan="2"> </th>
            </tr>

            @foreach($items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>x{{ $item->quantity }}</td>
                <td>Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</td>
                <td>
                    <form action="{{ route('cart.destroy', $item->cart_item_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="delete-btn" onclick="return confirm('Hapus item ini?')">❌</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('cart.decrease', $item->cart_item_id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" style="padding:4px 8px; font-weight:bold; background: transparent; border: none;"> - </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        @php
        $total = $items->sum(fn($i) => $i->quantity * $i->product->price);
        @endphp

        <div class="total">
            Total: Rp {{ number_format($total, 0, ',', '.') }}
        </div>

        <form action="{{ route('order.keranjang') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="payment-box">
                <label>Metode Pembayaran:</label><br><br>
                <select name="payment_method" id="payment_method" style="width:100%; padding:8px; border-radius:6px;">
                    <option value="cash"> Cash </option>
                    <option value="qris"> QRIS </option>
                </select>
            </div>

            <div class="qris-box" id="qris_box">
                <p style="text-align:center;font-weight:600;">Scan QRIS untuk melakukan pembayaran</p>
                <img src="https://ypp.co.id/site/uploads/qris/5f7c6da47a380-qr-code-dana.jpg" alt="QRIS">
                <br>
                <center>
                    <label>Upload Bukti Pembayaran:</label>
                    <input type="file" name="bukti_qris" accept="image/*" style="margin-top:8px;">
                </center>
            </div>

            <button type="submit" class="pesan-btn">
                Pesan Sekarang →
            </button>
        </form>

        <div style="text-align:center; margin-top:20px;">
            <a href="{{ route('product.list') }}">← Kembali ke Produk</a>
        </div>
    </div>

    <script>
        const method = document.getElementById('payment_method');
        const qrisBox = document.getElementById('qris_box');

        method.addEventListener('change', () => {
            qrisBox.style.display = method.value === 'qris' ? 'block' : 'none';
        });
    </script>

</body>

</html>