@extends('layouts.app')

@section('title', 'Tambah Kamar - Manajemen Kos')
@section('page-title', 'Tambah Kamar')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="card">
        <form action="{{ route('kamar.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="label-field">Kode Kamar</label>
                <input type="text" name="kode_kamar" class="input-field @error('kode_kamar') border-red-500 @enderror" 
                    placeholder="Contoh: K001" value="{{ old('kode_kamar') }}" required>
                @error('kode_kamar')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="label-field">Nama Kamar</label>
                <input type="text" name="nama_kamar" class="input-field @error('nama_kamar') border-red-500 @enderror" 
                    placeholder="Contoh: Kamar 1A" value="{{ old('nama_kamar') }}" required>
                @error('nama_kamar')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="label-field">Harga (Rp)</label>
                <input type="number" name="harga" class="input-field @error('harga') border-red-500 @enderror" 
                    placeholder="Contoh: 500000" value="{{ old('harga') }}" required>
                @error('harga')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="label-field">Status</label>
                <select name="status" class="input-field @error('status') border-red-500 @enderror" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Kosong" {{ old('status') == 'Kosong' ? 'selected' : '' }}>Kosong</option>
                    <option value="Terisi" {{ old('status') == 'Terisi' ? 'selected' : '' }}>Terisi</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="btn-primary flex-1">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('kamar.index') }}" class="btn-secondary flex-1 text-center">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
