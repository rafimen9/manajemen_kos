@extends('layouts.app')

@section('title', 'Edit Penghuni - Manajemen Kos')
@section('page-title', 'Edit Penghuni')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="card">
        <form action="{{ route('penghuni.update', $penghuni->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="label-field">Nama Penghuni</label>
                <input type="text" name="nama" class="input-field @error('nama') border-red-500 @enderror" 
                    placeholder="Masukkan nama penghuni" value="{{ old('nama', $penghuni->nama) }}" required>
                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="label-field">No. HP</label>
                <input type="text" name="no_hp" class="input-field @error('no_hp') border-red-500 @enderror" 
                    placeholder="Contoh: 08123456789" value="{{ old('no_hp', $penghuni->no_hp) }}" required>
                @error('no_hp')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="label-field">Kamar</label>
                <select name="kamar_id" class="input-field @error('kamar_id') border-red-500 @enderror" required>
                    <option value="">-- Pilih Kamar --</option>
                    @foreach($kamars as $kamar)
                        <option value="{{ $kamar->id }}" {{ old('kamar_id', $penghuni->kamar_id) == $kamar->id ? 'selected' : '' }}>
                            {{ $kamar->nama_kamar }} - {{ $kamar->kode_kamar }} (Rp. {{ number_format($kamar->harga, 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
                @error('kamar_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="label-field">Tanggal Masuk</label>
                <input type="date" name="tgl_masuk" class="input-field @error('tgl_masuk') border-red-500 @enderror" 
                    value="{{ old('tgl_masuk', $penghuni->tgl_masuk) }}" required>
                @error('tgl_masuk')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="label-field">Tanggal Keluar <span class="text-gray-400 text-sm">(Opsional)</span></label>
                <input type="date" name="tgl_keluar" class="input-field @error('tgl_keluar') border-red-500 @enderror" 
                    value="{{ old('tgl_keluar', $penghuni->tgl_keluar) }}">
                @error('tgl_keluar')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="btn-primary flex-1">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="{{ route('penghuni.index') }}" class="btn-secondary flex-1 text-center">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
