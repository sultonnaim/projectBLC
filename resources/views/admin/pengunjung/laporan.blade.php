@extends('layouts.admin')

@section('page-title', 'Laporan Kegiatan Pengunjung')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Laporan Kegiatan Pengunjung</h1>

        <!-- Filter Tanggal -->
        <form method="GET" action="{{ route('admin.pengunjung.laporan') }}" class="mb-6 flex flex-wrap gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Mulai Tanggal</label>
                <input type="date" name="start_date" value="{{ request('start_date') }}" class="px-3 py-2 border rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Sampai Tanggal</label>
                <input type="date" name="end_date" value="{{ request('end_date') }}" class="px-3 py-2 border rounded-lg">
            </div>
            <div class="flex items-end">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Tampilkan
                </button>
            </div>
        </form>

        <!-- Tabel Daftar Pengunjung -->
        <div class="overflow-x-auto mb-8">
            <table class="min-w-full text-sm text-left border">
                <thead class="bg-gray-100 text-gray-700 uppercase">
                    <tr>
                        <th class="px-4 py-2 border">Nama</th>
                        <th class="px-4 py-2 border">Jenis Kelamin</th>
                        <th class="px-4 py-2 border">Alamat</th>
                        <th class="px-4 py-2 border">Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    @if(request()->filled('start_date') && request()->filled('end_date'))
                        @forelse ($pengunjungs as $p)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border">{{ $p->nama_lengkap }}</td>
                                <td class="px-4 py-2 border">{{ ucfirst($p->jenis_kelamin) }}</td>
                                <td class="px-4 py-2 border">{{ $p->alamat }}</td>
                                <td class="px-4 py-2 border capitalize">{{ $p->kategori }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center px-4 py-4 text-gray-500 border">Tidak ada data pengunjung</td>
                            </tr>
                        @endforelse
                    @else
                        <tr>
                            <td colspan="4" class="text-center px-4 py-4 text-gray-500 border">Silakan pilih rentang tanggal terlebih dahulu.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Tabel Rekap Total -->
        <div class="max-w-md">
            <h2 class="text-lg font-semibold mb-2">Rekap Kategori</h2>
            <table class="min-w-full text-sm text-left border">
                <thead class="bg-gray-100 text-gray-700 uppercase">
                    <tr>
                        <th class="px-4 py-2 border">Kategori</th>
                        <th class="px-4 py-2 border">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2 border">Siswa</td>
                        <td class="px-4 py-2 border">{{ $rekap['siswa'] ?? 0 }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 border">Umum</td>
                        <td class="px-4 py-2 border">{{ $rekap['umum'] ?? 0 }}</td>
                    </tr>
                    <tr class="font-semibold">
                        <td class="px-4 py-2 border">Total</td>
                        <td class="px-4 py-2 border">{{ array_sum($rekap) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
