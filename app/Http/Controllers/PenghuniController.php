<?php

namespace App\Http\Controllers;

use App\Models\Penghuni;
use App\Models\Kamar;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    public function index()
    {
        $penghunis = Penghuni::with('kamar')->paginate(10);
        return view('penghuni.index', compact('penghunis'));
    }

    public function create()
    {
        $kamars = Kamar::where('status', 'Kosong')->get();
        return view('penghuni.create', compact('kamars'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'no_hp' => 'required|string',
            'kamar_id' => 'required|exists:kamars,id',
            'tgl_masuk' => 'required|date'
        ]);

        Penghuni::create($validated);
        
        $kamar = Kamar::find($validated['kamar_id']);
        $kamar->update(['status' => 'Terisi']);

        return redirect('/penghuni')->with('success', 'Penghuni berhasil ditambahkan');
    }

    public function show(Penghuni $penghuni)
    {
        //
    }

    public function edit($id)
    {
        $penghuni = Penghuni::findOrFail($id);
        $kamars = Kamar::all();
        return view('penghuni.edit', compact('penghuni', 'kamars'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'no_hp' => 'required|string',
            'kamar_id' => 'required|exists:kamars,id',
            'tgl_masuk' => 'required|date',
            'tgl_keluar' => 'nullable|date'
        ]);

        $penghuni = Penghuni::findOrFail($id);
        $old_kamar_id = $penghuni->kamar_id;

        $penghuni->update($validated);

        if ($old_kamar_id != $validated['kamar_id']) {
            Kamar::find($old_kamar_id)->update(['status' => 'Kosong']);
            Kamar::find($validated['kamar_id'])->update(['status' => 'Terisi']);
        }

        return redirect('/penghuni')->with('success', 'Penghuni berhasil diperbarui');
    }

    public function destroy($id)
    {
        $penghuni = Penghuni::findOrFail($id);
        $kamar_id = $penghuni->kamar_id;
        
        $penghuni->delete();
        
        Kamar::find($kamar_id)->update(['status' => 'Kosong']);

        return redirect('/penghuni')->with('success', 'Penghuni berhasil dihapus');
    }
}
