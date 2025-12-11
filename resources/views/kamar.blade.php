<!-- resources/views/kamar.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kamar Kos</title>

    <style>
        body { margin:0; font-family: Inter, sans-serif; background:#f3f4f6; }
        .layout { display:flex; min-height:100vh; }

        .sidebar {
            width:260px; background:#1f2937; color:white; padding:24px;
        }
        .sidebar h2 { font-size:22px; margin-bottom:30px; font-weight:bold; }
        .menu-item { padding:12px 16px; border-radius:8px; margin-bottom:10px; cursor:pointer; transition:.2s; }
        .menu-item:hover { background:#374151; }

        .content { flex:1; padding:32px; }
        .title { font-size:30px; font-weight:bold; }
        .subtitle { color:#6b7280; margin-top:4px; margin-bottom:20px; }

        .table-box {
            background:white; padding:20px; border-radius:18px;
            box-shadow:0 4px 12px rgba(0,0,0,0.08);
        }
        table {
            width:100%; border-collapse:collapse; margin-top:10px;
        }
        th, td {
            padding:14px; text-align:left; border-bottom:1px solid #e5e7eb;
        }
        th { background:#f9fafb; font-weight:600; }
        tr:hover { background:#f3f4f6; }

        .status {
            padding:6px 12px; border-radius:8px; font-size:14px; font-weight:600; color:white;
        }
        .status-isi { background:#10b981; }
        .status-kosong { background:#ef4444; }
        .btn {
            padding:8px 14px; background:#3b82f6; color:white;
            border-radius:8px; font-size:14px; cursor:pointer; border:none;
        }
        .btn:hover { background:#2563eb; }
    </style>
</head>

<body>
<div class="layout">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Kos Manager</h2>
        <div class="menu-item">🏠 Dashboard</div>
        <div class="menu-item" style="background:#374151;">📦 Data Kamar</div>
        <div class="menu-item">👥 Penghuni</div>
        <div class="menu-item">💳 Pembayaran</div>
        <div class="menu-item">📊 Laporan</div>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <h1 class="title">Data Kamar</h1>
        <p class="subtitle">Daftar seluruh kamar kos lengkap dengan harga & status.</p>

        <div class="table-box">
            <button class="btn">+ Tambah Kamar</button>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kamar</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Kamar A1</td>
                        <td>Rp 900.000</td>
                        <td><span class="status status-isi">Terisi</span></td>
                        <td><button class="btn">Detail</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Kamar A2</td>
                        <td>Rp 850.000</td>
                        <td><span class="status status-kosong">Kosong</span></td>
                        <td><button class="btn">Detail</button></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Kamar B1</td>
                        <td>Rp 1.000.000</td>
                        <td><span class="status status-isi">Terisi</span></td>
                        <td><button class="btn">Detail</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
</body>
</html>