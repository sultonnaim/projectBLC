@extends('layouts.superadmin')

@section('page-title', 'Tambah User')

@section('content')

<div class="container mx-auto px-4 py-6">

<!-- Header -->
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">BLC Area</h1>
        <p class="text-orange-600">Kelola area BLC</p>
    </div>
    <div class="flex items-center gap-3">
        <a href="{{ route('superadmin.masterdata.entryblc') }}" 
        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Tambah Area
        </a>
    </div>
</div>

{{-- lokasi BLC --}}

<section id="lokasi" class="py-16 bg-white">
    <h1 class="text-3xl font-bold text-center text-orange-500 mb-4">Lokasi <br> Broadband Learning Center</h1>
    <div class="container mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
        <img src="/images/map.png" alt="Tentang BLC" class="mx-auto">

        <div class="flex flex-col space-y-4">
            @foreach ($blcArea as $region => $blcList)
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" 
                            class="w-full text-white text-center font-bold bg-orange-400 p-4 rounded-full shadow hover:bg-orange-600 focus:outline-none">
                        {{ $region }}
                    </button>
                    <ul x-show="open" @click.away="open = false" x-transition 
                        class="absolute z-50 mt-2 w-full bg-white border rounded-lg shadow-lg py-2">
                        @foreach ($blcList as $blc)
                            <li>
                                <a href="{{ $blc->url }}" class="block px-4 py-2 hover:bg-orange-100">
                                    {{ $blc->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</section>

</div>

@endsection
