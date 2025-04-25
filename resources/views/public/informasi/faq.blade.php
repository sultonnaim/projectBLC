<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
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
            <h1 class="text-white text-3xl md:text-4xl font-bold text-center">FAQ <br> Broadband Learning Center Surabaya</h1>
        </div>
    </div>

    <!-- Konten FAQ -->
    <div class="container mx-auto px-4 py-8">
    <div class="grid md:grid-cols-4 gap-6" x-data="{ tab: 'umum' }">

        <!-- Sidebar Kategori -->
        <aside class="md:col-span-1">
            <div class="bg-white rounded-xl shadow p-4 space-y-2">
                <button @click="tab = 'umum'" :class="tab === 'umum' ? 'bg-orange-500 text-white' : 'text-gray-700 hover:bg-orange-100'" class="w-full text-left px-4 py-2 rounded transition">Pertanyaan Umum</button>
                <button @click="tab = 'pendaftaran'" :class="tab === 'pendaftaran' ? 'bg-orange-500 text-white' : 'text-gray-700 hover:bg-orange-100'" class="w-full text-left px-4 py-2 rounded transition">Pendaftaran</button>
                <button @click="tab = 'kelas'" :class="tab === 'kelas' ? 'bg-orange-500 text-white' : 'text-gray-700 hover:bg-orange-100'" class="w-full text-left px-4 py-2 rounded transition">Kelas & Jadwal</button>
            </div>
        </aside>
        
        <!-- Konten Pertanyaan -->
        <main class="md:col-span-3 space-y-4">

            <!-- Tab: Umum -->
            <div x-show="tab === 'umum'" x-transition>
                <h2 class="text-2xl font-semibold text-orange-600 mb-4">Pertanyaan Umum</h2>

                <div x-data="{ open: null }" class="space-y-2">
                    <div class="border border-gray-200 rounded-xl">
                        <button @click="open === 1 ? open = null : open = 1" class="w-full flex justify-between items-center px-6 py-4 text-left text-gray-800 font-medium">
                            Apa itu BLC Surabaya?
                            <svg :class="{ 'rotate-180': open === 1 }" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg></button>
                        <div x-show="open === 1" x-collapse class="px-6 pb-4 text-gray-600">
                            BLC (Broadband Learning Center) Surabaya adalah pusat pembelajaran digital gratis yang disediakan oleh Diskominfo untuk masyarakat.
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl">
                        <button @click="open === 2 ? open = null : open = 2" class="w-full flex justify-between items-center px-6 py-4 text-left text-gray-800 font-medium">
                            Siapa saja yang boleh ikut pelatihan?
                            <svg :class="{ 'rotate-180': open === 2 }" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open === 2" x-collapse class="px-6 pb-4 text-gray-600">
                            Semua warga boleh ikut, tanpa batas usia atau pendidikan, cukup mendaftar dengan KTP.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab: Pendaftaran -->
            <div x-show="tab === 'pendaftaran'" x-transition>
                <h2 class="text-2xl font-semibold text-orange-600 mb-4">Pendaftaran</h2>
                <div x-data="{ open: null }" class="space-y-2">
                    <div class="border border-gray-200 rounded-xl">
                        <button @click="open === 3 ? open = null : open = 3" class="w-full flex justify-between items-center px-6 py-4 text-left text-gray-800 font-medium">
                            Bagaimana cara mendaftar?
                            <svg :class="{ 'rotate-180': open === 3 }" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open === 3" x-collapse class="px-6 pb-4 text-gray-600">
                            Pendaftaran dilakukan secara offline dengan datang langsung ke BLC atau melalui admin di lokasi.
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tab: Kelas -->
            <div x-show="tab === 'kelas'" x-transition>
                <h2 class="text-2xl font-semibold text-orange-600 mb-4">Kelas & Jadwal</h2>
                <div x-data="{ open: null }" class="space-y-2">
                    <div class="border border-gray-200 rounded-xl">
                        <button @click="open === 4 ? open = null : open = 4" class="w-full flex justify-between items-center px-6 py-4 text-left text-gray-800 font-medium">
                            Apa saja kelas yang tersedia?
                            <svg :class="{ 'rotate-180': open === 4 }" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open === 4" x-collapse class="px-6 pb-4 text-gray-600">
                            Terdapat kelas dasar komputer, Microsoft Office, desain grafis, internet, dan coding dasar.
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Kontak Bantuan -->
<div class="mt-10 rounded-xl p-6 shadow-sm text-center">
    <h3 class="text-xl font-bold text-gray-800 mb-4">Ingin tahu BLC Surabaya lebih lanjut?</h3>
    <p class="text-gray-600 mb-6">Hubungi kami melalui:</p>

    <div class="grid md:grid-cols-3 gap-6 text-sm text-gray-700">
        <!-- FAQ / Pusat Bantuan -->
        <div class="bg-white border rounded-xl p-4 shadow hover:shadow-md transition">
            <div class="flex items-center gap-3 mb-2">
                <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16h6M3 4a1 1 0 011-1h16a1 1 0 011 1v16l-5-4H4a1 1 0 01-1-1V4z" />
                </svg>
                <h4 class="font-semibold">Pusat Bantuan</h4>
            </div>
            <p>021 4040 3999</p>
        </div>

        <!-- WhatsApp -->
        <div class="bg-white border rounded-xl p-4 shadow hover:shadow-md transition">
            <div class="flex items-center gap-3 mb-2">
                <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M20.52 3.48A11.902 11.902 0 0012 0C5.37 0 0 5.37 0 12c0 2.12.55 4.15 1.6 5.97L0 24l6.26-1.64A11.94 11.94 0 0012 24c6.63 0 12-5.37 12-12 0-3.19-1.24-6.2-3.48-8.52zM12 22c-1.95 0-3.83-.54-5.49-1.56l-.39-.24-3.72.98 1-3.63-.25-.38A9.93 9.93 0 012 12c0-5.52 4.48-10 10-10s10 4.48 10 10-4.48 10-10 10zm4.69-7.63l-1.73-.49c-.23-.06-.48 0-.65.17l-.86.86a8.64 8.64 0 01-4.11-4.1l.86-.87c.17-.17.23-.42.17-.65l-.49-1.73a.52.52 0 00-.5-.37c-.27 0-.52.02-.76.05a1.64 1.64 0 00-1.4 1.4c-.36 2.14.49 4.54 2.57 6.62s4.47 2.93 6.62 2.57a1.64 1.64 0 001.4-1.4c.03-.24.05-.49.05-.76 0-.22-.15-.42-.37-.5z" />
                </svg>
                <h4 class="font-semibold">WhatsApp</h4>
            </div>
            <p>0815 1300 3999</p>
        </div>

        <!-- Email -->
        <div class="bg-white border rounded-xl p-4 shadow hover:shadow-md transition">
            <div class="flex items-center gap-3 mb-2">
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-18 8h18a2 2 0 002-2V6a2 2 0 00-2-2H3a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
                <h4 class="font-semibold">Email</h4>
            </div>
            <p>sobat@blcsurabaya.id</p>
        </div>
    </div>
</div>
</div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>

