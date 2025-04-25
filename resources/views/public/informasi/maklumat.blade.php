<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maklumat Pelayanan</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-white m-0 p-0">
    <header class="sticky top-0 z-50 bg-white shadow-md py-6">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <img src="/images/logo.png" alt="Logo Blc" class="h-10 w-auto">
            <h1 class="text-xl font-bold text-orange-400 mx-3 mb-1">Broadband Learning Center </h1>
        </div>
            <nav>
                <ul class="flex justify-center gap-10">
                    <li><a href="/" class="px-2 py-2 hover:text-orange-400">Beranda</a></li>
                    <li class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="hover:text-orange-600 focus:outline-none">Informasi</button>
                    
                        <!-- Dropdown Menu -->
                        <ul x-show="open" @click.away="open = false" x-transition class="absolute z-50 mt-2 w-48 bg-white border rounded-lg shadow-lg py-2 ">
                            <li><a href="/informasi/tentang" class="block px-4 py-2 hover:bg-orange-100">Tentang</a></li>
                            <li><a href="/informasi/maklumat" class="block px-4 py-2 hover:bg-orange-100">Maklumat & Standar</a></li>
                            <li><a href="/informasi/pendaftaran" class="block px-4 py-2 hover:bg-orange-100">Pendaftaran</a></li>
                            <li><a href="/informasi/pembelajaran" class="block px-4 py-2 hover:bg-orange-100">Pembelajaran</a></li>
                            <li><a href="/informasi/faq" class="block px-4 py-2 hover:bg-orange-100">FAQ</a></li>
                        </ul>
                    </li>
                    <li><a href="/lokasi" class="px-2 py-2 hover:text-orange-400">Lokasi</a></li>
                    <li><a href="/artikel" class="px-2 py-2 hover:text-orange-400">Artikel</a></li>
                    <li><a href="/buku" class="px-4 py-1 rounded-xl font-semibold text-white bg-orange-400 hover:bg-orange-700 transition inline-flex items-center justify-center h-full shadow-md"> Buku Tamu</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- Hero Section -->
    <div class="w-full h-64 bg-cover bg-center relative" style="background-image: url('{{ asset('images/pengunjung1.png') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <h1 class="text-white text-3xl md:text-4xl font-bold text-center">Maklumat Dan Standar <br> Broadband Learning Center Surabaya</h1>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container mx-auto px-4 py-10 flex flex-col md:flex-row gap-6">
        <!-- foto -->
        <div class="md:w-3/4">
            <img src="{{ asset('images/maklumat-pelayanan.png') }}" alt="Maklumat Pelayanan" class="w-full rounded shadow">
        </div>

        <!-- Sidebar -->
        <aside class="md:w-1/4">
            <div class="bg-white rounded shadow p-4 sticky top-24">
                <h2 class="text-lg font-semibold mb-4 text-gray-800">Informasi</h2>
                <ul class="space-y-2">
                    <li><a href="{{ route('informasi.tentang') }}" class="text-orange-500 hover:underline">Tentang</a></li>
                    <li><a href="{{ route('informasi.pendaftaran') }}" class="text-orange-500 hover:underline">Pendaftaran</a></li>
                    <li><a href="{{ route('informasi.maklumat') }}" class="text-orange-500 font-bold">Maklumat & standar </a></li>
                    <li><a href="{{ route('informasi.pembelajaran') }}" class="text-orange-500 hover:underline">Pembelajaran </a></li>
                    <li><a href="{{ route('informasi.faq') }}" class="text-orange-500 hover:underline">FAQ</a></li>
                </ul>
            </div>
        </aside>
    </div>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>

