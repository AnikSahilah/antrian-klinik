@php
$layout = auth()->user()->role === 'admin' ? 'admin.template.admin' : 'superadmin.template';
@endphp

@extends($layout)

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow rounded">

    <h1 class="text-lg font-semibold mb-4 text-gray-700">
        {{ isset($antrian) ? 'Edit Antrian Pasien' : 'Tambah Antrian Pasien' }}
    </h1>

    <form method="POST" action="{{ isset($antrian) ? route('antrian.update', $antrian->id) : route('antrian.store') }}" class="space-y-3">
        @csrf
        @if(isset($antrian)) @method('PUT') @endif

        <div>
            <label for="nomor_antrian" class="block mb-1 text-gray-600 text-sm">Nomor Antrian</label>
            <input type="text" name="nomor_antrian" id="nomor_antrian"
                class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-[#1e3a8a]"
                value="{{ old('nomor_antrian', $antrian->nomor_antrian ?? '') }}" required>
            @error('nomor_antrian')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="nama" class="block mb-1 text-gray-600 text-sm">Nama Pasien</label>
            <input type="text" name="nama" id="nama"
                class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-[#1e3a8a]"
                value="{{ old('nama', $antrian->nama ?? '') }}" required>
            @error('nama')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="keluhan" class="block mb-1 text-gray-600 text-sm">Keluhan</label>
            <textarea id="keluhan" name="keluhan" rows="4"
                class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-[#1e3a8a]"
                required>{{ old('keluhan', $antrian->keluhan ?? '') }}</textarea>
            @error('keluhan')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="hari_periksa" class="block mb-1 text-gray-600 text-sm">Hari Periksa</label>
            <select id="hari_periksa" name="hari_periksa"
                class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-[#1e3a8a]"
                required>
                <option value="" disabled {{ old('hari_periksa', $antrian->hari_periksa ?? '') ? '' : 'selected' }}>-- Pilih Hari --</option>
                @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                <option value="{{ $hari }}" {{ old('hari_periksa', $antrian->hari_periksa ?? '') == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                @endforeach
            </select>
            @error('hari_periksa')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="waktu_periksa" class="block mb-1 text-gray-600 text-sm">Waktu Periksa</label>
            <select id="waktu_periksa" name="waktu_periksa"
                class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-[#1e3a8a]"
                required>
                <option value="" disabled {{ old('waktu_periksa', $antrian->waktu_periksa ?? '') ? '' : 'selected' }}>-- Pilih Waktu --</option>
                <option value="pagi" {{ old('waktu_periksa', $antrian->waktu_periksa ?? '') == 'pagi' ? 'selected' : '' }}>Pagi</option>
                <option value="sore" {{ old('waktu_periksa', $antrian->waktu_periksa ?? '') == 'sore' ? 'selected' : '' }}>Sore</option>
            </select>
            @error('waktu_periksa')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end gap-4 mt-4">
            <a href="{{ route('antrian.index') }}"
                class="flex items-center gap-1 text-gray-500 hover:text-[#1e3a8a] transition" title="Batal" aria-label="Batal">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <span class="text-sm">Batal</span>
            </a>

            <button type="submit" title="Simpan" aria-label="Simpan"
                class="flex items-center gap-2 text-[#1e3a8a] hover:text-[#163570] transition font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                <span class="text-sm">{{ isset($antrian) ? 'Update' : 'Simpan' }}</span>
            </button>
        </div>
    </form>
</div>
@endsection