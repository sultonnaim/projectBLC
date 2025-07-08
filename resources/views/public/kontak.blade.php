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
                    <li><a href="/kontak" class="px-2 py-2 hover:text-orange-400">Kontak</a></li>
                    <li><a href="/buku" class="px-4 py-1 rounded-xl font-semibold text-white bg-orange-400 hover:bg-orange-700 transition inline-flex items-center justify-center h-full shadow-md"> Buku Tamu</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-white py-12">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-8 flex-wrap">
        <div class="md:w-1 w-full">
            <h2 class="text-4xl font-bold text-orange-500 mb-2">Kontak</h2>
            <p class="text-gray-600 mb-6">Lebih dekat dengan kami, kamu bisa berikan kritik ataupun saran kepada kami. Jika ada hal yang ingin didiskusikan, silahkan hubungi kami.</p>
            <img src="/images/phone.png" alt="Phone" class="w-8 md:w-20">
        </div>
        <div class="md:w-1/2 w-full">
            <img src="/images/telponRumah.jpg" alt="Ilustrasi Kritik Saran" class="w-full max-w-sm mx-auto">
        </div>
    </div>
</section>


    <!-- Kritik dan Saran Form + Info -->
    <section class="bg-gray-50 py-12">
        <div class="container mx-auto px-4 flex flex-col lg:flex-row gap-8 flex-wrap">
            <!-- Form -->
            <div class="flex-1 min-w-0 bg-white p-8 rounded-xl shadow-md">
                <h3 class="text-xl font-semibold text-orange-500 mb-4">Kritik dan Saran</h3>
                <form method="POST" action="#">
                    @csrf
                    <div class="mb-4">
                        <label for="kategori" class="block mb-1 font-medium">Kategori Pengunjung</label>
                        <select id="kategori" name="kategori" class="w-full border border-gray-300 rounded px-4 py-2">
                            <option value="">-- Pilih --</option>
                            <option value="pelajar">Pelajar</option>
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="umum">Umum</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <input type="text" name="pekerjaan" placeholder="Pekerjaan/Jenjang Pendidikan Terakhir Anda" class="w-full border border-gray-300 rounded px-4 py-2">
                    </div>
                    <div class="mb-4">
                        <textarea name="pesan" rows="5" placeholder="Pesan Kritik dan Saran Anda" class="w-full border border-gray-300 rounded px-4 py-2"></textarea>
                    </div>
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded shadow transition">
                        Kirim
                    </button>
                </form>
            </div>

            <!-- Info Kontak -->
            <div class="flex-1 min-w-0 bg-white p-8 rounded-xl shadow-md">
                <h3 class="text-xl font-semibold text-orange-500 mb-4">Informasi Kontak</h3>
                <div class="space-y-4 text-sm text-gray-700">
                    <div class="flex items-start gap-3">
                        <span class="text-orange-500 mt-1"><i class="fas fa-map-marker-alt"></i></span>
                        <p>
                            <strong>Alamat:</strong><br>
                            Dinas Komunikasi dan Informatika Kota Surabaya<br>
                            Jl. Jimerto No.25-27 Lantai 5, Ketabang, Kec. Genteng, Surabaya, Jawa Timur 60272
                        </p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-orange-500"><i class="fas fa-envelope"></i></span>
                        <p><strong>Email:</strong> layanan@surabaya.go.id</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-orange-500"><i class="fas fa-phone-alt"></i></span>
                        <p><strong>Telepon:</strong> 0877 3812 4698</p>
                    </div>
                    <div class="pt-4">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.850747021895!2d112.74516277476039!3d-7.257821892748901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f9650a8a8883%3A0xb7bdb9b29f06f4bf!2sDinas%20Komunikasi%20dan%20Informatika%20Surabaya!5e0!3m2!1sen!2sid!4v1751651605556!5m2!1sen!2sid"
                            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            class="rounded-md w-full">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-orange-400 mt-8 py-6">
        <div class="container mx-auto text-center text-sm text-white">
            © {{ date('Y') }} BLC Surabaya. All rights reserved.
        </div>
    </footer>

    <!-- Font Awesome CDN (optional) -->
    <script src="https://kit.fontawesome.com/a2e0f1e6ed.js" crossorigin="anonymous"></script>
</body>
</html>
