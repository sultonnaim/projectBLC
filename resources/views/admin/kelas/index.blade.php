@extends('layouts.admin')

@section('page-title', 'Daftar Kelas')

@section('content')
<div class="container mx-auto px-2 py-2">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Kelas</h1>
            <p class="text-orange-600">Jadwal pelatihan BLC Surabaya</p>
        </div>
        <a href="{{ route('admin.kelas.cetak-pdf') }}" 
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-file-pdf mr-2"></i> Cetak PDF
        </a>
    </div>

    <!-- Jadwal Kelas Aktif -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-10">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="px-6 py-3 text-left">Hari</th>
                        <th class="px-6 py-3 text-center">Sesi 1<br>(09:00-11:00)</th>
                        <th class="px-6 py-3 text-center">Sesi 2<br>(13:00-15:00)</th>
                        <th class="px-6 py-3 text-center">Sesi 3<br>(13:00-15:00)</th>
                        <th class="px-6 py-3 text-center">Sesi 4<br>(13:00-15:00)</th>
                        <th class="px-6 py-3 text-center">Sesi 5<br>(13:00-15:00)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($dataKelas as $hari => $kelas)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $hari }}</td>
                        
                        @php
                            $sesi1 = collect($kelas)->firstWhere('sesi', 'Sesi 1');
                            $sesi2 = collect($kelas)->firstWhere('sesi', 'Sesi 2');
                            $sesi3 = collect($kelas)->firstWhere('sesi', 'Sesi 3');
                            $sesi4 = collect($kelas)->firstWhere('sesi', 'Sesi 4');
                            $sesi5 = collect($kelas)->firstWhere('sesi', 'Sesi 5');
                        @endphp
                        
                        <td class="px-6 py-4 text-center">
                            @if($sesi1)
                            <div class="mb-1 font-medium text-gray-800">{{ $sesi1['nama_kelas'] }}</div>
                            <div class="text-xs text-gray-500 mt-1">{{ $sesi1['ruangan'] }}</div>
                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        
                        <td class="px-6 py-4 text-center">
                            @if($sesi2)
                            <div class="mb-1 font-medium text-gray-800">{{ $sesi2['nama_kelas'] }}</div>
                            <div class="text-xs text-gray-500 mt-1">{{ $sesi2['ruangan'] }}</div>
                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Informasi Kelas -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Daftar Semua Kelas</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Kelas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hari</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sesi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peserta</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Materi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($allKelas as $kelas)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $kelas['nama_kelas'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $kelas['hari'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $kelas['sesi'] }} ({{ $kelas['waktu'] }})</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $kelas['ruangan'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection