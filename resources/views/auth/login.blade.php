<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Manajemen Kos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md">
        <!-- Logo Section -->
        <div class="text-center mb-8">
            <div class="inline-block bg-gradient-to-br from-blue-600 to-blue-800 text-white p-4 rounded-full mb-4">
                <i class="fas fa-building text-3xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">Kos Manager</h1>
            <p class="text-gray-600 mt-2">Sistem Manajemen Kos Modern</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Masuk ke Akun Anda</h2>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-envelope text-blue-600"></i> Email
                    </label>
                    <input id="email" type="email" 
                        class="w-full px-4 py-3 rounded-lg border focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}" 
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="admin@kos.com">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-lock text-blue-600"></i> Password
                    </label>
                    <input id="password" type="password" 
                        class="w-full px-4 py-3 rounded-lg border focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}" 
                        name="password" required autocomplete="current-password"
                        placeholder="Masukkan password">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                        Ingat saya
                    </label>
                </div>

                <!-- Login Button -->
                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold py-3 rounded-lg hover:shadow-lg transition duration-300">
                    <i class="fas fa-sign-in-alt"></i> Masuk
                </button>
            </form>

            <!-- Info -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <p class="text-center text-sm text-gray-600">
                    Email: <strong>admin@kos.com</strong><br>
                    Password: <strong>password123</strong>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <p class="text-center text-gray-600 text-sm mt-6">
            <i class="fas fa-info-circle text-blue-600"></i> Manajemen Kos Modern v1.0
        </p>
    </div>
</body>
</html>
