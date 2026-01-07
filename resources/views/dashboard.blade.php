@extends('layouts.app')

@section('title', 'Dashboard - Manajemen Kos')
@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <!-- Total Kamar -->
    <div class="card bg-gradient-to-br from-blue-500 to-blue-600 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-100 text-sm font-medium">Total Kamar</p>
                <p class="text-4xl font-bold mt-2">{{ $total_kamar }}</p>
            </div>
            <div class="text-5xl opacity-20">
                <i class="fas fa-door-open"></i>
            </div>
        </div>
    </div>

    <!-- Kamar Kosong -->
    <div class="card bg-gradient-to-br from-green-500 to-green-600 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-100 text-sm font-medium">Kamar Kosong</p>
                <p class="text-4xl font-bold mt-2">{{ $kamar_kosong }}</p>
            </div>
            <div class="text-5xl opacity-20">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>
    </div>

    <!-- Kamar Terisi -->
    <div class="card bg-gradient-to-br from-orange-500 to-orange-600 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-orange-100 text-sm font-medium">Kamar Terisi</p>
                <p class="text-4xl font-bold mt-2">{{ $kamar_terisi }}</p>
            </div>
            <div class="text-5xl opacity-20">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>

    <!-- Total Penghuni -->
    <div class="card bg-gradient-to-br from-purple-500 to-purple-600 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-100 text-sm font-medium">Total Penghuni</p>
                <p class="text-4xl font-bold mt-2">{{ $total_penghuni }}</p>
            </div>
            <div class="text-5xl opacity-20">
                <i class="fas fa-person"></i>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Statistik Status Kamar -->
    <div class="card">
        <h3 class="text-xl font-bold text-gray-800 mb-4">
            <i class="fas fa-chart-pie text-blue-600"></i> Status Kamar
        </h3>
        <div class="space-y-4">
            <div>
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Terisi</span>
                    <span class="font-bold text-gray-800">{{ $kamar_terisi }} / {{ $total_kamar }}</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 h-3 rounded-full" style="width: {{ $total_kamar > 0 ? ($kamar_terisi / $total_kamar * 100) : 0 }}%"></div>
                </div>
            </div>
            <div>
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Kosong</span>
                    <span class="font-bold text-gray-800">{{ $kamar_kosong }} / {{ $total_kamar }}</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="bg-gradient-to-r from-green-500 to-green-600 h-3 rounded-full" style="width: {{ $total_kamar > 0 ? ($kamar_kosong / $total_kamar * 100) : 0 }}%"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="card">
        <h3 class="text-xl font-bold text-gray-800 mb-4">
            <i class="fas fa-bolt text-yellow-500"></i> Aksi Cepat
        </h3>
        <div class="space-y-3">
            <a href="{{ route('kamar.create') }}" class="btn-primary block text-center">
                <i class="fas fa-plus"></i> Tambah Kamar
            </a>
            <a href="{{ route('penghuni.create') }}" class="btn-primary block text-center">
                <i class="fas fa-user-plus"></i> Tambah Penghuni
            </a>
            <a href="{{ route('kamar.index') }}" class="btn-secondary block text-center">
                <i class="fas fa-list"></i> Lihat Semua Kamar
            </a>
        </div>
    </div>
</div>
@endsection
