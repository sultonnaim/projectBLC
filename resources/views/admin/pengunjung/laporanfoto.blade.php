@extends('layouts.admin')

@section('page-title', 'Laporan Foto Pengunjung')
@section('content')
<div class="container mx-auto px-2 py-2">
    <h1 class="text-2xl font-bold mb-6">Laporan Foto Kegiatan</h1>
    
        <!-- Search Bar by Date -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <form method="GET" action="{{ route('admin.pengunjung.laporanfoto') }}" class="flex flex-col md:flex-row gap-4 items-end">
            <div class="w-full md:w-64">
                <label for="filter_date" class="block text-sm font-medium text-gray-700 mb-1">Filter Tanggal</label>
                <input type="date" name="filter_date" id="filter_date" 
                    value="{{ request('filter_date') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-b lue-600 text-white px-4 py-2 rounded-lg">
                Cari
            </button>
            <a href="{{ route('admin.pengunjung.laporanfoto') }}" 
            class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg">
                Reset
            </a>
        </form>

    </div>
        <div class="flex items-center p-4 rounded-lg mb-6">
            <a href="{{ route('admin.pengunjung.entryfoto') }}" 
            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Foto
            </a>
        </div>

    <!-- Photo Gallery with Pagination -->
    <div class="bg-white p-4 rounded-lg shadow-md">
        @if($fotos->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($fotos as $foto)
                <div class="border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <!-- Fixed image dimensions without zoom -->
                    <div class="overflow-hidden" style="height: 200px;">
                        <img src="{{ Storage::url($foto->path_foto) }}" 
                            alt="Foto kegiatan {{ $foto->tanggal }}" 
                            class="w-full h-full object-contain">
                    </div>
                    <div class="p-4">
                        <p class="font-semibold">{{ \Carbon\Carbon::parse($foto->tanggal)->format('d F Y') }}</p>
                        <p class="text-gray-600">{{ $foto->sesi }}</p>
                        <p class="mt-2 text-sm text-gray-700">{{ $foto->keterangan }}</p>
                        
                        <!-- Action Buttons -->
                        <div class="mt-3 flex space-x-2">
                            <a href="{{ route('admin.pengunjung.updatefoto', $foto->id) }}" 
                            class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                            <form action="{{ route('admin.pengunjung.hapusfoto', $foto->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-800 text-sm font-medium"
                                        onclick="return confirm('Hapus foto ini?')">
                                    <i class="fas fa-trash-alt mr-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $fotos->appends(request()->query())->links() }}
            </div>
        @else
            <div class="text-center py-8">
                <p class="text-gray-500">Tidak ada foto yang ditemukan</p>
            </div>
        @endif
    </div>
</div>
@endsection