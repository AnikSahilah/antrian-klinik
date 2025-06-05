@php
$layout = auth()->user()->role === 'admin' ? 'admin.template.admin' : 'superadmin.template';
$isEdit = isset($user);
@endphp

@extends($layout)

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow rounded">

    <h1 class="text-lg font-semibold mb-4 text-gray-700">
        {{ $isEdit ? 'Edit User' : 'Tambah User' }}
    </h1>

    <form action="{{ $isEdit ? route('user.update', $user) : route('user.store') }}" method="POST" class="space-y-3">
        @csrf
        @if($isEdit)
        @method('PUT')
        @endif

        <!-- Nama -->
        <div>
            <label for="name" class="block mb-1 text-gray-600 text-sm">Nama</label>
            <input type="text" id="name" name="name"
                class="w-full border rounded px-3 py-1.5 text-sm border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#1e3a8a]"
                value="{{ old('name', $user->name ?? '') }}" required>
            @error('name')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block mb-1 text-gray-600 text-sm">Email</label>
            <input type="email" id="email" name="email"
                class="w-full border rounded px-3 py-1.5 text-sm border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#1e3a8a]"
                value="{{ old('email', $user->email ?? '') }}" required>
            @error('email')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block mb-1 text-gray-600 text-sm">Password {{ $isEdit ? '(opsional)' : '' }}</label>
            <input type="password" id="password" name="password"
                class="w-full border rounded px-3 py-1.5 text-sm border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#1e3a8a]">
            @error('password')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Konfirmasi Password -->
        <div>
            <label for="password_confirmation" class="block mb-1 text-gray-600 text-sm">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="w-full border rounded px-3 py-1.5 text-sm border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#1e3a8a]">
        </div>

        <!-- Tombol -->
        <div class="flex justify-end gap-4 mt-4">
            <a href="{{ route('user.index') }}"
                class="text-sm text-gray-500 hover:text-[#1e3a8a] flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Batal
            </a>

            <button type="submit"
                class="text-sm font-medium flex items-center gap-2 text-[#1e3a8a] hover:text-[#163570] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection