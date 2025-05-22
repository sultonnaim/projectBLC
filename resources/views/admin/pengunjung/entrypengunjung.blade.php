@extends('layouts.admin')

@section('title', 'Tambah Pengunjung')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-xl shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Data Pengunjung</h1>
        
        <form action="{{ route('admin.pengunjung.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Kolom Kiri -->
                <div class="space-y-4">
                    <!-- Tanggal Kunjungan -->
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Kunjungan</label>
                        <input type="date" name="tanggal" id="tanggal" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                            value="{{ old('tanggal', date('Y-m-d')) }}">
                        @error('tanggal')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Sesi -->
                    <div>
                        <label for="sesi" class="block text-sm font-medium text-gray-700 mb-1">Sesi Kunjungan</label>
                        <select name="sesi" id="sesi" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="">Pilih Sesi</option>
                            <option value="1" {{ old('sesi') == '1' ? 'selected' : '' }}>1 (08.00 - 12.00)</option>
                            <option value="2" {{ old('sesi') == '2' ? 'selected' : '' }}>2 (12.00 - 16.00)</option>
                            <option value="3" {{ old('sesi') == '3' ? 'selected' : '' }}>3 (16.00 - 20.00)</option>
                            <option value="4" {{ old('sesi') == '4' ? 'selected' : '' }}>4 (16.00 - 20.00)</option>
                            <option value="5" {{ old('sesi') == '5' ? 'selected' : '' }}>5 (16.00 - 20.00)</option>
                        </select>
                        @error('sesi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Nama Lengkap -->
                    <div>
                        <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                            value="{{ old('nama_lengkap') }}"
                            placeholder="Masukkan nama lengkap">
                        @error('nama_lengkap')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Jenis Kelamin -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                        <div class="flex space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="jenis_kelamin" value="L" 
                                    {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }} required
                                    class="text-blue-500 focus:ring-blue-500">
                                <span class="ml-2">Laki-laki</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="jenis_kelamin" value="P"
                                    {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}
                                    class="text-blue-500 focus:ring-blue-500">
                                <span class="ml-2">Perempuan</span>
                            </label>
                        </div>
                        @error('jenis_kelamin')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Kolom Kanan -->
                <div class="space-y-4">
                    <!-- Tanggal Lahir -->
                    <div>
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                            value="{{ old('tanggal_lahir') }}"
                            max="{{ date('Y-m-d') }}">
                        @error('tanggal_lahir')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Kategori -->
                    <div>
                        <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                        <select name="kategori" id="kategori" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="">Pilih Kategori</option>
                            <option value="SD" {{ old('kategori') == 'SD' ? 'selected' : '' }}>SD</option>
                            <option value="SMP" {{ old('kategori') == 'SMP' ? 'selected' : '' }}>SMP</option>
                            <option value="SMA" {{ old('kategori') == 'SMA' ? 'selected' : '' }}>SMA</option>
                            <option value="Umum" {{ old('kategori') == 'Umum' ? 'selected' : '' }}>Umum</option>
                        </select>
                        @error('kategori')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Alamat -->
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Tombol Aksi -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.pengunjung.index') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded-lg">
                    Batal
                </a>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg flex items-center">
                    <i class="fas fa-save mr-2"></i> Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection