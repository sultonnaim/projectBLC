@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-gray-600 mt-2">Ringkasan aktivitas dan statistik sistem</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Pelatihan -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-orange-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Pelatihan</p>
                    <h3 class="text-2xl font-bold mt-1">1,248</h3>
                </div>
                <div class="bg-orange-100 p-3 rounded-full">
                    <i class="fas fa-graduation-cap text-orange-500"></i>
                </div>
            </div>
            <div class="mt-4 flex space-x-4">
                <a href="{{ route('admin.dashboardadmin') }}" class="text-sm text-orange-500 hover:text-orange-700">
                    <i class="fas fa-plus mr-1"></i> Entry
                </a>
                <a href="{{ route('admin.dashboardadmin') }}" class="text-sm text-orange-500 hover:text-orange-700">
                    <i class="fas fa-file-alt mr-1"></i> Laporan
                </a>
            </div>
        </div>

        <!-- Total Pengunjung -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Pengunjung</p>
                    <h3 class="text-2xl font-bold mt-1">5</h3>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="fas fa-users text-blue-500"></i>
                </div>
            </div>
            <div class="mt-4 flex space-x-4">
                <a href="{{ route('admin.dashboardadmin') }}" class="text-sm text-blue-500 hover:text-blue-700">
                    <i class="fas fa-list mr-1"></i> Daftar
                </a>
                <a href="{{ route('admin.dashboardadmin') }}" class="text-sm text-blue-500 hover:text-blue-700">
                    <i class="fas fa-chart-bar mr-1"></i> Laporan
                </a>
            </div>
        </div>

        <!-- Card Kosong 1 -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Statistik Lainnya</p>
                    <h3 class="text-2xl font-bold mt-1">-</h3>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-chart-line text-green-500"></i>
                </div>
            </div>
        </div>

        <!-- Card Kosong 2 -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Statistik Lainnya</p>
                    <h3 class="text-2xl font-bold mt-1">-</h3>
                </div>
                <div class="bg-purple-100 p-3 rounded-full">
                    <i class="fas fa-calendar-alt text-purple-500"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold mb-4">Aktivitas Terkini</h2>
        <div class="space-y-4">
            <!-- Contoh Aktivitas -->
            <div class="flex items-start border-b pb-4">
                <div class="bg-orange-100 p-2 rounded-full mr-3">
                    <i class="fas fa-user-plus text-orange-500"></i>
                </div>
                <div class="flex-1">
                    <p class="font-medium">Peserta baru ditambahkan</p>
                    <p class="text-sm text-gray-500">Nama Peserta - 05 Mei 2025</p>
                </div>
                <span class="text-sm text-gray-400">10:30</span>
            </div>
            
            <div class="flex items-start border-b pb-4">
                <div class="bg-blue-100 p-2 rounded-full mr-3">
                    <i class="fas fa-user-check text-blue-500"></i>
                </div>
                <div class="flex-1">
                    <p class="font-medium">Pengunjung baru</p>
                    <p class="text-sm text-gray-500">Nama Pengunjung - 05 Mei 2025</p>
                </div>
                <span class="text-sm text-gray-400">09:15</span>
            </div>
        </div>
    </div>
</div>
@endsection