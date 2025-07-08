<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'BLC Surabaya' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white shadow-md py-6">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <img src="/images/logo.png" alt="Logo Blc" class="h-10 w-auto">
                <h1 class="text-xl font-bold text-orange-400 mx-3 mb-1">Broadband Learning Center</h1>
            </div>
            <nav>
                <ul class="flex justify-center gap-10">
                    <li><a href="/" class="px-2 py-2 hover:text-orange-400">Beranda</a></li>
                    <li class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="hover:text-orange-600 focus:outline-none">Informasi</button>
                        <ul x-show="open" @click.away="open = false" x-transition class="absolute z-50 mt-2 w-48 bg-white border rounded-lg shadow-lg py-2">
                            <li><a href="/informasi/tentang" class="block px-4 py-2 hover:bg-orange-100">Tentang</a></li>
                            <li><a href="/informasi/maklumat" class="block px-4 py-2 hover:bg-orange-100">Maklumat & Standar</a></li>
                            <li><a href="/informasi/pendaftaran" class="block px-4 py-2 hover:bg-orange-100">Pendaftaran</a></li>
                            <li><a href="/informasi/pembelajaran" class="block px-4 py-2 hover:bg-orange-100">Pembelajaran</a></li>
                            <li><a href="/informasi/faq" class="block px-4 py-2 hover:bg-orange-100">FAQ</a></li>
                        </ul>
                    </li>
                    <li><a href="/lokasi" class="px-2 py-2 hover:text-orange-400">Lokasi</a></li>
                    <li><a href="/artikel" class="px-2 py-2 hover:text-orange-400">Artikel</a></li>
                    <li><a href="/kontak" class="px-2 py-2 hover:text-orange-400">Kontak</a></li>
                    <li><a href="/buku" class="px-4 py-1 rounded-xl font-semibold text-white bg-orange-400 hover:bg-orange-700 transition inline-flex items-center justify-center h-full shadow-md">Buku Tamu</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        <div class="container mx-auto px-4 py-6">
            <h1 class="text-3xl font-bold text-center text-orange-500 mb-4">Lokasi <br> Broadband Learning Center</h1>

            <p class="text-center text-gray-600 mb-6">
                Letak BLC sudah mencakup berbagai wilayah di Kota Surabaya. Telusuri BLC mana yang ingin kamu kunjungi.
            </p>

            <!-- Filter dan Pencarian -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                <!-- Tabs -->
                <div class="flex space-x-4 mb-4 md:mb-0">
                    @php
                        $tabs = ['Semua', 'Pusat', 'Utara', 'Timur', 'Selatan', 'Barat'];
                        $activeRegion = request('region');
                    @endphp
                    @foreach ($tabs as $tab)
                        <a 
                            href="{{ route('lokasi.index', ['region' => $tab !== 'Semua' ? strtolower($tab) : null, 'q' => request('q')]) }}"
                            class="px-4 py-2 font-semibold border-b-2 
                                {{ $activeRegion == strtolower($tab) || ($tab == 'Semua' && !$activeRegion) ? 'border-green-500 text-green-600' : 'border-transparent text-gray-600' }}">
                            {{ $tab }}
                        </a>
                    @endforeach
                </div>

                <!-- Search -->
                <form method="GET" action="{{ route('lokasi.index') }}" class="flex items-center space-x-2">
                    @if($activeRegion)
                        <input type="hidden" name="region" value="{{ $activeRegion }}">
                    @endif
                    <label for="search" class="text-gray-600 font-medium">Pencarian:</label>
                    <input type="text" id="search" name="q" placeholder="Kecamatan/kelurahan anda" value="{{ request('q') }}"
                        class="border rounded px-3 py-2 text-sm w-64 focus:outline-none focus:ring-2 focus:ring-orange-400">
                </form>
            </div>

            <!-- Galeri Lokasi -->
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
                @forelse ($blcs as $blc)
                    <div class="border-2 border-orange-300 rounded-lg overflow-hidden shadow hover:shadow-md transition">
                        @if ($blc->foto)
                            <img src="{{ asset('storage/' . $blc->foto) }}" 
                                 alt="{{ $blc->area }}" 
                                 class="w-full h-40 object-cover">
                        @else
                            <div class="bg-orange-100 h-40 flex items-center justify-center text-center px-4">
                                <span class="text-gray-500 italic">Tidak ada foto</span>
                            </div>
                        @endif
                    
                        <div class="p-4">
                            <h2 class="font-bold text-lg text-gray-800 mb-1">{{ $blc->area }}</h2>
                            <p class="text-sm text-gray-600 mb-2">Wilayah: <strong>{{ ucfirst($blc->wilayah) }}</strong></p>
                            @if ($blc->link_maps)
                                <a href="{{ $blc->link_maps }}" target="_blank" class="text-orange-500 hover:underline text-sm">
                                    Lihat di Google Maps
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-center col-span-3 text-gray-500">Data lokasi tidak ditemukan.</p>
                @endforelse
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-orange-400 py-6">
        <div class="container mx-auto text-center text-sm text-gray-100">
            © {{ date('Y') }} BLC Surabaya. All rights reserved.
        </div>
    </footer>

</body>
</html>
