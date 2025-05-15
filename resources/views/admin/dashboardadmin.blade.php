@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Selamat Datang!</h1>
        <p class="text-gray-600 mt-2">Jadwal pelatihan dan acara BLC Surabaya</p>
    </div>

    <!-- Calendar Controls -->
    <div class="flex justify-between items-center mb-6 bg-white p-4 rounded-lg shadow-md">
        <div class="flex space-x-2">
            <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                <i class="fas fa-plus mr-2"></i>Tambah Acara
            </button>
            <button class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50 transition">
                <i class="fas fa-filter mr-2"></i>Filter
            </button>
        </div>
        <div class="flex items-center space-x-4">
            <span class="text-lg font-medium">Mei 2025</span>
            <div class="flex space-x-2">
                <button class="p-2 rounded-full hover:bg-gray-100">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="p-2 rounded-full hover:bg-gray-100">
                    <i class="fas fa-chevron-right"></i>
                </button>
                <button class="px-3 py-1 border rounded-md text-sm hover:bg-gray-50">
                    Hari Ini
                </button>
            </div>
        </div>
        <div>
            <select class="border rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option>Mingguan</option>
                <option>Bulanan</option>
                <option selected>Agenda</option>
            </select>
        </div>
    </div>

    <!-- Google Calendar Embed -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="h-[700px]">
            <iframe 
                src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=Asia%2FJakarta&showTitle=0&showNav=1&showDate=1&showPrint=0&showTabs=1&showCalendars=0&showTz=0"
                style="border-width:0; width:100%; height:100%" 
                frameborder="0" 
                scrolling="no">
            </iframe>
        </div>
    </div>

    {{-- <!-- Upcoming Events List -->
    <div class="mt-8 bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4">Acara Mendatang</h2>
        <div class="space-y-4">
            @foreach($upcomingEvents as $event)
            <div class="flex items-start border-b pb-4 last:border-b-0">
                <div class="bg-blue-100 p-3 rounded-full mr-4">
                    <i class="fas fa-calendar-day text-blue-500"></i>
                </div>
                <div class="flex-1">
                    <div class="flex justify-between items-start">
                        <h3 class="font-medium text-lg">{{ $event['title'] }}</h3>
                        <span class="text-sm bg-blue-100 text-blue-800 px-2 py-1 rounded-full">
                            {{ $event['date']->format('H:i') }}
                        </span>
                    </div>
                    <p class="text-gray-600 mt-1">{{ $event['description'] }}</p>
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        {{ $event['location'] }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div> --}}
</div>
@endsection