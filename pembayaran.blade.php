<!-- resources/views/pembayaran.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pembayaran Kos</title>

	<style>
		body { margin:0; font-family: Inter, sans-serif; background:#f3f4f6; }
		.layout { display:flex; min-height:100vh; }

		/* SIDEBAR */
		.sidebar {
			width:260px; background:#1f2937; color:white; padding:24px;
		}
		.sidebar h2 { font-size:22px; margin-bottom:30px; font-weight:bold; }
		.menu-item { padding:12px 16px; border-radius:8px; margin-bottom:10px; cursor:pointer; transition:.2s; }
		.menu-item:hover { background:#374151; }

		/* CONTENT */
		.content { flex:1; padding:32px; }
		.title { font-size:30px; font-weight:bold; }
		.subtitle { color:#6b7280; margin-top:4px; margin-bottom:20px; }

		.cards { display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:18px; margin-bottom:22px; }
		.card { background:white; padding:18px; border-radius:14px; box-shadow:0 6px 18px rgba(15,23,42,0.06); }
		.card h3 { margin:0; font-size:14px; color:#374151; }
		.card .value { font-size:22px; font-weight:700; margin-top:8px; }
		.card .muted { color:#6b7280; font-size:13px; margin-top:6px; }

		.panel { background:white; padding:18px; border-radius:14px; box-shadow:0 6px 18px rgba(15,23,42,0.04); }
		.controls { display:flex; gap:12px; align-items:center; margin-bottom:12px; }
		.search { flex:1; display:flex; gap:8px; }
		.input, .select { padding:10px 12px; border-radius:10px; border:1px solid #e5e7eb; background:#fff; }
		.btn { padding:8px 14px; background:#3b82f6; color:white; border-radius:8px; font-size:14px; cursor:pointer; border:none; }
		.btn.ghost { background:transparent; color:#374151; border:1px solid #e5e7eb; }

		table { width:100%; border-collapse:collapse; margin-top:10px; }
		th, td { padding:12px 10px; text-align:left; border-bottom:1px solid #eef2f6; }
		th { background:#fafafa; font-weight:600; color:#374151; }
		tr:hover { background:#fbfdff; }

		.status { padding:6px 10px; border-radius:8px; font-size:13px; font-weight:600; color:white; display:inline-block; }
		.status-lunas { background:#10b981; }
		.status-terlambat { background:#f97316; }
		.status-pending { background:#f59e0b; }

		.actions button { margin-right:8px; }

		@media (max-width:900px) {
			.sidebar { display:none; }
			.content { padding:18px; }
		}
	</style>
</head>

<body>
<div class="layout">

	<!-- SIDEBAR -->
	<div class="sidebar">
		<h2>Kos Manager</h2>
		<div class="menu-item" onclick="window.location.href='{{ url('/home') }}'">🏠 Dashboard</div>
		<div class="menu-item" onclick="window.location.href='{{ url('/kamar') }}'">📦 Data Kamar</div>
		<div class="menu-item" onclick="window.location.href='{{ url('/penghuni') }}'">👥 Penghuni</div>
		<div class="menu-item" style="background:#374151;">💳 Pembayaran</div>
		<div class="menu-item" onclick="window.location.href='{{ url('/laporan') }}'">📊 Laporan</div>
	</div>

	<!-- CONTENT -->
	<div class="content">
		<h1 class="title">Pembayaran</h1>
		<p class="subtitle">Kelola tagihan, lihat status pembayaran, dan catat transaksi dengan mudah.</p>

		<div class="cards">
			<div class="card">
				<h3>Total Tagihan Bulan Ini</h3>
				<div class="value">Rp 12.450.000</div>
				<div class="muted">Jumlah seluruh tagihan untuk bulan berjalan</div>
			</div>

			<div class="card">
				<h3>Terbayar</h3>
				<div class="value">Rp 8.200.000</div>
				<div class="muted">Tagihan yang sudah diterima</div>
			</div>

			<div class="card">
				<h3>Tertunda / Belum Lunas</h3>
				<div class="value">Rp 4.250.000</div>
				<div class="muted">Tagihan yang perlu ditindaklanjuti</div>
			</div>
		</div>

		<div class="panel">
			<div class="controls">
				<div class="search">
					<input class="input" type="text" placeholder="Cari nama penghuni, kamar, atau jumlah...">
					<select class="select">
						<option value="">Semua Bulan</option>
						<option value="2025-12">Desember 2025</option>
						<option value="2025-11">November 2025</option>
					</select>
				</div>
				<button class="btn">Filter</button>
				<button class="btn ghost" onclick="window.print()">Cetak</button>
			</div>

			<table>
				<thead>
					<tr>
						<th>No</th>
						<th>Penghuni</th>
						<th>Kamar</th>
						<th>Jumlah</th>
						<th>Bulan</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>Rafi Pratama</td>
						<td>Kamar A1</td>
						<td>Rp 900.000</td>
						<td>Des 2025</td>
						<td><span class="status status-lunas">Lunas</span></td>
						<td class="actions"><button class="btn ghost">Detail</button></td>
					</tr>
					<tr>
						<td>2</td>
						<td>Indah Lestari</td>
						<td>Kamar B1</td>
						<td>Rp 1.000.000</td>
						<td>Des 2025</td>
						<td><span class="status status-pending">Menunggu</span></td>
						<td class="actions"><button class="btn">Bayar</button><button class="btn ghost">Detail</button></td>
					</tr>
					<tr>
						<td>3</td>
						<td>Andi Firmansyah</td>
						<td>-</td>
						<td>Rp 850.000</td>
						<td>Des 2025</td>
						<td><span class="status status-terlambat">Terlambat</span></td>
						<td class="actions"><button class="btn">Kirim Pengingat</button><button class="btn ghost">Detail</button></td>
					</tr>
				</tbody>
			</table>
		</div>

	</div>
</div>
</body>
</html>

