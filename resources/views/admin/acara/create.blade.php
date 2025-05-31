@extends('layouts.admin')

@section('page-title', 'Tambah Acara Baru')
@section('content')
<div class="container mx-auto px-2 py-2">
    <div class="bg-white rounded-lg shadow-md p-6 max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Acara Baru</h1>
        
        <form action="{{ route('admin.acara.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div class="mb-4">
                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul Acara</label>
                    <input type="text" name="judul" id="judul" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div class="mb-4">
                    <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal dan Waktu</label>
                    <input type="datetime-local" name="tanggal" id="tanggal" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div class="mb-4">
                    <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div class="mb-4">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
                
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition">
                        Batal
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Simpan Acara
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection