@extends('layouts.admin')

@section('page-title', 'Kelola Peserta Kelas')

@section('content')
<div class="container mx-auto px-4 py-4">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Kelola Peserta: {{ $kelas->nama_kelas }}</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Daftar Peserta Terdaftar -->
            <div>
                <h2 class="text-lg font-semibold mb-3">Peserta Terdaftar</h2>
                <div class="space-y-2">
                    @forelse($kelas->pesertas as $peserta)
                    <div class="flex justify-between items-center p-3 border rounded-lg">
                        <span>{{ $peserta->nama }}</span>
                        <form action="{{ route('admin.kelas.hapus-peserta', [$kelas->id, $peserta->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm">
                                <i class="fas fa-trash-alt mr-1"></i> Hapus
                            </button>
                        </form>
                    </div>
                    @empty
                    <p class="text-gray-500">Belum ada peserta terdaftar</p>
                    @endforelse
                </div>
            </div>
            
            <!-- Tambah Peserta Baru -->
            <div>
                <h2 class="text-lg font-semibold mb-3">Tambah Peserta Baru</h2>
<form action="{{ route('admin.kelas.simpan-peserta', $kelas->id) }}" method="POST">
    @csrf
                    <select name="pesertas[]" multiple 
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 h-[200px]">
                        @foreach($semuaPeserta as $peserta)
                        <option value="{{ $peserta->id }}">{{ $peserta->nama }}</option>
                        @endforeach
                    </select>
                    <div class="mt-4">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Tambah Peserta
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="mt-6">
            <a href="{{ route('admin.kelas.index') }}" 
                class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection