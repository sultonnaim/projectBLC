<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maklumat Pelayanan</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-white m-0 p-0">
    <!-- Hero Section -->
    <div class="w-full h-64 bg-cover bg-center relative" style="background-image: url('{{ asset('images/bg-maklumat.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <h1 class="text-white text-3xl md:text-4xl font-bold text-center">Maklumat Pelayanan BLC Surabaya</h1>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container mx-auto px-4 py-10 flex flex-col md:flex-row gap-6">
        <!-- Main Content -->
        <div class="md:w-3/4">
            <img src="{{ asset('images/maklumat-pelayanan.png') }}" alt="Maklumat Pelayanan" class="w-full rounded shadow">
        </div>

        <!-- Sidebar -->
        <aside class="md:w-1/4">
            <div class="bg-white rounded shadow p-4 sticky top-24">
                <h2 class="text-lg font-semibold mb-4 text-gray-800">Informasi</h2>
                <ul class="space-y-2">
                    <li><a href="{{ route('informasi.tentang') }}" class="text-blue-600 hover:underline">Tentang</a></li>
                    <li><a href="{{ route('informasi.pendaftaran') }}" class="text-blue-600 hover:underline">Pendaftaran</a></li>
                    <li><a href="{{ route('informasi.maklumat') }}" class="text-blue-600 font-bold">Maklumat</a></li>
                    <li><a href="{{ route('informasi.faq') }}" class="text-blue-600 hover:underline">FAQ</a></li>
                </ul>
            </div>
        </aside>
    </div>
</body>
</html>

