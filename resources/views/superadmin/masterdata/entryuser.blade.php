@extends('layouts.superadmin')

@section('page-title', 'Tambah User')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-xl font-bold mb-4 text-gray-800">Form Tambah User</h1>
    
    <form action="{{ route('superadmin.users.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div>
            <label class="block font-medium">Nama</label>
            <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div>
            <label class="block font-medium">Email</label>
            <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div>
            <label class="block font-medium">Password</label>
            <input type="password" name="password" class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div>
            <label class="block font-medium">Role</label>
            <select name="role" class="w-full px-4 py-2 border rounded-lg">
                <option value="admin">Admin</option>
                <option value="superadmin">Superadmin</option>
            </select>
        </div>
        <div class="text-right">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Simpan</button>
        </div>
    </form>
</div>
@endsection
