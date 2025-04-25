<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelajaran</title>
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
            <h1 class="text-white text-3xl md:text-4xl font-bold text-center">Pembelajaran <br> Broadband Learning Center Surabaya</h1>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container mx-auto px-4 py-6 flex flex-col md:flex-row gap-6">

        <!-- Konten Utama -->
        <main class="md:w-3/4 space-y-6">
            <!-- Materi dalam 1 baris scroll -->
            <div class="space-y-4">
                <!-- Materi 1 -->
                <div class="bg-white rounded-lg shadow p-4 flex items-start gap-4">
                    <img src="/images/icons/aplikasi.png" alt="Aplikasi Perkantoran" class="w-12 h-12">
                    <div>
                        <h3 class="text-lg font-semibold">Aplikasi Perkantoran</h3>
                        <p class="text-sm text-gray-700">Penulisan karya ilmiah, surat resmi, perhitungan keuangan, membuat presentasi.</p>
                    </div>
                </div>
    
                <!-- Materi 2 -->
                <div class="bg-white rounded-lg shadow p-4 flex items-start gap-4">
                    <img src="/images/icons/education.png" alt="Internet for Education" class="w-12 h-12">
                    <div>
                        <h3 class="text-lg font-semibold">Internet For Education</h3>
                        <p class="text-sm text-gray-700">Search Engine, Google Drive, Jurnal Online.</p>
                    </div>
                </div>
    
                <!-- Materi 3 -->
                <div class="bg-white rounded-lg shadow p-4 flex items-start gap-4">
                    <img src="/images/icons/business.png" alt="Internet for Business" class="w-12 h-12">
                    <div>
                        <h3 class="text-lg font-semibold">Internet For Business</h3>
                        <p class="text-sm text-gray-700">Pemasaran di sosial media & marketplace lokal.</p>
                    </div>
                </div>
    
                <!-- Materi 4 -->
                <div class="bg-white rounded-lg shadow p-4 flex items-start gap-4">
                    <img src="/images/icons/desain.png" alt="Desain Grafis" class="w-12 h-12">
                    <div>
                        <h3 class="text-lg font-semibold">Desain Grafis & Video</h3>
                        <p class="text-sm text-gray-700">Desain kemasan, brosur, editing foto dan video.</p>
                    </div>
                </div>
    
                <!-- Materi 5 -->
                <div class="bg-white rounded-lg shadow p-4 flex items-start gap-4">
                    <img src="/images/icons/programming.png" alt="Programming" class="w-12 h-12">
                    <div>
                        <h3 class="text-lg font-semibold">Fun Programming</h3>
                        <p class="text-sm text-gray-700">Pengenalan coding dan algoritma dasar.</p>
                    </div>
                </div>
            </div>
    
    
            <!-- Jadwal Pelatihan -->
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col md:flex-row gap-6">
                <div class="md:w-2/3">
                    <h2 class="text-2xl font-bold text-orange-500 mb-4">JADWAL PELATIHAN</h2>
                    <table class="w-full table-auto text-left border border-orange-200">
                        <thead class="bg-orange-200 text-gray-700">
                            <tr>
                                <th class="px-4 py-2 border">Sesi</th>
                                <th class="px-4 py-2 border">Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td class="px-4 py-2 border">1</td><td class="px-4 py-2 border">07.30 - 09.00 WIB (Senin - Jumat)</td></tr>
                            <tr><td class="px-4 py-2 border">2</td><td class="px-4 py-2 border">09.00 - 10.30 WIB (Senin - Jumat)</td></tr>
                            <tr><td class="px-4 py-2 border">3</td><td class="px-4 py-2 border">10.30 - 12.00 WIB (Senin - Jumat)</td></tr>
                            <tr><td class="px-4 py-2 border">4</td><td class="px-4 py-2 border">13.00 - 14.30 WIB (Senin - Jumat)</td></tr>
                            <tr><td class="px-4 py-2 border">5</td><td class="px-4 py-2 border">14.30 - 16.00 WIB (Senin - Jumat)</td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="md:w-1/3 flex justify-center items-center">
                    <img src="{{ asset('images/clock.png') }}" alt="Jam Pelatihan" class="max-w-[200px]">
                </div>
            </div>
    
        </main>
    
        <!-- Sidebar -->
        <aside class="md:w-1/4">
            <div class="bg-white rounded shadow p-4 sticky top-24">
                <h2 class="text-lg font-semibold mb-4 text-gray-800">Informasi</h2>
                <ul class="space-y-2">
                    <li><a href="{{ route('informasi.tentang') }}" class="text-orange-500 hover:underline">Tentang</a></li>
                    <li><a href="{{ route('informasi.pendaftaran') }}" class="text-orange-500 hover:underline">Pendaftaran</a></li>
                    <li><a href="{{ route('informasi.maklumat') }}" class="text-orange-500 hover:underline">Maklumat & standar</a></li>
                    <li><a href="{{ route('informasi.pembelajaran') }}" class="text-orange-500 font-bold">Pembelajaran</a></li>
                    <li><a href="{{ route('informasi.faq') }}" class="text-orange-500 hover:underline">FAQ</a></li>
                </ul>
            </div>
        </aside>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>

