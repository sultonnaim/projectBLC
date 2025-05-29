@extends('layouts.admin')

@section('page-title', 'Daftar Pengunjung')

@section('content')
<div class="container mx-auto px-2 py-2">
    <!-- Header dan Search Bar -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Pengunjung</h1>
            <p class="text-orange-600">Data pengunjung BLC Surabaya</p>
        </div>
        
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.pengunjung.entrypengunjung') }}" 
            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Pengunjung
            </a>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <form method="GET" class="flex flex-col md:flex-row gap-4">
            <!-- Search by Name -->
            <div class="flex-1">
                <input type="text" name="search" placeholder="Cari nama pengunjung..." 
                    value="{{ request('search') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>
            
            <!-- Date Filter -->
            <div class="flex items-center gap-2">
                <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                    class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                <button type="submit" 
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                    Filter
                </button>
                <a href="{{ route('admin.pengunjung.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg">
                    Reset
                </a>
            </div>
        </form>
    </div>

<!-- Tabel Pengunjung -->
<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sesi</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gender</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lahir</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($pengunjungs as $key => $pengunjung)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-sm whitespace-nowrap">{{ $pengunjungs->firstItem() + $key }}</td>
                    <td class="px-4 py-3 text-sm whitespace-nowrap">
                        {{ \Carbon\Carbon::parse($pengunjung->tanggal)->format('d/m/Y') }}
                    </td>
                    <td class="px-4 py-3 text-sm whitespace-nowrap">{{ $pengunjung->sesi }}</td>
                    <td class="px-4 py-3 text-sm whitespace-nowrap">{{ $pengunjung->nama_lengkap }}</td>
                    <td class="px-4 py-3 text-sm">{{ Str::limit($pengunjung->alamat, 25) }}</td>
                    <td class="px-4 py-3 text-sm whitespace-nowrap">
                        {{ $pengunjung->jenis_kelamin == 'L' ? 'L' : 'P' }}
                    </td>
                    <td class="px-4 py-3 text-sm whitespace-nowrap">
                        {{ \Carbon\Carbon::parse($pengunjung->tanggal_lahir)->format('d/m/Y') }}
                    </td>
                    <td class="px-4 py-3 text-sm whitespace-nowrap">
                        <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">
                            {{ $pengunjung->kategori }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm whitespace-nowrap">
                        <form action="{{ route('admin.pengunjung.destroy', $pengunjung->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus data ini?')" 
                                    class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash text-sm"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="bg-gray-50 px-4 py-3">
        {{ $pengunjungs->appends(request()->query())->links() }}
    </div>
</div>

</div>
@endsection