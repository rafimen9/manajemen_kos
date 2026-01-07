<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Manajemen Kos')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gradient-to-b from-blue-600 to-blue-800 text-white shadow-lg fixed h-full">
            <div class="p-8 border-b border-blue-500">
                <h1 class="text-2xl font-bold flex items-center gap-2">
                    <i class="fas fa-building"></i> Kos Manager
                </h1>
            </div>
            
            <nav class="mt-6 px-4">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg mb-2 {{ request()->is('home') ? 'bg-white text-blue-600 font-bold' : 'text-blue-100 hover:bg-blue-500' }} transition">
                    <i class="fas fa-chart-line"></i> Dashboard
                </a>
                
                <a href="{{ route('kamar.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg mb-2 {{ request()->is('kamar*') ? 'bg-white text-blue-600 font-bold' : 'text-blue-100 hover:bg-blue-500' }} transition">
                    <i class="fas fa-door-open"></i> Kamar
                </a>
                
                <a href="{{ route('penghuni.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg mb-2 {{ request()->is('penghuni*') ? 'bg-white text-blue-600 font-bold' : 'text-blue-100 hover:bg-blue-500' }} transition">
                    <i class="fas fa-users"></i> Penghuni
                </a>

                <a href="{{ route('laporan.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg mb-2 {{ request()->is('laporan*') ? 'bg-white text-blue-600 font-bold shadow-md' : 'text-blue-100 hover:bg-blue-500' }} transition">
                    <i class="fas fa-file-pdf text-lg"></i> Laporan
                </a>
            </nav>

            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-blue-500">
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-lg bg-red-500 hover:bg-red-600 text-white transition font-medium">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Top Bar -->
            <div class="bg-white border-b border-gray-200 shadow-sm">
                <div class="flex justify-between items-center p-6">
                    <h2 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                    <div class="text-gray-600">
                        <span class="mr-4">{{ auth()->user()->name ?? 'Admin' }}</span>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="p-6 overflow-auto h-screen">
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg flex justify-between items-center">
                        <span>{{ session('success') }}</span>
                        <button onclick="this.parentElement.style.display='none'" class="text-green-700 font-bold">×</button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
