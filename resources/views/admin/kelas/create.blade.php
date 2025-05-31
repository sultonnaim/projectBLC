@extends('layouts.admin')

@section('page-title', 'Buat Kelas Baru')

@section('content')
<div class="container mx-auto px-2 py-2">
    <div class="bg-white rounded-lg shadow-md p-6 max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Buat Kelas Baru</h1>
        
        <form action="{{ route('admin.kelas.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Kolom Kiri -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kelas*</label>
                        <input type="text" name="nama_kelas" required maxlength="100"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Hari*</label>
                        <select name="hari[]" multiple required 
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 h-[120px]">
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                        <p class="mt-1 text-sm text-gray-500">Gunakan Ctrl untuk memilih multiple hari</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sesi*</label>
                        <select name="sesi" required 
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="Sesi 1">Sesi 1 (09:00-11:00)</option>
                            <option value="Sesi 2">Sesi 2 (13:00-15:00)</option>
                            <option value="Sesi 3">Sesi 3 (15:00-17:00)</option>
                            <option value="Sesi 4">Sesi 4 (15:00-17:00)</option>
                            <option value="Sesi 5">Sesi 5 (15:00-17:00)</option>
                        </select>
                    </div>
                </div>
                
                <!-- Kolom Kanan -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai*</label>
                        <input type="date" name="tanggal_mulai" required 
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jam Mulai*</label>
                        <input type="time" name="jam_mulai" required 
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jam Selesai*</label>
                        <input type="time" name="jam_selesai" required 
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Materi*</label>
                        <select name="materi" required 
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="Fun Programming">Fun Programming</option>
                            <option value="Desain Grafis">Desain Grafis</option>
                            <option value="Aplikasi Perkantoran">Aplikasi Perkantoran</option>
                            <option value="Digital Marketing">Digital Marketing</option>
                            <option value="Data Science">Data Science</option>
                        </select>
                    </div>


                </div>
            </div>

            <!-- Peserta -->
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Peserta</label>
                <select name="pesertas[]" multiple 
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 h-[120px]">
                    @foreach($pesertas as $peserta)
                    <option value="{{ $peserta->id }}">{{ $peserta->nama }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mt-8 flex justify-end">
                <a href="{{ route('admin.kelas.index') }}" 
                   class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 mr-3">
                    Batal
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Simpan Kelas
                </button>
            </div>
        </form>
    </div>
</div>
@endsection