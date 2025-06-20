@extends('layouts.superadmin')

@section('page-title', 'Manajemen Lokasi BLC')

@section('content')
<div class="container mx-auto px-4 py-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Lokasi BLC</h1>
            <p class="text-orange-600">Kelola lokasi Broadband Learning Center</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('superadmin.masterdata.entryblc') }}"
               class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah Lokasi
            </a>
        </div>
    </div>

    <!-- Notifikasi -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Lokasi BLC -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase">#</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase">Wilayah</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase">Area</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase">Link Maps</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($blcLocations as $index => $blc)
                    <tr>
                        <td class="px-4 py-3 text-sm text-gray-700">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $blc->wilayah ?? '-' }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $blc->name ?? '-' }}</td>
                        <td class="px-4 py-3 text-sm text-blue-600">
                            <a href="{{ $blc->url }}" target="_blank" class="hover:underline">Lihat Maps</a>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex gap-2">
                                <a href="{{ route('superadmin.masterdata.formeditblc', $blc->id) }}" 
                                   class="text-blue-600 hover:underline text-sm">Edit</a>

                                <form action="{{ route('superadmin.masterdata.blc.destroy', $blc->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus lokasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    @if($blcLocations->isEmpty())
                        <tr>
                            <td colspan="5" class="px-4 py-3 text-center text-gray-500">Belum ada lokasi BLC terdaftar.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
