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
                        <select name="sesi_id" required> 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" 
                            required>
                            <option value="">Pilih Sesi</option>
                            {{-- @foreach($sesis as $sesi)
                                <option value="{{ $sesi->id }}">{{ $sesi->nama }} ({{ $sesi->jam }})</option>
                            @endforeach --}}
                        </select>
                    </div>
                    
                    <div>
                        <label for="kategori" class="block text-gray-700 mb-2">Kategori<span class="text-red-500">*</span></label>
                        <select name="kategori_id" required> 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" 
                            required>
                        <option value="">Pilih Kategori</option>
                        {{-- @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach --}}
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

                <button type="submit" 
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-medium py-3 px-4 rounded-lg transition duration-300">
                    Kirim
                </button>
            </form>
        </div>

        <!-- Bagian Kanan - Gambar -->
        <div class="hidden md:block md:w-1/2 relative">
            <div class="absolute inset-0 "></div>
            <img src="{{ asset('images/buku.png') }}" alt="Library Background" 
                class="w-full h-full object-cover">
        </div>
    </div>

</body>
</html>