@extends('layouts.admin')
@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Form Pendaftaran Peserta</h2>

    <form action="{{ route('admin.peserta.index') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="nama_lengkap" class="block font-semibold">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Jenis Kelamin</label>
            <label><input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki</label>
            <label class="ml-4"><input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan</label>
        </div>

        <div class="mb-4">
            <label for="tempat_lahir" class="block font-semibold">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="tanggal_lahir" class="block font-semibold">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="no_hp" class="block font-semibold">No. HP</label>
            <input type="text" name="no_hp" id="no_hp" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block font-semibold">Email</label>
            <input type="email" name="email" id="email" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="alamat" class="block font-semibold">Alamat</label>
            <textarea name="alamat" id="alamat" class="w-full border rounded px-3 py-2" rows="3" required></textarea>
        </div>

        <div class="mb-4">
            <label for="pendidikan" class="block font-semibold">Pendidikan</label>
            <input type="text" name="pendidikan" id="pendidikan" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="pekerjaan" class="block font-semibold">Pekerjaan</label>
            <input type="text" name="pekerjaan" id="pekerjaan" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="status" class="block font-semibold">Status</label>
            <select name="status" id="status" class="w-full border rounded px-3 py-2">
                <option value="Aktif" selected>Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
