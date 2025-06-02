@extends('layouts.admin')

@section('page-title', 'Daftar Kelas')

@section('content')
<div class="container mx-auto px-4 py-4">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-700">Daftar Kelas</h1>
            <p class="text-orange-600">Jadwal pelatihan Broadband Learning Center Surabaya</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.kelas.cetak-pdf') }}" 
               class="bg-blue-700 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-file-pdf mr-2"></i> Cetak PDF
            </a>
            <a href="{{ route('admin.kelas.create') }}" 
               class="bg-orange-700 hover:bg-orange-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-plus mr-2"></i> Kelas Baru
            </a>
        </div>
    </div>

    <!-- Jadwal Kelas Aktif -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-6">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-700">Jadwal Kelas Mingguan</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="px-4 py-3 text-left w-1/6">Hari</th>
                        <th class="px-4 py-3 text-center w-1/6">Sesi 1<br>(09:00-11:00)</th>
                        <th class="px-4 py-3 text-center w-1/6">Sesi 2<br>(13:00-15:00)</th>
                        <th class="px-4 py-3 text-center w-1/6">Sesi 3<br>(15:00-17:00)</th>
                        <th class="px-4 py-3 text-center w-1/6">Sesi 4<br>(17:00-19:00)</th>
                        <th class="px-4 py-3 text-center w-1/6">Sesi 5<br>(19:00-21:00)</th>
                    </tr>
                </thead>
<tbody class="divide-y divide-gray-200">
    @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $hari)
    <tr class="hover:bg-gray-50">
        <td class="px-4 py-3 font-medium text-gray-900">{{ $hari }}</td>
        
        @foreach(['Sesi 1', 'Sesi 2', 'Sesi 3', 'Sesi 4', 'Sesi 5'] as $sesi)
        <td class="px-4 py-3 text-center">
           @if(isset($dataKelas[$hari][$sesi]))
                            @php $kelas = $dataKelas[$hari][$sesi]->first(); @endphp
                            <div class="text-gray-700">{{ $kelas->materi }}</div>
                        @else
                <span class="text-gray-700 font-semibold">-</span>
            @endif
        </td>
        @endforeach
    </tr>
    @endforeach
</tbody>
            </table>
        </div>
    </div>

    <!-- Daftar Semua Kelas -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <h2 class="text-lg font-semibold text-gray-700">Daftar Semua Kelas</h2>
            
<div class="w-full md:w-64">
    <form method="GET" action="{{ route('admin.kelas.index') }}">
        <div class="relative">
            <input type="text" name="search" placeholder="Cari materi/kelas..." 
                   class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500" 
                   value="{{ request('search') }}"
                   autocomplete="off">
            <button type="submit" class="absolute left-3 top-3 text-gray-400">
                <i class="fas fa-search"></i>
            </button>
            @if(request('search'))
            <a href="{{ route('admin.kelas.index') }}" 
               class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </a>
            @endif
        </div>
    </form>
</div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Nama Kelas</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Hari/Sesi</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Materi</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Peserta</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($allKelas as $kelas)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-4">
                            <div class="font-medium text-gray-900">{{ $kelas->nama_kelas }}</div>
                            <div class="text-sm text-gray-700">{{ $kelas->ruangan }}</div>
                            <div class="text-xs text-gray-400 mt-1">
                                Mulai: {{ $kelas->tanggal_mulai->format('d/m/Y') }}
                            </div>
                        </td>
                            <td class="px-4 py-4">
                            <div class="text-sm text-gray-900">
                                {{ implode(', ', $kelas->hari) }}
                            </div>
                            <div class="text-sm text-gray-700">
                                {{ $kelas->sesi }} 
                                {{-- ({{ $kelas->jam_mulai }} - {{ $kelas->jam_selesai }}) --}}
                            </div>
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-700">
                            {{ $kelas->materi }}
                        </td>
                        <td class="px-4 py-4 text-center">
                            <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs">
                            {{ $kelas->pesertas_count }} peserta
                            </span>
                            <a href="{{ route('admin.kelas.index', $kelas->id) }}" 
                            class="block mt-1 text-xs text-blue-600 hover:underline">
                            Kelola Peserta
                            </a>
                            </td>
                        <td class="px-4 py-4">
                            <form action="{{ route('admin.kelas.toggle-status', $kelas->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-3 py-1 rounded-full text-xs font-medium 
                                    {{ $kelas->status_aktif ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                    {{ $kelas->status_aktif ? 'Aktif' : 'Nonaktif' }}
                                </button>
                            </form>
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex flex-col space-y-2">
                                <a href="{{ route('admin.kelas.edit', $kelas->id) }}" 
                                    class="text-blue-600 hover:text-blue-900 text-sm flex items-center">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                                <form action="{{ route('admin.kelas.destroy', $kelas->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900 text-sm flex items-center"
                                            onclick="return confirm('Hapus kelas ini?')">
                                        <i class="fas fa-trash-alt mr-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    <!-- Pagination -->
   <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
        {{ $allKelas->appends(request()->query())->links() }}
    </div>
</div>
        </div>
    </div>
</div>
@endsection