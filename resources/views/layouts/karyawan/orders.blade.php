<div class="content">
    <h1>Daftar Pesanan Masuk 🚚</h1>

    <table border="1" cellpadding="15" cellspacing="0" style="width: 100%; border-collapse: collapse; background: white; margin-top: 20px; border-color: #ddd;">
        <tr style="background: #5d4037; color: white;">
            <th>ID</th>
            <th>Menu</th>
            <th>Qty</th>
            <th>Status Saat Ini</th>
            <th>Aksi</th>
        </tr>
        @foreach($orders as $o)
        <tr>
            <td>#{{ $o->id }}</td>
            <td>{{ $o->nama_produk }}</td>
            <td>{{ $o->qty }}</td>
            <td>
                <span style="padding: 5px 10px; background: #ffeaa7; border-radius: 15px; font-size: 12px; font-weight: bold; color: #d35400;">
                    {{ $o->status ?? 'Menunggu' }}
                </span>
            </td>
            <td>
                <form action="/karyawan/pesanan/{{ $o->id }}" method="POST">
                    @csrf
                    <select name="status" style="padding: 5px; border-radius: 4px;">
                        <option value="Sedang Dibuat">Sedang Dibuat</option>
                        <option value="Diantar">Diantar</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                    <button type="submit" style="background: #2980b9; color: white; border: none; padding: 6px 10px; cursor: pointer; border-radius: 4px;">Update</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>