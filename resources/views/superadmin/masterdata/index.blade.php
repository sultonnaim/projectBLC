@extends('layouts.superadmin')

@section('page-title', 'Manajemen User')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manajemen User</h1>
            <p class="text-orange-600">Kelola akun pengguna BLC</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('superadmin.masterdata.entryuser') }}" 
            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-plus mr-2"></i> Tambah User
            </a>
        </div>
    </div>

    <!-- Form Tambah User -->
    <div x-data="{ showForm: false }">
        <div x-show="showForm" class="bg-white rounded-lg shadow-md p-6 mb-8 border border-orange-200">
            <form action="{{ route('superadmin.users.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium">Nama</label>
                        <input type="text" name="name" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400">
                    </div>
                    <div>
                        <label class="block font-medium">Email</label>
                        <input type="email" name="email" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400">
                    </div>
                    <div>
                        <label class="block font-medium">Password</label>
                        <input type="password" name="password" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400">
                    </div>
                    <div>
                        <label class="block font-medium">Role</label>
                        <select name="role"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            <option value="superadmin">Superadmin</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end pt-4">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel User -->
<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase">#</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase">Nama</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase">Email</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase">Role</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase">Dibuat</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $index => $user)
                <tr>
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $index + 1 }}</td>
                    <td class="px-4 py-3 text-sm text-gray-800">{{ $user->name }}</td>
                    <td class="px-4 py-3 text-sm text-gray-800">{{ $user->email }}</td>
                    <td class="px-4 py-3 text-sm">
                        <span class="px-2 py-1 rounded-full bg-orange-100 text-orange-600 text-xs">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-600">
                        {{ $user->created_at->format('d/m/Y') }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <div class="flex gap-2">
                            <a href="{{ route('superadmin.masterdata.edituser', $user->id) }}" 
                               class="text-blue-600 hover:underline text-sm">Edit</a>

                            <form action="{{ route('superadmin.users.destroy', $user->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</div>
@endsection
