@extends('layouts.admin')

@section('page-title', 'Daftar Peserta')
@section('content')
<div class="container mx-auto px-2 py-2">
    <!-- Header dan Search Bar -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Peserta</h1>
            <p class="text-orange-600">Data Peserta Pelatihan Broadband Learning Center Surabaya</p>
        </div>
        
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.peserta.create') }}" 
            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Peserta
            </a>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <form method="GET" class="flex flex-col md:flex-row gap-4">
            <!-- Search by Name -->
            <div class="flex-1">
                <input type="text" name="search" placeholder="Cari peserta..." 
                    value="{{ request('search') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>
            
            <!-- Kategori Filter -->
            <div class="flex-1">
                <select name="kategori" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">Kategori</option>
                    <option value="sd" {{ request('kategori') == 'sd' ? 'selected' : '' }}>SD</option>
                    <option value="smp" {{ request('kategori') == 'smp' ? 'selected' : '' }}>SMP</option>
                    <option value="sma" {{ request('kategori') == 'sma' ? 'selected' : '' }}>SMA</option>
                    <option value="umum" {{ request('kategori') == 'umum' ? 'selected' : '' }}>Umum</option>
                </select>
            </div>
            
            <!-- Materi Filter -->
            <div class="flex-1">
                <select name="materi" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">Materi</option>
                    <option value="fun_programing" {{ request('materi') == 'fun_programing' ? 'selected' : '' }}>Fun Programming</option>
                    <option value="desain_grafis" {{ request('materi') == 'desain_grafis' ? 'selected' : '' }}>Desain Grafis</option>
                    <option value="aplikasi_perkantoran" {{ request('materi') == 'aplikasi_perkantoran' ? 'selected' : '' }}>Aplikasi Perkantoran</option>
                </select>
            </div>
            
            <!-- Status Filter -->
            <div class="flex-1">
                <select name="status" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">Status</option>
                    <option value="tervalidasi" {{ request('status') == 'tervalidasi' ? 'selected' : '' }}>Tervalidasi</option>
                    <option value="belum" {{ request('status') == 'belum' ? 'selected' : '' }}>Belum Validasi</option>
                </select>
            </div>
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                Filter
            </button>
            <a href="{{ route('admin.peserta.index') }}"
              class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg">
                Reset
            </a>
        </form>
    </div>

    <!-- Tabel Peserta -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Kelamin</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Materi</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($peserta as $key => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 whitespace-nowrap">{{ $peserta->firstItem() + $key }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $item->nama }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $item->nik }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            {{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            @php
                                $kategoriLabels = [
                                    'sd' => 'SD',
                                    'smp' => 'SMP',
                                    'sma' => 'SMA',
                                    'umum' => 'Umum'
                                ];
                            @endphp
                            {{ $kategoriLabels[$item->kategori] ?? $item->kategori }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            @php
                                $materiLabels = [
                                    'fun_programing' => 'Fun Programming',
                                    'desain_grafis' => 'Desain Grafis',
                                    'aplikasi_perkantoran' => 'Aplikasi Perkantoran'
                                ];
                            @endphp
                            {{ $materiLabels[$item->materi] ?? $item->materi }}
                        </td>
                         <td class="px-6 py-4 whitespace-nowrap">
                            @if($item->status == 'tervalidasi')
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">
                                    Tervalidasi
                                </span>
                            @else
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">
                                    Belum Validasi
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.peserta.update', $item->id) }}" 
                                  class="text-blue-600 hover:text-blue-900">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.peserta.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Hapus data ini?')" 
                                            class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @if($item->status == 'tervalidasi')
                                    <a href="{{ route('admin.peserta.nonvalidasi', $item->id) }}" 
                                      class="text-gray-600 hover:text-gray-900">
                                        <i class="fas fa-times-circle"></i>
                                    </a>
                                @else
                                    <a href="{{ route('admin.peserta.validasi', $item->id) }}" 
                                      class="text-green-600 hover:text-green-900">
                                        <i class="fas fa-check-circle"></i>
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        
        <!-- Pagination -->
        <div class="bg-gray-50 px-6 py-3">
            {{ $peserta->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection