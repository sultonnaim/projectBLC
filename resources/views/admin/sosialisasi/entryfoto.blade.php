@extends('layouts.admin')

@section('page-title', 'Tambah Foto sosialisasi')
@section('content')
<div class="container mx-auto px-2 py-2">
    <div class="bg-white rounded-lg shadow-md p-6 max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Foto Kegiatan Sosialisasi</h1>
        
<form action="{{ route('admin.sosialisasi.simpanfoto') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Isi form Anda di sini -->
    <div class="space-y-6">
        <label for="tanggal" class="block font-medium">Tanggal Kegiatan</label>
        <input type="date" name="tanggal" id="tanggal" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
    </div>
    @error('tanggal')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror

    <div class="mb-4">
        <label for="sesi" class="block font-medium">Sesi</label>
        <select name="sesi" id="sesi" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            <option value="1 (08.00-12.00)">Sesi 1 (08.00-12.00)</option>
            <option value="2 (12.00-16.00)">Sesi 2 (12.00-16.00)</option>
            <option value="3 (16.00-20.00)">Sesi 3 (16.00-20.00)</option>
            <option value="4 (16.00-20.00)">Sesi 4 (16.00-20.00)</option>
            <option value="5 (16.00-20.00)">Sesi 5 (16.00-20.00)</option>
        </select>

            @error('sesi')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror

    </div>
    
    <div class="mb-4">
        <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
        <textarea name="keterangan" id="keterangan" rows="3" class="w-full border rounded p-2"></textarea>
    </div>
    @error('keterangan')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror

                <!-- Upload Foto -->
                <div>
                    <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">Upload Foto*</label>
                    <div class="mt-1 flex items-center">
                        <input type="file" name="foto" id="foto" required
                            class="block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-lg file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-50 file:text-blue-700
                                    hover:file:bg-blue-100"
                            accept="image/*">
                    </div>
                    <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG (Maks. 2MB)</p>
                    @error('foto')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    
                    <!-- Preview Foto -->
                    <div id="preview-container" class="mt-3 hidden">
                        <img id="preview-image" class="max-w-xs rounded-lg border">
                    </div>
                </div>
                            <!-- Tombol Simpan -->
            <div class="mt-8 flex justify-end">
                <a href="{{ route('admin.sosialisasi.entryfoto') }}" 
                class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 mr-3">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <i class="fas fa-save mr-2"></i> Simpan Foto
                </button>
            </div>
        </form>
    </div>
</div>
            </div>


</form>
    </div>
</div>

<script>
    // Preview image sebelum upload
    document.getElementById('foto').addEventListener('change', function(e) {
        const previewContainer = document.getElementById('preview-container');
        const previewImage = document.getElementById('preview-image');
        
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden');
            }
            
            reader.readAsDataURL(this.files[0]);
        } else {
            previewContainer.classList.add('hidden');
        }
    });
</script>
@endsection