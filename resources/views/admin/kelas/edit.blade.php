@extends('layouts.admin')

@section('page-title', 'Edit Kelas')

@section('content')
<div class="container mx-auto px-2 py-2">
    <div class="bg-white rounded-lg shadow-md p-6 max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Kelas</h1>
        
        <form action="{{ route('admin.kelas.update', $kelas->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Kolom Kiri -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kelas*</label>
                        <input type="text" name="nama_kelas" value="{{ old('nama_kelas', $kelas->nama_kelas) }}" required maxlength="100"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Hari*</label>
                        <select name="hari[]" multiple required 
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 h-[120px]">
                            @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $day)
                                <option value="{{ $day }}" {{ in_array($day, old('hari', $kelas->hari)) ? 'selected' : '' }}>
                                    {{ $day }}
                                </option>
                            @endforeach
                        </select>
                        <p class="mt-1 text-sm text-gray-500">Gunakan Ctrl untuk memilih multiple hari</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sesi*</label>
                        <select name="sesi" required 
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            @foreach(['Sesi 1' => 'Sesi 1 (09:00-11:00)', 
                                     'Sesi 2' => 'Sesi 2 (13:00-15:00)', 
                                     'Sesi 3' => 'Sesi 3 (15:00-17:00)',
                                     'Sesi 4' => 'Sesi 4 (15:00-17:00)',
                                     'Sesi 5' => 'Sesi 5 (15:00-17:00)'] as $value => $label)
                                <option value="{{ $value }}" {{ old('sesi', $kelas->sesi) == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <!-- Kolom Kanan -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai*</label>
                        <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $kelas->tanggal_mulai->format('Y-m-d')) }}" required 
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jam Mulai*</label>
                        <input type="time" name="jam_mulai" value="{{ old('jam_mulai', $kelas->jam_mulai) }}" required 
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jam Selesai*</label>
                        <input type="time" name="jam_selesai" value="{{ old('jam_selesai', $kelas->jam_selesai) }}" required 
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Materi*</label>
                        <select name="materi" required 
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            @foreach(['Fun Programming', 'Desain Grafis', 'Aplikasi Perkantoran', 'Digital Marketing', 'Data Science'] as $mat)
                                <option value="{{ $mat }}" {{ old('materi', $kelas->materi) == $mat ? 'selected' : '' }}>
                                    {{ $mat }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 flex justify-end">
                <a href="{{ route('admin.kelas.index') }}" 
                   class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 mr-3">
                    Batal
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Update Kelas
                </button>
            </div>
        </form>
    </div>
</div>
@endsection