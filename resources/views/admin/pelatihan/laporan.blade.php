@extends('layouts.admin')

@section('page-title', 'Laporan Absensi Pelatihan')
@section('content')
<div class="container mx-auto px-2 py-2">
    <h1 class="text-2xl font-bold mb-6">Laporan Absensi Pelatihan</h1>
    
    <!-- Search Bar by Date -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <form method="GET" action="{{ route('admin.pelatihan.laporan') }}" class="flex flex-col md:flex-row gap-4 items-end">
            <div class="w-full md:w-64">
                <label for="filter_date" class="block text-sm font-medium text-gray-700 mb-1">Filter Tanggal</label>
                <input type="date" name="filter_date" id="filter_date" 
                    value="{{ request('filter_date') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                Cari
            </button>
            <a href="{{ route('admin.pelatihan.laporan') }}" 
            class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg">
                Reset
            </a>
        </form>
    </div>

    <!-- Tabel Laporan -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peserta</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto Kegiatan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($absensi as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $item->tanggal_absensi->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $item->kelas->nama_kelas }}</div>
                            <div class="text-sm text-gray-500">{{ $item->kelas->materi }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $item->peserta->nama }}</div>
                            <div class="text-sm text-gray-500">{{ $item->peserta->nik }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($item->status == 'hadir')
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">
                                    Hadir
                                </span>
                            @else
                                <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">
                                    Tidak Hadir
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ Storage::url($item->foto_kegiatan) }}" target="_blank" 
                               class="text-blue-600 hover:text-blue-900 text-sm">
                                Lihat Foto
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="bg-white px-6 py-4 border-t border-gray-200">
            {{ $absensi->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection