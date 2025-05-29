@extends('layouts.admin')

@section('page-title', 'Update Foto Kegiatan')

@section('content')
<div class="container mx-auto px-2 py-2">
    <div class="bg-white rounded-lg shadow-md p-6 max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Update Foto Kegiatan</h1>

        <form action="{{ route('admin.laporanfoto.update', $foto->id) }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Tanggal --}}
            <div class="mb-4">
                <label for="tanggal" class="block font-medium">Tanggal Kegiatan</label>
                <input type="date" name="tanggal" id="tanggal"
                    value="{{ old('tanggal', $foto->tanggal->format('Y-m-d')) }}"
                    required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                @error('tanggal') <p class="text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            {{-- Sesi --}}
            <div class="mb-4">
                <label for="sesi" class="block font-medium">Sesi</label>
                <select name="sesi" id="sesi" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    @foreach ([
                        '1 (08.00-12.00)',
                        '2 (12.00-16.00)',
                        '3 (16.00-20.00)',
                        '4 (16.00-20.00)',
                        '5 (16.00-20.00)',
                    ] as $opt)
                        <option value="{{ $opt }}" @selected(old('sesi', $foto->sesi) === $opt)>
                            Sesi {{ $opt }}
                        </option>
                    @endforeach
                </select>
                @error('sesi') <p class="text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            {{-- Keterangan --}}
            <div class="mb-4">
                <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="3"
                          class="w-full border rounded p-2">{{ old('keterangan', $foto->keterangan) }}</textarea>
                @error('keterangan') <p class="text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            {{-- Upload Foto Baru --}}
            <div class="mb-6">
                <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">
                    Ganti Foto <span class="text-gray-500">(kosongkan jika tidak diganti)</span>
                </label>
                <input type="file" name="foto" id="foto"
                       class="block w-full text-sm text-gray-500
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-lg file:border-0
                              file:text-sm file:font-semibold
                              file:bg-blue-50 file:text-blue-700
                              hover:file:bg-blue-100"
                       accept="image/*">

                <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG (Maks. 2 MB)</p>
                @error('foto') <p class="text-sm text-red-600">{{ $message }}</p>@enderror

                {{-- Preview lama & baru --}}
                <div class="mt-4">
                    <p class="text-sm text-gray-700 mb-2">Foto saat ini:</p>
                    <img src="{{ asset('storage/'.$foto->foto) }}"
                         alt="Foto lama"
                         class="max-w-xs rounded-lg border mb-4">

                    <div id="preview-container" class="hidden">
                        <p class="text-sm text-gray-700 mb-2">Preview foto baru:</p>
                        <img id="preview-image" class="max-w-xs rounded-lg border">
                    </div>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="mt-8 flex justify-end">
                <a href="{{ route('admin.laporanfoto.index') }}"
                   class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 mr-3">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Preview JS --}}
<script>
    document.getElementById('foto').addEventListener('change', function () {
        const previewContainer = document.getElementById('preview-container');
        const previewImage     = document.getElementById('preview-image');

        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden');
            };
            reader.readAsDataURL(this.files[0]);
        } else {
            previewContainer.classList.add('hidden');
        }
    });
</script>
@endsection
