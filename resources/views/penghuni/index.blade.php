@extends('layouts.app')

@section('title', 'Data Penghuni - Manajemen Kos')
@section('page-title', 'Data Penghuni')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h3 class="text-lg text-gray-600">Kelola semua penghuni kos Anda</h3>
    </div>
    <a href="{{ route('penghuni.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i> Tambah Penghuni
    </a>
</div>

<div class="card">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-blue-50 to-blue-100 border-b-2 border-blue-200">
                <tr>
                    <th class="table-cell text-left text-blue-900 font-bold">#</th>
                    <th class="table-cell text-left text-blue-900 font-bold">Nama</th>
                    <th class="table-cell text-left text-blue-900 font-bold">No. HP</th>
                    <th class="table-cell text-left text-blue-900 font-bold">Kamar</th>
                    <th class="table-cell text-left text-blue-900 font-bold">Tgl Masuk</th>
                    <th class="table-cell text-left text-blue-900 font-bold">Tgl Keluar</th>
                    <th class="table-cell text-center text-blue-900 font-bold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($penghunis as $index => $penghuni)
                <tr class="hover:bg-blue-50 transition">
                    <td class="table-cell text-gray-700">{{ ($penghunis->currentPage() - 1) * $penghunis->perPage() + $index + 1 }}</td>
                    <td class="table-cell text-gray-700 font-semibold">{{ $penghuni->nama }}</td>
                    <td class="table-cell text-gray-700">{{ $penghuni->no_hp }}</td>
                    <td class="table-cell text-gray-700">
                        <span class="px-2 py-1 rounded bg-blue-100 text-blue-800 text-sm">
                            {{ $penghuni->kamar->nama_kamar ?? '-' }}
                        </span>
                    </td>
                    <td class="table-cell text-gray-700">{{ \Carbon\Carbon::parse($penghuni->tgl_masuk)->format('d/m/Y') }}</td>
                    <td class="table-cell text-gray-700">
                        @if($penghuni->tgl_keluar)
                            {{ \Carbon\Carbon::parse($penghuni->tgl_keluar)->format('d/m/Y') }}
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="table-cell text-center">
                        <a href="{{ route('penghuni.edit', $penghuni->id) }}" class="inline-block px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600 transition text-sm mr-2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('penghuni.destroy', $penghuni->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus penghuni ini?')">
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
                    <td colspan="7" class="table-cell text-center text-gray-500 py-8">
                        <i class="fas fa-inbox text-3xl mb-2"></i>
                        <p>Belum ada data penghuni</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $penghunis->links() }}
    </div>
</div>
@endsection
