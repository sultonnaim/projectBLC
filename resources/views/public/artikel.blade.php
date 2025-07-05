<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel - BLC Surabaya</title>
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
                    <li><a href="/kontak" class="px-2 py-2 hover:text-orange-400">Kontak</a></li>
                    <li><a href="/buku" class="px-4 py-1 rounded-xl font-semibold text-white bg-orange-400 hover:bg-orange-700 transition inline-flex items-center justify-center h-full shadow-md"> Buku Tamu</a></li>
                </ul>
            </nav>
        </div>
    </header>

    {{-- Artikel Section --}}
    <section class="py-16 bg-grey">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-orange-500 text-center mb-10">Artikel Terbaru</h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($articles as $article)
                    <div class="bg-gray-50 rounded-xl shadow hover:shadow-lg p-6 transition">
                        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-40 object-cover rounded-md mb-4">
                        <h3 class="text-xl font-semibold text-orange-500 mb-2">{{ $article->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ \Illuminate\Support\Str::limit(strip_tags($article->content), 100) }}</p>
                        <a href="{{ route('artikel.show', $article->id) }}" class="text-orange-500 hover:underline font-semibold">Baca Selengkapnya →</a>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-10 flex justify-center">
                {{ $articles->links() }}
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-orange-400 mt-8 py-6">
        <div class="container mx-auto text-center text-sm text-white">
            © {{ date('Y') }} BLC Surabaya. All rights reserved.
        </div>
    </footer>

</body>
</html>
