@extends('layouts.superadmin')

@section('page-title', 'Dashboard')

@section('content')
<div class="container mx-auto px-2 py-2">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
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
            <p class="text-orange-600 mt-2">
                Selamat Datang di Monitoring Broadband Learning Center Surabaya Super Admin
            </p>
        </div>

        <a href="{{ route('superadmin.dashboardsuperadmin') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition flex items-center">
            <i class="fas fa-plus mr-2"></i>Tambah Acara
        </a>
    </div>

    <!-- Laporan -->
    <div class="bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-xl font-bold text-orange-500 mb-4">Laporan Pengunjung Berdasarkan Kategori</h2>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('superadmin.dashboardsuperadmin') }}" class="flex gap-4 flex-wrap mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700">Filter Tanggal (Per Hari)</label>
                <input type="date" name="tanggal" value="{{ request('tanggal', $filterTanggal) }}"
                       class="border border-gray-300 rounded px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Filter Bulan (Per Bulan)</label>
                <input type="month" name="bulan" value="{{ request('bulan', $filterBulan) }}"
                       class="border border-gray-300 rounded px-3 py-2">
            </div>
            <div class="flex items-end">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Terapkan
                </button>
            </div>
        </form>

        <!-- Charts -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-lg font-semibold mb-2">
                    Laporan per Hari ({{ $filterTanggal }})
                </h3>
                <canvas id="chartHarian" class="h-64 w-full"></canvas>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-2">
                    Laporan per Bulan ({{ \Carbon\Carbon::parse($filterBulan)->translatedFormat('F Y') }})
                </h3>
                <canvas id="chartBulanan" class="h-64 w-full"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Ambil data dari backend
    const perHari = {!! json_encode($perHari) !!};
    const perBulan = {!! json_encode($perBulan) !!};

    console.log("📅 Tanggal dipilih:", "{{ $filterTanggal }}");
    console.log("📊 Data perHari:", perHari);

    // Harian Chart
    const dataHari = {
        labels: perHari.map(item => item.kategori),
        datasets: [{
            label: 'Total Pengunjung',
            data: perHari.map(item => item.total),
            backgroundColor: 'rgba(255, 99, 132, 0.6)',
            borderRadius: 6
        }]
    };

    // Bulanan Chart
    const dataBulan = {
        labels: perBulan.map(item => item.kategori),
        datasets: [{
            label: 'Total Pengunjung',
            data: perBulan.map(item => item.total),
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderRadius: 6
        }]
    };

    // Tampilkan chart
    new Chart(document.getElementById('chartHarian'), {
        type: 'bar',
        data: dataHari,
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                title: { display: true, text: 'Laporan Harian' }
            }
        }
    });

    new Chart(document.getElementById('chartBulanan'), {
        type: 'bar',
        data: dataBulan,
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                title: { display: true, text: 'Laporan Bulanan' }
            }
        }
    });
</script>
@endpush
