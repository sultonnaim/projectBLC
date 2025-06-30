@extends('layouts.superadmin')

@section('content')
<div class="container mx-auto py-10 max-w-2xl">
    <h1 class="text-3xl font-bold mb-6 text-orange-500">Tambah Artikel Baru</h1>

    <form action="{{ route('superadmin.masterdata.artikel.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label for="title" class="block font-medium mb-1">Judul</label>
            <input type="text" name="title" id="title" class="w-full border rounded px-4 py-2" required>
        </div>

        <div>
            <label for="content" class="block font-medium mb-1">Konten</label>
            <textarea name="content" id="content" rows="6" class="w-full border rounded px-4 py-2" required></textarea>
        </div>

        <div>
            <label for="thumbnail" class="block font-medium mb-1">Thumbnail</label>
            <input type="file" name="thumbnail" id="thumbnail" class="block" required>
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('superadmin.masterdata.artikel') }}" class="text-gray-600 hover:underline">Batal</a>
            <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded hover:bg-orange-600">Simpan</button>
        </div>
    </form>
</div>
@endsection
