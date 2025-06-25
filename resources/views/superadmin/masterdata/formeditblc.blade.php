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
        class="space-y-4 bg-white p-6 rounded-lg shadow-md w-full"
    >
        @csrf
        @if(isset($blcLocation))
            @method('PUT')
        @endif

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

        <div>
            <label for="area" class="block font-medium">Nama Area BLC</label>
            <input type="text" name="area" id="area" 
                class="w-full px-4 py-2 border rounded-lg"
                value="{{ old('area', $blcLocation->area ?? '') }}" required>
        </div>

        <div>
            <label for="link_maps" class="block font-medium">Link Google Maps</label>
            <input type="url" name="link_maps" id="link_maps" 
                class="w-full px-4 py-2 border rounded-lg"
                value="{{ old('link_maps', $blcLocation->link_maps ?? '') }}" required>
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('superadmin.masterdata.editblc') }}" 
               class="text-gray-600 hover:underline">← Kembali</a>

        <div class="text-right">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">
                {{ isset($blcLocation) ? 'Update Lokasi' : 'Simpan Lokasi' }}
            </button>
        </div>
    </form>

</div>
@endsection
