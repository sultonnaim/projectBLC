<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded shadow-lg">
        {{-- Logo --}}
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16">
        </div>

        <h2 class="text-2xl font-bold text-center text-orange-500 mb-8">Form Buku Tamu</h2>

        <form action="{{ route('bukutamu.store') }}" method="POST" class="max-w-xl mx-auto mt-8 bg-white p-6 rounded shadow">
            @csrf
        
            {{-- Nama --}}
            <div class="mb-4">
                <label for="nama" class="block text-gray-700">Nama<span class="text-red-500">*</span></label>
                <input type="text" name="nama" id="nama" class="w-full border-gray-300 rounded mt-1" required>
            </div>
        
            {{-- Sesi --}}
            <div class="mb-4">
                <label for="sesi" class="block text-gray-700">Sesi<span class="text-red-500">*</span></label>
                <select name="sesi" id="sesi" class="w-full border-gray-300 rounded mt-1" required>
                    <option value="">-- Pilih Sesi --</option>
                    <option value="Sesi 1 (08.00 - 10.00)">Sesi 1 (08.00 - 10.00)</option>
                    <option value="Sesi 2 (10.00 - 12.00)">Sesi 2 (10.00 - 12.00)</option>
                    <option value="Sesi 3 (13.00 - 14.00)">Sesi 3 (13.00 - 14.00)</option>
                    <option value="Sesi 4 (14.00 - 15.00)">Sesi 4 (14.00 - 15.00)</option>
                    <option value="Sesi 5 (15.00 - 16.00)">Sesi 5 (15.00 - 16.00)</option>
                </select>
            </div>
        
            {{-- NIK (tidak wajib) --}}
            <div class="mb-4">
                <label for="nik" class="block text-gray-700">NIK</label>
                <input type="text" name="nik" id="nik" class="w-full border-gray-300 rounded mt-1">
            </div>
        
            {{-- No Telp (tidak wajib) --}}
            <div class="mb-4">
                <label for="no_telp" class="block text-gray-700">No. Telepon</label>
                <input type="text" name="no_telp" id="no_telp" class="w-full border-gray-300 rounded mt-1">
            </div>
        
            {{-- Tanggal Lahir --}}
            <div class="mb-4">
                <label for="tgl_lahir" class="block text-gray-700">Tanggal Lahir<span class="text-red-500">*</span></label>
                <input type="date" name="tgl_lahir" id="tgl_lahir" class="w-full border-gray-300 rounded mt-1" required>
            </div>
        
            {{-- Alamat Domisili --}}
            <div class="mb-4">
                <label for="alamat" class="block text-gray-700">Alamat Domisili<span class="text-red-500">*</span></label>
                <input type="text" name="alamat" id="alamat" class="w-full border-gray-300 rounded mt-1" required>
            </div>
        
            {{-- Kelurahan --}}
            <div class="mb-4">
                <label for="kelurahan" class="block text-gray-700">Kelurahan<span class="text-red-500">*</span></label>
                <input type="text" name="kelurahan" id="kelurahan" class="w-full border-gray-300 rounded mt-1" required>
            </div>
        
            {{-- Kecamatan --}}
            <div class="mb-4">
                <label for="kecamatan" class="block text-gray-700">Kecamatan<span class="text-red-500">*</span></label>
                <input type="text" name="kecamatan" id="kecamatan" class="w-full border-gray-300 rounded mt-1" required>
            </div>
        
            {{-- Jenis Kelamin --}}
            <div class="mb-4">
                <label for="jenis_kelamin" class="block text-gray-700">Jenis Kelamin<span class="text-red-500">*</span></label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="w-full border-gray-300 rounded mt-1" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        
            {{-- Email (tidak wajib) --}}
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full border-gray-300 rounded mt-1">
            </div>
        
            {{-- Pekerjaan --}}
            <div class="mb-4">
                <label for="pekerjaan" class="block text-gray-700">Pekerjaan<span class="text-red-500">*</span></label>
                <input type="text" name="pekerjaan" id="pekerjaan" class="w-full border-gray-300 rounded mt-1" required>
            </div>
        
            {{-- Keperluan --}}
            <div class="mb-6">
                <label for="keperluan" class="block text-gray-700">Keperluan<span class="text-red-500">*</span></label>
                <textarea name="keperluan" id="keperluan" rows="3" class="w-full border-gray-300 rounded mt-1" required></textarea>
            </div>
        
            {{-- Tombol Kirim --}}
            <div class="flex justify-end">
                <button type="submit" class="bg-orange-400 hover:bg-orange-500 text-white px-4 py-2 rounded">
                    Kirim
                </button>
            </div>
        </form>
        
    </div>

</body>
</html>
