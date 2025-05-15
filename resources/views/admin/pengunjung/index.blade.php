@extends('layouts.admin')

@section('title', 'Daftar Pengunjung')
@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header dan Filter -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Pengunjung</h1>
            <p class="text-gray-600">Data pengunjung BLC Surabaya</p>
        </div>
        
        <form method="GET" class="flex items-center gap-3">
            <select name="filter" onchange="this.form.submit()" 
                    class="border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Semua Data</option>
                <option value="hari_ini" {{ request('filter') == 'hari_ini' ? 'selected' : '' }}>Hari Ini</option>
                <option value="minggu_ini" {{ request('filter') == 'minggu_ini' ? 'selected' : '' }}>Minggu Ini</option>
                <option value="bulan_ini" {{ request('filter') == 'bulan_ini' ? 'selected' : '' }}>Bulan Ini</option>
            </select>
        </form>
    </div>

    <!-- Tabel Pengunjung -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Lahir</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sesi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($pengunjungs as $key => $pengunjung)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $pengunjungs->firstItem() + $key }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $pengunjung->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $pengunjung->tgl_lahir->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">
                                {{ $pengunjung->sesi }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $pengunjung->alamat }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <form action="{{ route('admin.pengunjung.destroy', $pengunjung->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Hapus data ini?')" 
                                        class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="bg-gray-50 px-6 py-3">
            {{ $pengunjungs->links() }}
        </div>
    </div>
</div>
@endsection