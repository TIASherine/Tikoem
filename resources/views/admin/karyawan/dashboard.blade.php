<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Karyawan - Tikoem</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f0f2f5; margin: 0; display: flex; }
        
        /* Sidebar Styling */
        .sidebar { width: 250px; background: #2c3e50; color: white; height: 100vh; padding: 20px; position: fixed; }
        .sidebar h2 { text-align: center; margin-bottom: 30px; border-bottom: 1px solid #34495e; padding-bottom: 10px; }
        .sidebar a { display: block; color: #ecf0f1; text-decoration: none; padding: 15px; border-radius: 5px; margin-bottom: 5px; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: #34495e; }
        
        /* Content Styling */
        .content { margin-left: 290px; padding: 40px; width: 100%; }
        
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
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); 
            border-left: 5px solid #5d4037; 
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
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Tikoem Staff ☕</h2>
        <a href="/karyawan" class="active">📊 Dashboard</a>
        <a href="/karyawan/pesanan">🚚 Update Pesanan</a>
        <a href="/karyawan/produk">📦 Manajemen Produk</a>
        <a href="/karyawan/riwayat">📜 Riwayat Harian</a>
        <a href="/auth/logout" style="margin-top: 50px; background: #c0392b;">Logout</a>
    </div>

    <div class="content">
        <h1>Dashboard Operasional</h1>
        <p>Selamat bekerja! Pantau pesanan masuk di sini.</p>

        <div class="stats-grid">
            <div class="stat-card">
                <h3> Pesanan Yang Harus Diproses </h3>
                <p id="pesananBaru">{{ $pesananBaru }} Item </p>
            </div>
            <div class="stat-card" style="border-left-color: #27ae60;">
                <h3>Pendapatan Hari Ini</h3>
                <p id="pendapatanHarian"> Rp {{ number_format($pendapatanHarian) }} </p>
            </div>
            <div class="stat-card" style="border-left-color: #f39c12;">
                <h3>Status Toko</h3>
                <p>Buka ✅</p>
            </div>
        </div>
    </div>

</body>
</html>

@include('layouts.karyawan.script')