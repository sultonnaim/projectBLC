@extends('layouts.superadmin')

@section('content')
<div class="container mx-auto py-10 max-w-2xl">
    <h1 class="text-3xl font-bold mb-6 text-orange-500">Edit Artikel</h1>

    <form action="{{ route('superadmin.masterdata.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block font-medium mb-1">Judul</label>
            <input type="text" name="title" id="title" value="{{ old('title', $artikel->title) }}" class="w-full border rounded px-4 py-2" required>
        </div>

        <div>
            <label for="content" class="block font-medium mb-1">Konten</label>
            <textarea name="content" id="content" rows="6" class="w-full border rounded px-4 py-2" required>{{ old('content', $artikel->content) }}</textarea>
        </div>

        <div>
            <label class="block font-medium mb-1">Thumbnail Saat Ini</label>
            @if($artikel->thumbnail)
                <img src="{{ asset('storage/' . $artikel->thumbnail) }}" class="h-40 w-full object-cover rounded mb-3">
            @endif
            <input type="file" name="thumbnail" id="thumbnail" class="block w-full">
        </div>

        <div class="flex justify-end gap-4">
    <a href="{{ route('superadmin.masterdata.artikel.index') }}"
       class="bg-gray-200 text-gray-800 px-6 py-2 rounded hover:bg-gray-300 transition">Batal</a>

    <button type="submit"
            class="bg-orange-500 text-white px-6 py-2 rounded hover:bg-orange-600 transition">Update</button>
</div>
    </form>
</div>
@endsection
