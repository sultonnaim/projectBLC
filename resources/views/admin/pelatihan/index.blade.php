@extends('layouts.admin')

@section('title', 'Daftar Hadir Pelatihan')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Hadir Pelatihan</h1>
    </div>

    <!-- Search Bar -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <form method="GET" action="{{ route('admin.pelatihan.index') }}">
            <div class="flex">
                <input type="text" name="search" value="{{ request('search') }}" 
                    placeholder="Cari peserta (nama/NIK)..."
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" 
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r-lg">
                    <i class="fas fa-search mr-2"></i> Cari
                </button>
            </div>
        </form>
    </div>

    <!-- Tabel Peserta -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Kelamin</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($peserta as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $item->nama }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->nik }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($item->alamat, 30) }}</td>
<td class="px-6 py-4 whitespace-nowrap">
    <div class="flex items-center space-x-4">
        <label class="inline-flex items-center">
            <input type="checkbox" name="absensi[{{ $item->id }}][hadir]" value="1"
                   class="form-checkbox h-5 w-5 text-green-600 rounded focus:ring-green-500">
            <span class="ml-2 text-gray-700">Hadir</span>
        </label>
        <label class="inline-flex items-center">
            <input type="checkbox" name="absensi[{{ $item->id }}][tidak_hadir]" value="1"
                   class="form-checkbox h-5 w-5 text-red-600 rounded focus:ring-red-500">
            <span class="ml-2 text-gray-700">Tidak Hadir</span>
        </label>
    </div>
</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="bg-white px-6 py-4 border-t border-gray-200">
            {{ $peserta->links() }}
        </div>
    </div>

    <!-- Box Absensi -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mt-6">
        <form method="POST" action="{{ route('admin.pelatihan.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-medium text-gray-900">Form Absensi</h2>
            </div>
            
            <div class="px-6 py-4 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Absensi</label>
                        <input type="date" name="tanggal_absensi" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Foto Kegiatan</label>
                        <div class="flex items-center">
                            <input type="file" name="foto_kegiatan" accept="image/*" id="foto_kegiatan"
                                   class="hidden">
                            <label for="foto_kegiatan" class="cursor-pointer bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-l-md border border-gray-300">
                                Pilih File
                            </label>
                            <span id="file-name" class="px-3 py-2 border border-l-0 border-gray-300 rounded-r-md text-sm text-gray-500 flex-1 truncate">
                                Belum ada file dipilih
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="pt-4 flex justify-end">
                    <button type="submit" 
                            class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md shadow-sm flex items-center">
                        <i class="fas fa-save mr-2"></i> Simpan Absensi
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Untuk menampilkan nama file yang dipilih
    document.getElementById('foto_kegiatan').addEventListener('change', function(e) {
        const fileName = e.target.files[0] ? e.target.files[0].name : 'Belum ada file dipilih';
        document.getElementById('file-name').textContent = fileName;
    });
</script>
@endsection