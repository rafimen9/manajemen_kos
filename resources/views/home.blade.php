<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kos-Kosan</title>

    <style>
        body {
            margin: 0;
            font-family: "Inter", sans-serif;
            background: #f3f4f6;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            background: #1f2937;
            color: white;
            padding: 24px;
        }
        .sidebar h2 {
            font-size: 22px;
            margin-bottom: 30px;
            font-weight: bold;
        }
        .menu-item {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: .2s;
        }
        .menu-item:hover {
            background: #374151;
        }

        /* CONTENT */
        .content {
            flex: 1;
            padding: 32px;
        }
        .title {
            font-size: 30px;
            font-weight: bold;
        }
        .subtitle {
            color: #6b7280;
            margin-top: 4px;
            margin-bottom: 28px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        .card h3 {
            font-size: 18px;
            margin: 0;
        }
        .card .value {
            font-size: 32px;
            font-weight: bold;
            margin-top: 10px;
        }
        .desc {
            font-size: 14px;
            color: #6b7280;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 20px;
        }

        .menu-box {
            background: white;
            border-radius: 16px;
            padding: 20px;
            border: 1px solid #e5e7eb;
            transition: .2s;
        }
        .menu-box:hover {
            box-shadow: 0 6px 16px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>
<div class="layout">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Kos Manager</h2>
        <div class="menu-item">🏠 Dashboard</div>
        <div class="menu-item">📦 Data Kamar</div>
        <div class="menu-item">👥 Penghuni</div>
        <div class="menu-item">💳 Pembayaran</div>
        <div class="menu-item">📊 Laporan</div>
        <div class="menu-item">⚙️ Pengaturan</div>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <h1 class="title">Dashboard Manajemen Kos</h1>
        <p class="subtitle">Pantau seluruh aktivitas kos dengan mudah dan cepat.</p>

        <!-- CARDS -->
        <div class="cards">
            <div class="card">
                <h3>Total Kamar</h3>
                <p class="value">24</p>
                <p class="desc">Kamar tersedia & terisi</p>
            </div>

            <div class="card">
                <h3>Penghuni Aktif</h3>
                <p class="value">18</p>
                <p class="desc">Sedang menyewa kamar</p>
            </div>

            <div class="card">
                <h3>Tagihan Bulan Ini</h3>
                <p class="value">Rp 8.200.000</p>
                <p class="desc">Total pendapatan yang harus dibayar</p>
            </div>
        </div>

        <!-- MENU GRID -->
        <div class="menu-grid">
            <div class="menu-box">
                <h3>📦 Data Kamar</h3>
                <p>Kelola daftar kamar, harga, dan status.</p>
            </div>

            <div class="menu-box">
                <h3>👥 Data Penghuni</h3>
                <p>Tambah, edit, atau lihat informasi penghuni.</p>
            </div>

            <div class="menu-box">
                <h3>💳 Pembayaran</h3>
                <p>Cek status pembayaran kos.</p>
            </div>

            <div class="menu-box">
                <h3>📊 Laporan</h3>
                <p>Lihat laporan pemasukan dan transaksi.</p>
            </div>
        </div>

    </div>
</div>
</body>
</html>