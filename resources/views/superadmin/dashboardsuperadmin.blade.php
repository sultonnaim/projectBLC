@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
<div class="container mx-auto px-2 py-2">
    <!-- Header dengan Tombol Tambah Acara -->
    <div class="flex justify-between items-center mb-6">
        <!-- Greeting -->
        <div x-data="{ greeting: '' }" x-init="
            const hour = new Date().getHours();
            if (hour >= 5 && hour < 11) greeting = 'Pagi';
            else if (hour >= 11 && hour < 15) greeting = 'Siang';
            else if (hour >= 15 && hour < 19) greeting = 'Sore';
            else greeting = 'Malam';
        ">
            <h1 class="text-3xl font-bold text-gray-800">
                Selamat <span x-text="greeting"></span>!
            </h1>
            <p class="text-orange-600 mt-2">Selamat Datang di Monitoring Broadband Learning Center Surabaya</p>
        </div>

        <!-- Tombol Tambah Acara -->
        <a href="{{ route('admin.dashboardadmin') }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition flex items-center">
            <i class="fas fa-plus mr-2"></i>Tambah Acara
        </a>
    </div>

    <!-- Calendar Controls -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <!-- Kontrol kalender  -->
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
</div>
@endsection