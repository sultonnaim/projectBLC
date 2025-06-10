<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'BLC Surabaya' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <header class="sticky top-0 z-50 bg-white shadow-md py-6">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <img src="/images/logo.png" alt="Logo Blc" class="h-10 w-auto">
            <h1 class="text-xl font-bold text-orange-400 mx-3 mb-1">Broadband Learning Center </h1>
        </div>
            <nav>
                <ul class="flex justify-center gap-10">
                    <li>
            <a href="/" class="px-2 py-2 hover:text-orange-400 {{ request()->is('/') ? 'font-bold text-orange-500' : '' }}">
                Beranda
            </a>
        </li>
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

    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-orange-50 to-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-orange-500 mb-2">Selamat Datang di BLC Surabaya</h2>
            <p class="text-lg text-gray-600 mb-6">Tempat belajar dan berkembang untuk warga Surabaya di bidang digital dan teknologi informasi.</p>
<!-- Galeri Gambar -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">
    <div>
        <img src="{{ asset('/images/Hero 1.png') }}" alt="Patung Suroboyo"
             class="w-full h-auto transform hover:scale-105 transition duration-300 ease-in-out origin-center">
    </div>
    <div>
        <img src="{{ asset('/images/Hero 2.png') }}" alt="Pemerintah Kota Surabaya"
             class="w-full h-auto transform hover:scale-105 transition duration-300 ease-in-out origin-center">
    </div>
    <div>
        <img src="{{ asset('/images/Hero 3.png') }}" alt="Bangunan Surabaya"
             class="w-full h-auto transform hover:scale-105 transition duration-300 ease-in-out origin-center">
    </div>
</div>


</div>


        </div>
    </section>

    {{-- Tentang BLC --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 grid md:grid-cols-2 gap-10 items-center" data-aos="fade-up">
            <img src="/images/hero 1.png" alt="Tentang BLC" class="w-2/3 md:w-2/3 mx-auto">
            <div>
                <h3 class="text-3xl font-bold text-orange-500 mb-4">Broadband Learning Center</h3>
                <p class="text-gray-600 text-lg leading-relaxed">Broadband Learning Center (BLC) Surabaya adalah fasilitas pelatihan komputer gratis untuk masyarakat umum. Dikelola oleh Diskominfo Surabaya, BLC hadir untuk meningkatkan literasi digital warga melalui kelas dan pendampingan.</p>
                <a href="/informasi/tentang" class="mt-4 inline-block text-orange-400 hover:underline">Baca Selengkapnya →</a>
            </div>
        </div>
    </section>

        {{-- Fitur / Keunggulan --}}
        <section class="bg-gray-50 py-16">
            <div class="container mx-auto px-4 text-center">
                <h3 class="text-3xl font-bold text-orange-500 mb-10">Alasan Ikut Pelatihan di BLC</h3>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition" data-aos="fade-up">
                        <h4 class="text-xl font-semibold text-orange-400 mb-2">Gratis & Terbuka</h4>
                        <p class="text-gray-600">Seluruh program pelatihan bisa diikuti siapa saja secara gratis tanpa biaya apapun.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition" data-aos="fade-up">
                        <h4 class="text-xl font-semibold text-orange-400 mb-2">Materi Praktis</h4>
                        <p class="text-gray-600">Diajarkan oleh instruktur berpengalaman dengan kurikulum yang aplikatif dan mudah dipahami.</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition" data-aos="fade-up">
                        <h4 class="text-xl font-semibold text-orange-400 mb-2">Fasilitas Lengkap</h4>
                        <p class="text-gray-600">Dilengkapi komputer, ruang kelas nyaman, akses internet, dan konsultasi teknologi digital.</p>
                    </div>
                </div>
            </div>
        </section>

            {{-- lokasi BLC --}}
{{-- lokasi BLC --}}
<section class="py-16 bg-white">
    <h1 class="text-3xl font-bold text-center text-orange-500 mb-4">Lokasi <br> Broadband Learning Center</h1>
    <div class="container mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
        <img src="/images/map.png" alt="Tentang BLC" class="mx-auto">
        <div class="flex flex-col space-y-4">
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="w-full text-white text-center font-bold bg-orange-400 p-4 rounded-full shadow hover:bg-orange-600 focus:outline-none">
                    Surabaya Pusat
                </button>
                <ul x-show="open" @click.away="open = false" x-transition class="absolute z-50 mt-2 w-full bg-white border rounded-lg shadow-lg py-2">
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 1</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 2</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 3</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 4</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 5</a></li>
                </ul>
            </div>
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="w-full text-white text-center font-bold bg-orange-400 p-4 rounded-full shadow hover:bg-orange-600 focus:outline-none">
                    Surabaya Timur
                </button>
                <ul x-show="open" @click.away="open = false" x-transition class="absolute z-50 mt-2 w-full bg-white border rounded-lg shadow-lg py-2">
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 1</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 2</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 3</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 4</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 5</a></li>
                </ul>
            </div>
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="w-full text-white text-center font-bold bg-orange-400 p-4 rounded-full shadow hover:bg-orange-600 focus:outline-none">
                    Surabaya Selatan
                </button>
                <ul x-show="open" @click.away="open = false" x-transition class="absolute z-50 mt-2 w-full bg-white border rounded-lg shadow-lg py-2">
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 1</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 2</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 3</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 4</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 5</a></li>
                </ul>
            </div>
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="w-full text-white text-center font-bold bg-orange-400 p-4 rounded-full shadow hover:bg-orange-600 focus:outline-none">
                    Surabaya Barat
                </button>
                <ul x-show="open" @click.away="open = false" x-transition class="absolute z-50 mt-2 w-full bg-white border rounded-lg shadow-lg py-2">
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 1</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 2</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 3</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 4</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 5</a></li>
                </ul>
            </div>
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="w-full text-white text-center font-bold bg-orange-400 p-4 rounded-full shadow hover:bg-orange-600 focus:outline-nonee">
                    Surabaya Utara
                </button>
                <ul x-show="open" @click.away="open = false" x-transition class="absolute z-50 mt-2 w-full bg-white border rounded-lg shadow-lg py-2">
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 1</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 2</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 3</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 4</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-orange-100">Titik Lokasi 5</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
{{-- <!-- bagian artikel -->
 <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-10 text-orange-600">Artikel Terbaru</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($articles as $article)
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-xl font-semibold text-orange-500">{{ $article->title }}</h3>
                    <p class="text-gray-600">{{ Str::limit($article->content, 100) }}</p>
                    <a href="#" class="text-blue-500 hover:underline">Baca Selengkapnya</a>
                </div>
            @endforeach
        </div>
    </div>
</section>  --}}

<!-- bagian slide testimoni -->    
<section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-10 text-orange-600">Testomonial Dari Peserta <br>BLC Surabaya</h2>
            
            <!-- Slider Container -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide bg-white rounded-xl shadow p-4 text-center">
                        <img src="/images/hero 2.png" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover" alt="Guru 1">
                        <h4 class="text-xl font-semibold text-gray-800">Pak Andi</h4>
                        <p class="text-sm text-gray-600">Instruktur Office</p>
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide bg-white rounded-xl shadow p-4 text-center">
                        <img src="/images/hero 1.png" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover" alt="Guru 2">
                        <h4 class="text-xl font-semibold text-gray-800">Bu Sari</h4>
                        <p class="text-sm text-gray-600">Instruktur Desain</p>
                    </div>
                    <div class="swiper-slide bg-white rounded-xl shadow p-4 text-center">
                        <img src="/images/hero 2.png" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover" alt="Guru 1">
                        <h4 class="text-xl font-semibold text-gray-800">Pak Andi</h4>
                        <p class="text-sm text-gray-600">Instruktur Office</p>
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide bg-white rounded-xl shadow p-4 text-center">
                        <img src="/images/hero 1.png" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover" alt="Guru 2">
                        <h4 class="text-xl font-semibold text-gray-800">Bu Sari</h4>
                        <p class="text-sm text-gray-600">Instruktur Desain</p>
                    </div>
                </div>
                <!-- Navigasi -->
                <div class="swiper-pagination mt-10"></div>
            </div>
        </div>
    </section>

    <main class="mt-10">
        @yield('content')
    </main>

    <footer class="bg-orange-400 mt-8 py-6">
        <div class="container mx-auto text-center text-sm text-gray-100">
            © {{ date('Y') }} BLC Surabaya. All rights reserved.
        </div>
    </footer>
</body>
</html>
