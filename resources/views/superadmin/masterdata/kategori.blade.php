@extends('layouts.superadmin')

@section('content')
<div class="container mx-auto py-6 space-y-10">
    <h2 class="text-2xl font-bold text-gray-800">Manajemen Kategori & Sesi</h2>

    {{-- KATEGORI --}}
    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-lg font-semibold text-orange-600 mb-4">Kategori</h3>

        {{-- Form Tambah Kategori --}}
        <form method="POST" action="{{ route('superadmin.masterdata.kategori.store') }}" class="flex gap-2 mb-6">
            @csrf
            <input type="text" name="nama" placeholder="Nama kategori" required
                   class="border px-4 py-2 rounded flex-grow focus:ring-2 focus:ring-orange-400">
            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded flex items-center justify-center">
                <i class="fas fa-plus"></i>
            </button>
        </form>

        {{-- Daftar Kategori --}}
        <ul class="space-y-3">
            @foreach($kategoris as $kategori)
                <li x-data="{ edit: false }" class="border-b pb-2">
                    <div class="flex justify-between items-center">
                        <span x-show="!edit">{{ $kategori->nama }}</span>
                        <div class="flex gap-2">
                            <button @click="edit = !edit" class="text-blue-500 hover:text-blue-700 text-sm">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="{{ route('superadmin.masterdata.kategori.destroy', $kategori) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <form x-show="edit" x-transition method="POST" action="{{ route('superadmin.masterdata.kategori.update', $kategori) }}" class="flex gap-2 mt-2">
                        @csrf @method('PUT')
                        <input type="text" name="nama" value="{{ $kategori->nama }}" class="border px-2 py-1 rounded text-sm w-full">
                        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                            <i class="fas fa-save mr-1"></i> Simpan
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- SESI --}}
    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-lg font-semibold text-orange-600 mb-4">Sesi Kunjungan</h3>

        {{-- Form Tambah Sesi --}}
        <form method="POST" action="{{ route('superadmin.masterdata.sesi.store') }}" class="flex gap-2 mb-6">
            @csrf
            <input type="text" name="nama" placeholder="Nama sesi" required
                   class="border px-4 py-2 rounded w-[60%] focus:ring-2 focus:ring-orange-400">
            <input type="time" name="jam" required
                   class="border px-4 py-2 rounded w-[30%] focus:ring-2 focus:ring-orange-400">
            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded flex items-center justify-center w-[10%] min-w-[40px]">
                <i class="fas fa-plus"></i>
            </button>
        </form>

        {{-- Daftar Sesi --}}
        <ul class="space-y-3">
            @foreach($sesis as $sesi)
                <li x-data="{ edit: false }" class="border-b pb-2">
                    <div class="flex justify-between items-center">
                        <span x-show="!edit">{{ $sesi->nama }} - {{ $sesi->jam }}</span>
                        <div class="flex gap-2">
                            <button @click="edit = !edit" class="text-blue-500 hover:text-blue-700 text-sm">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="{{ route('superadmin.masterdata.sesi.destroy', $sesi) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <form x-show="edit" x-transition method="POST" action="{{ route('superadmin.masterdata.sesi.update', $sesi) }}" class="flex gap-2 mt-2">
                        @csrf @method('PUT')
                        <input type="text" name="nama" value="{{ $sesi->nama }}" class="border px-2 py-1 rounded text-sm w-[60%]">
                        <input type="time" name="jam" value="{{ $sesi->jam }}" class="border px-2 py-1 rounded text-sm w-[30%]">
                        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded text-sm w-[10%] min-w-[40px] flex justify-center items-center">
                            <i class="fas fa-save"></i>
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
