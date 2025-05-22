<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-6xl bg-white rounded-xl shadow-lg overflow-hidden flex flex-col md:flex-row">
        <!-- Bagian Kiri - Form -->
        <div class="w-full md:w-1/2 p-8 md:p-12">
            <div class="flex justify-center mb-6">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16">
            </div>

            <h2 class="text-3xl font-bold text-center text-orange-500 mb-2">Buku Tamu</h2>
            <p class="text-gray-600 text-center mb-8">Silahkan isi data diri Anda dengan lengkap</p>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('bukutamu.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label for="nama_lengkap" class="block text-gray-700 mb-2">Nama Lengkap<span class="text-red-500">*</span></label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" 
                        required>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="sesi" class="block text-gray-700 mb-2">Sesi Kunjungan<span class="text-red-500">*</span></label>
                        <select name="sesi" id="sesi" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" 
                                required>
                            <option value="">Pilih Sesi</option>
                            <option value="1">Sesi 1 (08.00-10.00)</option>
                            <option value="2">Sesi 2 (10.00-12.00)</option>
                            <option value="3">Sesi 3 (13.00-15.00)</option>
                            <option value="4">Sesi 4 (15.00-17.00)</option>
                            <option value="5">Sesi 5 (17.00-19.00)</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="kategori" class="block text-gray-700 mb-2">Kategori<span class="text-red-500">*</span></label>
                        <select name="kategori" id="kategori" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" 
                                required>
                            <option value="">Pilih Kategori</option>
                            <option value="sd">SD</option>
                            <option value="smp">SMP</option>
                            <option value="sma">SMA</option>
                            <option value="umum">Umum</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="jenis_kelamin" class="block text-gray-700 mb-2">Jenis Kelamin<span class="text-red-500">*</span></label>
                        <select name="jenis_kelamin" id="jenis_kelamin" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" 
                                required>
                            <option value="">Pilih Gender</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="tanggal_lahir" class="block text-gray-700 mb-2">Tanggal Lahir<span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" 
                               required>
                    </div>
                </div>

                <div>
                    <label for="alamat" class="block text-gray-700 mb-2">Alamat<span class="text-red-500">*</span></label>
                    <textarea name="alamat" id="alamat" rows="3" 
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" 
                              required></textarea>
                </div>

                <div>
                    <label for="no_telp" class="block text-gray-700 mb-2">No. Telepon</label>
                    <input type="text" name="no_telp" id="no_telp" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="agree" name="agree" 
                           class="w-4 h-4 text-orange-500 border-gray-300 rounded focus:ring-orange-500" required>
                    <label for="agree" class="ml-2 text-sm text-gray-600">Saya menyetujui syarat dan ketentuan</label>
                </div>

                <button type="submit" 
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-medium py-3 px-4 rounded-lg transition duration-300">
                    Kirim
                </button>
            </form>
        </div>

        <!-- Bagian Kanan - Gambar -->
        <div class="hidden md:block md:w-1/2 bg-orange-500 relative">
            <div class="absolute inset-0 bg-gradient-to-b from-orange-400 to-orange-600 opacity-90"></div>
            <img src="{{ asset('images/Hero 1.png') }}" alt="Library Background" 
                class="w-full h-full object-cover">
            <div class="absolute inset-0 flex items-center justify-center p-12 text-white">
                <div class="text-center">
                    <h3 class="text-3xl font-bold mb-4">Selamat Datang</h3>
                    <p class="text-lg mb-6">Broadband Learning Center Surabaya</p>
                    <div class="w-16 h-1 bg-white mx-auto mb-6"></div>
                    <p class="text-sm opacity-80">Kota Surabaya</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>