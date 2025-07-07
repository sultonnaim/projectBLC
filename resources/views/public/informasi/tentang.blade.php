<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'BLC Surabaya' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 flex flex-col min-h-screen">

    {{-- HEADER --}}
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
                        <ul x-show="open" @click.away="open = false" x-transition class="absolute z-50 mt-2 w-48 bg-white border rounded-lg shadow-lg py-2">
                            <li><a href="/informasi/tentang" class="block px-4 py-2 hover:bg-orange-100">Tentang</a></li>
                            <li><a href="/informasi/maklumat" class="block px-4 py-2 hover:bg-orange-100">Maklumat & Standar</a></li>
                            <li><a href="/informasi/pendaftaran" class="block px-4 py-2 hover:bg-orange-100">Pendaftaran</a></li>
                            <li><a href="/informasi/pembelajaran" class="block px-4 py-2 hover:bg-orange-100">Pembelajaran</a></li>
                            <li><a href="/informasi/faq" class="block px-4 py-2 hover:bg-orange-100">FAQ</a></li>
                        </ul>
                    </li>
                    <li><a href="#lokasi" class="px-2 py-2 hover:text-orange-400">Lokasi</a></li>
                    <li><a href="/artikel" class="px-2 py-2 hover:text-orange-400">Artikel</a></li>
                    <li><a href="/kontak" class="px-2 py-2 hover:text-orange-400">Kontak</a></li>
                    <li>
                        <a href="/buku" class="px-4 py-1 rounded-xl font-semibold text-white bg-orange-400 hover:bg-orange-700 transition inline-flex items-center justify-center h-full shadow-md">
                            Buku Tamu
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    {{-- MAIN CONTENT --}}
    <main class="flex-grow">
        <div class="container mx-auto px-6 py-12 flex flex-col md:flex-row gap-10">

            {{-- Konten Utama --}}
            <div class="md:w-3/4 space-y-12">

                {{-- Visi & Misi --}}
                <div class="flex flex-col md:flex-row items-start gap-6">
                    {{-- Gambar --}}
                    <div class="md:w-1/4 flex flex-col items-center gap-4">
                        <img src="/images/visimisi.png" alt="Visi Misi" class="w-full max-w-xs object-contain">
                    </div>

                    {{-- Teks --}}
                    <div class="space-y-6 mb-10">
                        {{-- Visi --}}
                        <div>
                            <h3 class="text-xl font-bold mb-2">Visi</h3>
                            <p>Meningkatkan kemampuan masyarakat dalam pemanfaatan Teknologi Informasi.</p>
                        </div>

                        {{-- Misi --}}
                        <div>
                            <h3 class="text-xl font-bold mb-2">Misi</h3>
                            <ul class="list-disc pl-6 space-y-2">
                                <li>Menyediakan sarana dan prasarana pembelajaran Teknologi Informasi secara mandiri di Surabaya</li>
                                <li>Meningkatkan literasi digital dan produktivitas masyarakat</li>
                                <li>Memberikan pelatihan teknologi secara gratis kepada masyarakat</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Tujuan BLC --}}
                <div class="space-y-6 mt-10">
                    <h3 class="text-xl font-bold">Broadband Learning Center bertujuan sebagai:</h3>

                    <div class="flex flex-col md:flex-row gap-6 items-start">
                        {{-- Deskripsi Tujuan --}}
                        <div class="space-y-4 md:w-3/5">
                            <ul class="list-disc pl-6 space-y-3">
                                <li>
                                    Upaya untuk mewujudkan Masyarakat Surabaya Melek IT, Pemerintah Kota Surabaya melalui Dinas Komunikasi dan Informatika Kota Surabaya bekerja sama dengan PT Telkom Divre V Jawa Timur memberi sarana dan prasarana pembelajaran telematika sebagai upaya untuk mewujudkan tujuan nasional, khususnya dalam rangka mencerdaskan kehidupan bangsa dan mendorong tumbuhnya berbagai inovasi dalam sistem pendidikan.
                                </li>
                                <li>
                                    Perubahan besar yang terjadi dalam lingkungan global mengharuskan kita untuk mengembangkan sistem pendidikan lebih terbuka, lebih luwes, berkualitas dan dapat diakses oleh siapa saja yang memerlukan tanpa memandang usia, gender, lokasi, kondisi sosial-ekonomi, maupun pengalaman pendidikan sebelumnya.
                                </li>
                            </ul>
                        </div>

                        {{-- Gambar Tujuan --}}
                        <div class="md:w-2/5 flex flex-col items-center gap-4">
                            <img src="/images/tujuan.png" alt="Tujuan BLC" class="w-full max-w-xs object-contain">
                        </div>
                    </div>
                </div>

            </div>

            {{-- Sidebar --}}
            <aside class="md:w-1/4 space-y-2">
                <h4 class="font-bold text-lg">Informasi:</h4>
                <div class="space-y-1">
                    <a href="/informasi/tentang" class="block bg-orange-400 text-white px-4 py-2 rounded">Tentang BLC</a>
                    <a href="/informasi/maklumat" class="block bg-white hover:bg-orange-100 px-4 py-2 border rounded">Maklumat Pelayanan</a>
                    <a href="/informasi/pembelajaran" class="block bg-white hover:bg-orange-100 px-4 py-2 border rounded">Info Pembelajaran</a>
                    <a href="/informasi/pendaftaran" class="block bg-white hover:bg-orange-100 px-4 py-2 border rounded">Cara Mendaftar</a>
                    <a href="/informasi/faq" class="block bg-white hover:bg-orange-100 px-4 py-2 border rounded">FAQ</a>
                </div>
            </aside>

        </div>
    </main>

    {{-- FOOTER --}}
    <footer class="bg-orange-400 mt-auto py-6">
        <div class="container mx-auto text-center text-sm text-gray-100">
            © {{ date('Y') }} BLC Surabaya. All rights reserved.
        </div>
    </footer>

</body>
</html>
