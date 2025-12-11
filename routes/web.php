<?php

use Illuminate\Support\Facades\Route;



Route::get('/home', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/kamar', function () {
    return view('kamar');
});

Route::get('/penghuni', function () {
    return view('penghuni');
});