<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title ?? 'BLC Surabaya' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .artikel-content img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
            margin: 1rem 0;
        }
    </style>
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
                    <li><a href="#lokasi" class="px-2 py-2 hover:text-orange-400">Lokasi</a></li>
                    <li><a href="/artikel" class="px-2 py-2 hover:text-orange-400">Artikel</a></li>
                    <li><a href="/buku" class="px-4 py-1 rounded-xl font-semibold text-white bg-orange-400 hover:bg-orange-700 transition inline-flex items-center justify-center h-full shadow-md"> Buku Tamu</a></li>
                </ul>
            </nav>
        </div>
    </header>

    {{-- Halaman Detail Artikel --}}
    <main>
        <div class="container mx-auto px-4 py-16 max-w-4xl">

            {{-- Judul --}}
            <h1 class="text-4xl font-bold text-orange-500 mb-6 text-center">
                {{ $article->title }}
            </h1>

            {{-- Thumbnail --}}
            <img 
                src="{{ asset('storage/' . $article->thumbnail) }}" 
                alt="{{ $article->title }}" 
                class="w-full max-h-[300px] md:max-h-[400px] lg:max-h-[500px] object-contain bg-white rounded-md mx-auto mb-8"
            >

            {{-- Konten Artikel --}}
            <div class="artikel-content text-gray-800 leading-relaxed space-y-4">
                {!! $article->content !!}
            </div>

            {{-- Tombol Kembali --}}
            <div class="mt-8 text-center">
                <a href="{{ route('artikel.index') }}" class="inline-block text-orange-500 hover:underline text-base">
                    ← Kembali ke Daftar Artikel
                </a>
            </div>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="bg-orange-400 mt-8 py-6">
        <div class="container mx-auto text-center text-sm text-white">
            © {{ date('Y') }} BLC Surabaya. All rights reserved.
        </div>
    </footer>

</body>
</html>
