<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('/kamar', KamarController::class);
    Route::resource('/penghuni', PenghuniController::class);
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');
});

Auth::routes();
