<!-- resources/views/laporan.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Manajemen Kos</title>

	<style>
		body { margin:0; font-family: Inter, sans-serif; background:#f3f4f6; }
		.layout { display:flex; min-height:100vh; }

		.sidebar { width:260px; background:#1f2937; color:white; padding:24px; }
		.sidebar h2 { font-size:22px; margin-bottom:30px; font-weight:bold; }
		.menu-item { padding:12px 16px; border-radius:8px; margin-bottom:10px; cursor:pointer; transition:.2s; }
		.menu-item:hover { background:#374151; }

		.content { flex:1; padding:32px; }
		.title { font-size:30px; font-weight:bold; }
		.subtitle { color:#6b7280; margin-top:4px; margin-bottom:20px; }

		.cards { display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:18px; margin-bottom:22px; }
		.card { background:white; padding:18px; border-radius:14px; box-shadow:0 6px 18px rgba(15,23,42,0.06); }
		.card h3 { margin:0; font-size:14px; color:#374151; }
		.card .value { font-size:22px; font-weight:700; margin-top:8px; }
		.card .muted { color:#6b7280; font-size:13px; margin-top:6px; }

		.panel { background:white; padding:18px; border-radius:14px; box-shadow:0 6px 18px rgba(15,23,42,0.04); }
		.controls { display:flex; gap:12px; align-items:center; margin-bottom:12px; flex-wrap:wrap; }
		.input, .select { padding:10px 12px; border-radius:10px; border:1px solid #e5e7eb; background:#fff; }
		.btn { padding:8px 14px; background:#3b82f6; color:white; border-radius:8px; font-size:14px; cursor:pointer; border:none; }
		.btn.ghost { background:transparent; color:#374151; border:1px solid #e5e7eb; }

		.chart { height:260px; border-radius:12px; background:linear-gradient(180deg,#ffffff,#f8fafc); display:flex; align-items:center; justify-content:center; color:#94a3b8; border:1px dashed #e6eef6; }

		table { width:100%; border-collapse:collapse; margin-top:14px; }
		th, td { padding:12px 10px; text-align:left; border-bottom:1px solid #eef2f6; }
		th { background:#fafafa; font-weight:600; color:#374151; }
		tr:hover { background:#fbfdff; }

		@media (max-width:900px) { .sidebar { display:none; } .content { padding:18px; } }
	</style>
</head>
<body>
<div class="layout">

	<div class="sidebar">
		<h2>Kos Manager</h2>
		<div class="menu-item" onclick="window.location.href='{{ url('/home') }}'">🏠 Dashboard</div>
		<div class="menu-item" onclick="window.location.href='{{ url('/kamar') }}'">📦 Data Kamar</div>
		<div class="menu-item" onclick="window.location.href='{{ url('/penghuni') }}'">👥 Penghuni</div>
		<div class="menu-item" onclick="window.location.href='{{ url('/pembayaran') }}'">💳 Pembayaran</div>
		<div class="menu-item" style="background:#374151;">📊 Laporan</div>
	</div>

	<div class="content">
		<h1 class="title">Laporan</h1>
		<p class="subtitle">Ringkasan pemasukan, pengeluaran, dan transaksi per bulan.</p>

		<div class="cards">
			<div class="card">
				<h3>Pendapatan Bulan Ini</h3>
				<div class="value">Rp 10.450.000</div>
				<div class="muted">Total pemasukan dari pembayaran</div>
			</div>

			<div class="card">
				<h3>Pengeluaran</h3>
				<div class="value">Rp 1.200.000</div>
				<div class="muted">Biaya operasional & perbaikan</div>
			</div>

			<div class="card">
				<h3>Laba Bersih</h3>
				<div class="value">Rp 9.250.000</div>
				<div class="muted">Pendapatan - Pengeluaran</div>
			</div>
		</div>

		<div class="panel">
			<div class="controls">
				<select class="select">
					<option value="">Semua Periode</option>
					<option value="2025">Tahun 2025</option>
					<option value="2024">Tahun 2024</option>
				</select>
				<select class="select">
					<option value="">Semua Kategori</option>
					<option value="pemasukan">Pemasukan</option>
					<option value="pengeluaran">Pengeluaran</option>
				</select>
				<button class="btn">Terapkan</button>
				<div style="flex:1"></div>
				<button class="btn ghost" onclick="window.print()">Cetak</button>
				<button class="btn">Ekspor CSV</button>
			</div>

			<div class="chart">[Grafik Pendapatan • Placeholder]</div>

			<table>
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Deskripsi</th>
						<th>Kategori</th>
						<th>Jumlah</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>2025-12-05</td>
						<td>Pembayaran sewa Kamar A1</td>
						<td>Pemasukan</td>
						<td>Rp 900.000</td>
					</tr>
					<tr>
						<td>2</td>
						<td>2025-12-07</td>
						<td>Perbaikan Kunci Pintu</td>
						<td>Pengeluaran</td>
						<td>Rp 150.000</td>
					</tr>
					<tr>
						<td>3</td>
						<td>2025-12-12</td>
						<td>Pembayaran sewa Kamar B1</td>
						<td>Pemasukan</td>
						<td>Rp 1.000.000</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>

