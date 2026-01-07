@extends('layouts.app')

@section('title', 'Data Kamar - Manajemen Kos')
@section('page-title', 'Data Kamar')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h3 class="text-lg text-gray-600">Kelola semua kamar di kos Anda</h3>
    </div>
    <a href="{{ route('kamar.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i> Tambah Kamar
    </a>
</div>

<div class="card">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-blue-50 to-blue-100 border-b-2 border-blue-200">
                <tr>
                    <th class="table-cell text-left text-blue-900 font-bold">#</th>
                    <th class="table-cell text-left text-blue-900 font-bold">Kode Kamar</th>
                    <th class="table-cell text-left text-blue-900 font-bold">Nama Kamar</th>
                    <th class="table-cell text-left text-blue-900 font-bold">Harga</th>
                    <th class="table-cell text-left text-blue-900 font-bold">Status</th>
                    <th class="table-cell text-center text-blue-900 font-bold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kamars as $index => $kamar)
                <tr class="hover:bg-blue-50 transition">
                    <td class="table-cell text-gray-700">{{ $index + 1 }}</td>
                    <td class="table-cell text-gray-700 font-semibold">{{ $kamar->kode_kamar }}</td>
                    <td class="table-cell text-gray-700">{{ $kamar->nama_kamar }}</td>
                    <td class="table-cell text-gray-700 font-semibold">Rp. {{ number_format($kamar->harga, 0, ',', '.') }}</td>
                    <td class="table-cell">
                        @if($kamar->status == 'Kosong')
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-800 font-medium text-sm">
                                <i class="fas fa-check-circle"></i> Kosong
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full bg-orange-100 text-orange-800 font-medium text-sm">
                                <i class="fas fa-user"></i> Terisi
                            </span>
                        @endif
                    </td>
                    <td class="table-cell text-center">
                        <a href="{{ route('kamar.edit', $kamar->id) }}" class="inline-block px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600 transition text-sm mr-2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('kamar.destroy', $kamar->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus kamar ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600 transition text-sm">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="table-cell text-center text-gray-500 py-8">
                        <i class="fas fa-inbox text-3xl mb-2"></i>
                        <p>Belum ada data kamar</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
