<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Artikel - BLC Surabaya' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    {{-- Header --}}
    <header class="sticky top-0 z-50 bg-white shadow-md py-6">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <img src="/images/logo.png" alt="Logo BLC" class="h-10 w-auto">
                <h1 class="text-xl font-bold text-orange-400">Broadband Learning Center</h1>
            </div>
            <nav>
                <ul class="flex gap-8">
                    <li><a href="/" class="hover:text-orange-400">Beranda</a></li>
                    <li><a href="/informasi" class="hover:text-orange-400">Informasi</a></li>
                    <li><a href="/lokasi" class="hover:text-orange-400">Lokasi</a></li>
                    <li><a href="/artikel" class="text-orange-500 font-semibold underline">Artikel</a></li>
                    <li><a href="/buku" class="px-4 py-2 bg-orange-400 text-white rounded-xl hover:bg-orange-700 transition">Buku Tamu</a></li>
                </ul>
            </nav>
        </div>
    </header>

    {{-- Artikel Section --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-orange-500 text-center mb-10">Artikel Terbaru</h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($articles as $article)
                    <div class="bg-gray-50 rounded-xl shadow hover:shadow-lg p-6 transition">
                        <img src="{{ asset($article->thumbnail ?? '/images/default-thumbnail.jpg') }}" alt="{{ $article->title }}" class="w-full h-40 object-cover rounded-md mb-4">
                        <h3 class="text-xl font-semibold text-orange-500 mb-2">{{ $article->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($article->content), 100) }}</p>
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
