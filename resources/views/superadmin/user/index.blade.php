@php
$layout = auth()->user()->role === 'admin' ? 'admin.template.admin' : 'superadmin.template';
@endphp

@extends($layout)

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-lg font-semibold text-gray-800 border-b pb-2">Daftar User</h1>

        <a href="{{ route('user.create') }}"
            class="flex items-center gap-2 bg-[#1e3a8a] text-white px-4 py-2 rounded hover:bg-[#163570] transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Tambah User
        </a>
    </div>

    @if (session('success'))
    <div class="mb-4 text-sm text-green-700 bg-green-100 px-4 py-3 rounded">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse text-sm text-gray-700">
            <thead>
                <tr class="bg-gray-50">
                    <th class="border-b px-4 py-2 text-left font-medium text-gray-600">#</th>
                    <th class="border-b px-4 py-2 text-left font-medium text-gray-600">Nama</th>
                    <th class="border-b px-4 py-2 text-left font-medium text-gray-600">Email</th>
                    <th class="border-b px-4 py-2 text-left font-medium text-gray-600">Role</th>
                    <th class="border-b px-4 py-2 text-left font-medium text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr class="hover:bg-gray-50">
                    <td class="border-b px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border-b px-4 py-2">{{ $user->name }}</td>
                    <td class="border-b px-4 py-2">{{ $user->email }}</td>
                    <td class="border-b px-4 py-2 capitalize">{{ $user->role }}</td>
                    <td class="border-b px-4 py-2 flex gap-3">
                        <a href="{{ route('user.edit', $user) }}" class="text-green-600 hover:text-green-800" title="Edit">
                            ✏️
                        </a>
                        <form action="{{ route('user.destroy', $user) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus">🗑️</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-6 text-gray-400 italic">Belum ada user.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection