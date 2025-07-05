@extends('layouts.superadmin')

@section('content')
<div class="container mx-auto py-10 max-w-2xl">
    <h1 class="text-3xl font-bold mb-6 text-orange-500">Tambah Artikel Baru</h1>

    {{-- Flash message success --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    {{-- Menampilkan error validasi --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <strong>Ups! Ada kesalahan.</strong>
            <ul class="list-disc pl-6 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('superadmin.masterdata.artikel.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label for="title" class="block font-medium mb-1">Judul</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="w-full border rounded px-4 py-2 @error('title') border-red-500 @enderror" required>
        </div>

        <div>
            <label for="content" class="block font-medium mb-1">Konten</label>
            <textarea name="content" id="content" rows="6"
                class="w-full border rounded px-4 py-2 @error('content') border-red-500 @enderror" required>{{ old('content') }}</textarea>
        </div>

        <div>
            <label for="thumbnail" class="block font-medium mb-1">Thumbnail</label>
            <input type="file" name="thumbnail" id="thumbnail"
                class="block @error('thumbnail') border-red-500 @enderror" required>
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('superadmin.masterdata.artikel.index') }}" class="text-gray-600 hover:underline">Kembali</a>
            <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded hover:bg-orange-600">Simpan</button>
        </div>
    </form>
</div>
@endsection
