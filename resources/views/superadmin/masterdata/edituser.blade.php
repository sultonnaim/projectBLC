@extends('layouts.superadmin')

@section('page-title', 'Edit User')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-xl font-bold mb-4 text-gray-800">Form Edit User</h1>

    <form action="{{ route('superadmin.users.update', $user->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div>
            <label class="block font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                class="w-full px-4 py-2 border rounded-lg">
        </div>

        <div>
            <label class="block font-medium">Role</label>
            <select name="role" class="w-full px-4 py-2 border rounded-lg">
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="superadmin" {{ $user->role === 'superadmin' ? 'selected' : '' }}>Superadmin</option>
            </select>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update</button>
        </div>
        
    </form>
</div>
@endsection
