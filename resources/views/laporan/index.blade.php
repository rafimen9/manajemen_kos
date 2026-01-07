@extends('layouts.app')

@section('title', 'Laporan - Manajemen Kos')
@section('page-title', 'Laporan')

@section('content')
<!-- Summary Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="card bg-gradient-to-br from-blue-500 to-blue-600 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-100 text-sm font-medium">Total Kamar</p>
                <p class="text-3xl font-bold mt-2">{{ $total_kamar }}</p>
            </div>
            <i class="fas fa-door-open text-5xl opacity-20"></i>
        </div>
    </div>

    <div class="card bg-gradient-to-br from-green-500 to-green-600 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-100 text-sm font-medium">Kamar Kosong</p>
                <p class="text-3xl font-bold mt-2">{{ $kamar_kosong }}</p>
            </div>
            <i class="fas fa-check-circle text-5xl opacity-20"></i>
        </div>
    </div>

    <div class="card bg-gradient-to-br from-orange-500 to-orange-600 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-orange-100 text-sm font-medium">Kamar Terisi</p>
                <p class="text-3xl font-bold mt-2">{{ $kamar_terisi }}</p>
            </div>
            <i class="fas fa-users text-5xl opacity-20"></i>
        </div>
    </div>

    <div class="card bg-gradient-to-br from-purple-500 to-purple-600 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-100 text-sm font-medium">Total Penghuni</p>
                <p class="text-3xl font-bold mt-2">{{ $total_penghuni }}</p>
            </div>
            <i class="fas fa-person text-5xl opacity-20"></i>
        </div>
    </div>
</div>

<!-- Revenue Card -->
<div class="card mb-8 bg-gradient-to-r from-indigo-50 to-blue-50">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-gray-600 text-sm font-medium mb-2">💰 Total Pendapatan Bulanan</p>
            <p class="text-4xl font-bold text-gray-800">Rp. {{ number_format($total_pendapatan, 0, ',', '.') }}</p>
            <p class="text-gray-500 text-sm mt-2">Dari {{ $kamar_terisi }} kamar yang terisi</p>
        </div>
        <i class="fas fa-chart-line text-6xl text-blue-300 opacity-30"></i>
    </div>
</div>

<!-- Tabs for Reports -->
<div class="mb-6 flex gap-2 border-b border-gray-200">
    <button onclick="showTab('kamar')" class="tab-button active px-4 py-3 text-gray-700 font-medium border-b-2 border-blue-600">
        <i class="fas fa-door-open"></i> Laporan Kamar
    </button>
    <button onclick="showTab('penghuni')" class="tab-button px-4 py-3 text-gray-700 font-medium border-b-2 border-transparent hover:border-gray-300">
        <i class="fas fa-users"></i> Laporan Penghuni
    </button>
</div>

<!-- Laporan Kamar Tab -->
<div id="kamar-tab" class="tab-content">
    <div class="card">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-800">
                <i class="fas fa-door-open text-blue-600"></i> Detail Kamar
            </h3>
            <button onclick="window.print()" class="btn-secondary">
                <i class="fas fa-print"></i> Cetak
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-blue-50 to-blue-100 border-b-2 border-blue-200">
                    <tr>
                        <th class="table-cell text-left text-blue-900 font-bold">#</th>
                        <th class="table-cell text-left text-blue-900 font-bold">Kode Kamar</th>
                        <th class="table-cell text-left text-blue-900 font-bold">Nama Kamar</th>
                        <th class="table-cell text-left text-blue-900 font-bold">Harga</th>
                        <th class="table-cell text-left text-blue-900 font-bold">Status</th>
                        <th class="table-cell text-left text-blue-900 font-bold">Penghuni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kamars as $index => $kamar)
                    <tr class="hover:bg-blue-50 transition border-b border-gray-200">
                        <td class="table-cell text-gray-700">{{ $index + 1 }}</td>
                        <td class="table-cell text-gray-700 font-semibold">{{ $kamar->kode_kamar }}</td>
                        <td class="table-cell text-gray-700">{{ $kamar->nama_kamar }}</td>
                        <td class="table-cell text-gray-700 font-semibold">Rp. {{ number_format($kamar->harga, 0, ',', '.') }}</td>
                        <td class="table-cell">
                            @if($kamar->status == 'Kosong')
                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-800 font-medium text-sm">
                                    <i class="fas fa-check-circle"></i> Kosong
                                </span>
                            @else
                                <span class="px-3 py-1 rounded-full bg-orange-100 text-orange-800 font-medium text-sm">
                                    <i class="fas fa-user"></i> Terisi
                                </span>
                            @endif
                        </td>
                        <td class="table-cell text-gray-700">
                            @php
                                $penghuni = $kamar->penghunis()->latest()->first();
                            @endphp
                            {{ $penghuni ? $penghuni->nama : '-' }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="table-cell text-center text-gray-500 py-8">
                            <i class="fas fa-inbox text-3xl mb-2"></i>
                            <p>Belum ada data kamar</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Laporan Penghuni Tab -->
<div id="penghuni-tab" class="tab-content hidden">
    <div class="card">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-800">
                <i class="fas fa-users text-blue-600"></i> Detail Penghuni
            </h3>
            <button onclick="window.print()" class="btn-secondary">
                <i class="fas fa-print"></i> Cetak
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-blue-50 to-blue-100 border-b-2 border-blue-200">
                    <tr>
                        <th class="table-cell text-left text-blue-900 font-bold">#</th>
                        <th class="table-cell text-left text-blue-900 font-bold">Nama Penghuni</th>
                        <th class="table-cell text-left text-blue-900 font-bold">No. HP</th>
                        <th class="table-cell text-left text-blue-900 font-bold">Kamar</th>
                        <th class="table-cell text-left text-blue-900 font-bold">Tgl. Masuk</th>
                        <th class="table-cell text-left text-blue-900 font-bold">Lama Menempati</th>
                        <th class="table-cell text-left text-blue-900 font-bold">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penghunis as $index => $penghuni)
                    <tr class="hover:bg-blue-50 transition border-b border-gray-200">
                        <td class="table-cell text-gray-700">{{ $index + 1 }}</td>
                        <td class="table-cell text-gray-700 font-semibold">{{ $penghuni->nama }}</td>
                        <td class="table-cell text-gray-700">{{ $penghuni->no_hp }}</td>
                        <td class="table-cell text-gray-700">{{ $penghuni->kamar->nama_kamar }}</td>
                        <td class="table-cell text-gray-700">{{ \Carbon\Carbon::parse($penghuni->tgl_masuk)->format('d/m/Y') }}</td>
                        <td class="table-cell text-gray-700">
                            @if($penghuni->tgl_keluar)
                                {{ \Carbon\Carbon::parse($penghuni->tgl_masuk)->diffInDays(\Carbon\Carbon::parse($penghuni->tgl_keluar)) }} hari
                            @else
                                {{ \Carbon\Carbon::parse($penghuni->tgl_masuk)->diffInDays(\Carbon\Carbon::now()) }} hari
                            @endif
                        </td>
                        <td class="table-cell">
                            @if($penghuni->tgl_keluar)
                                <span class="px-3 py-1 rounded-full bg-red-100 text-red-800 font-medium text-sm">
                                    <i class="fas fa-times-circle"></i> Keluar
                                </span>
                            @else
                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-800 font-medium text-sm">
                                    <i class="fas fa-check-circle"></i> Aktif
                                </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="table-cell text-center text-gray-500 py-8">
                            <i class="fas fa-inbox text-3xl mb-2"></i>
                            <p>Belum ada data penghuni</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function showTab(tab) {
    // Hide all tabs
    document.getElementById('kamar-tab').classList.add('hidden');
    document.getElementById('penghuni-tab').classList.add('hidden');
    
    // Remove active class from all buttons
    document.querySelectorAll('.tab-button').forEach(btn => {
        btn.classList.remove('border-blue-600');
        btn.classList.add('border-transparent');
    });
    
    // Show selected tab
    document.getElementById(tab + '-tab').classList.remove('hidden');
    
    // Add active class to clicked button
    event.target.classList.add('border-blue-600');
    event.target.classList.remove('border-transparent');
}
</script>

<style>
@media print {
    .sidebar, .top-bar, button, .btn-secondary {
        display: none !important;
    }
    .ml-64 {
        margin-left: 0 !important;
    }
}
</style>
@endsection
