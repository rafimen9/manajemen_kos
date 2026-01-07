<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penghuni;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_kamar = Kamar::count();
        $kamar_kosong = Kamar::where('status', 'Kosong')->count();
        $kamar_terisi = Kamar::where('status', 'Terisi')->count();
        $total_penghuni = Penghuni::count();

        return view('dashboard', compact('total_kamar', 'kamar_kosong', 'kamar_terisi', 'total_penghuni'));
    }
}
