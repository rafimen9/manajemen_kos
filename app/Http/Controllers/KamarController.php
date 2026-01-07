<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::all();
        return view('kamar.index', compact('kamars'));
    }

    public function create()
    {
        return view('kamar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_kamar' => 'required|unique:kamars',
            'nama_kamar' => 'required',
            'harga' => 'required|numeric',
            'status' => 'required|in:Kosong,Terisi'
        ]);

        Kamar::create($validated);
        return redirect('/kamar')->with('success', 'Kamar berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        return view('kamar.edit', compact('kamar'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_kamar' => 'required|unique:kamars,kode_kamar,'.$id,
            'nama_kamar' => 'required',
            'harga' => 'required|numeric',
            'status' => 'required|in:Kosong,Terisi'
        ]);

        Kamar::findOrFail($id)->update($validated);
        return redirect('/kamar')->with('success', 'Kamar berhasil diperbarui');
    }

    public function destroy($id)
    {
        Kamar::destroy($id);
        return redirect('/kamar')->with('success', 'Kamar berhasil dihapus');
    }

    public function home()
    {
        return view('dashboard', [
            'total'  => Kamar::count(),
            'kosong' => Kamar::where('status','Kosong')->count(),
            'terisi' => Kamar::where('status','Terisi')->count(),
        ]);
    }
}
