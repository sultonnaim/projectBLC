@extends('layouts.superadmin')

@section('page-title', isset($blcLocation) ? 'Edit Lokasi BLC' : 'Tambah Lokasi BLC')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-xl font-bold mb-4 text-gray-800">
        {{ isset($blcLocation) ? 'Form Edit Lokasi BLC' : 'Form Tambah Lokasi BLC' }}
    </h1>

    <form 
        action="{{ isset($blcLocation) 
                    ? route('superadmin.masterdata.blc.update', $blcLocation->id) 
                    : route('superadmin.masterdata.blc.store') }}" 
        method="POST" 
        enctype="multipart/form-data"
        class="space-y-4 bg-white p-6 rounded-lg shadow-md w-full"
    >
        @csrf
        @if(isset($blcLocation))
            @method('PUT')
        @endif

        {{-- Wilayah --}}
        <div>
            <label for="wilayah" class="block font-medium">Wilayah</label>
            <select name="wilayah" id="wilayah" class="w-full px-4 py-2 border rounded-lg" required>
                <option value="">-- Pilih Wilayah --</option>
                @php
                    $wilayahList = ['Surabaya Utara', 'Surabaya Barat', 'Surabaya Timur', 'Surabaya Selatan', 'Surabaya Pusat'];
                @endphp
                @foreach($wilayahList as $wilayah)
                    <option value="{{ $wilayah }}" 
                        {{ old('wilayah', $blcLocation->wilayah ?? '') === $wilayah ? 'selected' : '' }}>
                        {{ $wilayah }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Area --}}
        <div>
            <label for="area" class="block font-medium">Nama Area BLC</label>
            <input type="text" name="area" id="area" 
                class="w-full px-4 py-2 border rounded-lg"
                value="{{ old('area', $blcLocation->area ?? '') }}" required>
        </div>

        {{-- Link Maps --}}
        <div>
            <label for="link_maps" class="block font-medium">Link Google Maps</label>
            <input type="url" name="link_maps" id="link_maps" 
                class="w-full px-4 py-2 border rounded-lg"
                value="{{ old('link_maps', $blcLocation->link_maps ?? '') }}" required>
        </div>

        {{-- Foto Lokasi --}}
        <div>
            <label for="foto" class="block font-medium">Upload Foto Lokasi</label>
            <input type="file" name="foto" id="foto" 
                accept="image/*"
                class="w-full px-4 py-2 border rounded-lg">

            @if(isset($blcLocation) && $blcLocation->foto)
                <div class="mt-2">
                    <p class="text-sm text-gray-600 mb-1">Foto saat ini:</p>
                    <img src="{{ asset('storage/' . $blcLocation->foto) }}" alt="Foto Lokasi" class="w-48 rounded shadow">
                </div>
            @endif
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('superadmin.masterdata.editblc') }}" 
               class="text-gray-600 hover:underline">← Kembali</a>

            <div class="text-right">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                    {{ isset($blcLocation) ? 'Update Lokasi' : 'Simpan Lokasi' }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
