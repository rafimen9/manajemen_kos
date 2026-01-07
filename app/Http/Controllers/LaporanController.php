<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penghuni;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $kamars = Kamar::all();
        $penghunis = Penghuni::with('kamar')->get();
        $total_kamar = Kamar::count();
        $kamar_kosong = Kamar::where('status', 'Kosong')->count();
        $kamar_terisi = Kamar::where('status', 'Terisi')->count();
        $total_penghuni = Penghuni::count();
        $total_pendapatan = Kamar::where('status', 'Terisi')->sum('harga');

        return view('laporan.index', compact('kamars', 'penghunis', 'total_kamar', 'kamar_kosong', 'kamar_terisi', 'total_penghuni', 'total_pendapatan'));
    }

    public function exportPDF()
    {
        // Untuk implementasi PDF nanti
        return $this->index();
    }
}
