@extends('layouts.admin')

@section('page-title', 'Daftar Kelas')

@section('content')
<div class="container mx-auto px-4 py-6">
  <!-- Header dengan Tombol Cetak -->
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Daftar Kelas</h1>
    <a href="{{ route('admin.kelas.cetak-pdf') }}" 
       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
      <i class="fas fa-file-pdf mr-2"></i> Cetak PDF
    </a>
  </div>

  <!-- Tabel Daftar Kelas -->
  <div class="bg-white rounded-lg shadow overflow-hidden">
    @foreach($dataKelas as $hari => $kelas)
    <div class="border-b last:border-b-0">
      <div class="bg-gray-50 px-6 py-3">
        <h2 class="font-semibold text-gray-800">{{ $hari }}</h2>
      </div>
      
      <div class="divide-y divide-gray-200">
        @foreach($kelas as $item)
        <div class="px-6 py-4 hover:bg-gray-50 transition-colors">
          <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div class="mb-2 md:mb-0">
              <h3 class="font-medium text-gray-900">{{ $item['nama_kelas'] }}</h3>
              <p class="text-sm text-gray-500">{{ $item['waktu'] }}</p>
            </div>
            <div class="flex items-center">
              <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                <span class="text-blue-600 text-sm font-medium">
                  {{ substr($item['pelatih'], 0, 1) }}
                </span>
              </div>
              <span class="ml-2 text-gray-700">{{ $item['pelatih'] }}</span>
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