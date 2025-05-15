@extends('layouts.admin')

@section('title', 'Daftar Kelas')
@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Kelas</h1>
            <p class="text-gray-600">Jadwal pelatihan BLC Surabaya</p>
        </div>
        <a href="{{ route('admin.kelas.cetak-pdf') }}" 
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-file-pdf mr-2"></i> Cetak PDF
        </a>
    </div>

    <!-- Daftar Kelas -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        @foreach($dataKelas as $hari => $kelas)
        <div class="border-b last:border-b-0">
            <!-- Header Hari -->
            <div class="bg-gray-50 px-6 py-4">
                <h2 class="text-lg font-semibold text-gray-800">{{ $hari }}</h2>
            </div>
            
            <!-- Daftar Kelas per Hari -->
            <div class="divide-y divide-gray-200">
                @foreach($kelas as $item)
                <div class="px-6 py-4 hover:bg-gray-50 transition-colors">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="mb-2 md:mb-0">
                            <div class="flex items-center">
                                <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded mr-3">
                                    {{ $item['sesi'] }}
                                </span>
                                <h3 class="text-lg font-medium">{{ $item['nama_kelas'] }}</h3>
                            </div>
                            <p class="text-sm text-gray-500 mt-1">{{ $item['ruangan'] }}</p>
                        </div>
                        <div class="flex items-center">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                    <span class="text-blue-600 text-sm font-medium">
                                        {{ substr($item['mentor'], 0, 1) }}
                                    </span>
                                </div>
                                <span>{{ $item['mentor'] }}</span>
                            </div>
                            <span class="ml-6 px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm">
                                {{ $item['waktu'] }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection