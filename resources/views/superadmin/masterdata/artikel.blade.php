@extends('layouts.superadmin')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">Kelola Artikel</h1>

    <a href="{{ route('superadmin.masterdata.entryartikel') }}" class="bg-orange-500 text-white px-4 py-2 rounded mb-6 inline-block">+ Tambah Artikel</a>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($articles as $artikel)
            <div class="bg-white rounded shadow p-4">
                @if($artikel->thumbnail)
                    <img src="{{ asset('storage/' . $artikel->thumbnail) }}" class="h-40 w-full object-cover rounded mb-4">
                @else
                    <div class="h-40 bg-gray-200 flex items-center justify-center rounded mb-4 text-gray-500">Tidak ada gambar</div>
                @endif
                <h2 class="text-xl font-semibold mb-2">{{ $artikel->title }}</h2>
                <p class="text-sm text-gray-600">{{ Str::limit(strip_tags($artikel->content), 100) }}</p>
                <div class="mt-4 flex gap-4 items-center">
                    <a href="{{ route('superadmin.masterdata.editartikel', $artikel->id) }}" class="text-blue-600 hover:underline">Edit</a>

                    <form action="{{ route('superadmin.masterdata.artikel.destroy', $artikel->id) }}" method="POST" onsubmit="return confirm('Yakin hapus artikel ini?')" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $articles->links() }}
    </div>
</div>
@endsection
