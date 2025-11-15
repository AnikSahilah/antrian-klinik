@php
use Carbon\Carbon;

$layout = auth()->user()->role === 'admin' ? 'admin.template.admin' : 'superadmin.template';
$today = Carbon::today()->toDateString();
@endphp

@extends($layout)

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow rounded">
    <h1 class="text-lg font-semibold mb-4 text-gray-700">Tambah Antrian Pasien</h1>

    {{-- Info sesi otomatis --}}
    @if (!request('sesi'))
    <div class="mb-4 text-sm text-gray-500 italic">
        Sesi ditentukan otomatis berdasarkan jam saat ini: <strong>{{ ucfirst($sesi) }}</strong>
    </div>
    @endif

    {{-- Notifikasi error --}}
    @if (session('error'))
    <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded text-sm">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('antrian.store') }}" method="POST" class="space-y-3">
        @csrf

        {{-- Input Hidden --}}
        <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">
        <input type="hidden" name="sesi" value="{{ $sesi }}">

        {{-- Nama Pasien --}}
        <div>
            <label for="nama" class="block mb-1 text-gray-600 text-sm">Nama Pasien</label>
            <input type="text" id="nama" name="nama"
                class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-[#1e3a8a]"
                value="{{ old('nama') }}" required>
            @error('nama')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Keluhan --}}
        <div>
            <label for="keluhan" class="block mb-1 text-gray-600 text-sm">Keluhan</label>
            <textarea id="keluhan" name="keluhan" rows="4"
                class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-[#1e3a8a]"
                required>{{ old('keluhan') }}</textarea>
            @error('keluhan')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end gap-4 mt-4">
            <a href="{{ route('antrian.index') }}"
                class="flex items-center gap-1 text-gray-500 hover:text-[#1e3a8a] transition" title="Batal">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <span class="text-sm">Batal</span>
            </a>

            <button type="submit" title="Simpan"
                class="flex items-center gap-2 text-[#1e3a8a] hover:text-[#163570] transition font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                <span class="text-sm">Simpan</span>
            </button>
        </div>
    </form>
</div>
@endsection