@php
$layout = auth()->user()->role === 'admin' ? 'admin.template.admin' : 'superadmin.template';
@endphp

@extends($layout)

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow rounded">

    <h1 class="text-lg font-semibold mb-4 text-gray-700">Tambah Antrian Pasien</h1>

    <form action="{{ route('antrian.store') }}" method="POST" class="space-y-3">
        @csrf

        <div>
            <label for="nomor_antrian" class="block mb-1 text-gray-600 text-sm">Nomor Antrian</label>
            <input type="text" id="nomor_antrian" name="nomor_antrian"
                class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-[#1e3a8a]"
                value="{{ old('nomor_antrian', $nextNomorFormatted) }}" readonly>
            @error('nomor_antrian')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="nama" class="block mb-1 text-gray-600 text-sm">Nama Pasien</label>
            <input type="text" id="nama" name="nama"
                class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-[#1e3a8a]"
                value="{{ old('nama') }}" required>
            @error('nama')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="keluhan" class="block mb-1 text-gray-600 text-sm">Keluhan</label>
            <textarea id="keluhan" name="keluhan" rows="4"
                class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-[#1e3a8a]"
                required>{{ old('keluhan') }}</textarea>
            @error('keluhan')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <select id="hari_periksa" name="hari_periksa"
                class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-[#1e3a8a]"
                required>
                <option value="" disabled {{ old('hari_periksa') ? '' : 'selected' }}>-- Pilih Hari --</option>
                <option value="Senin" {{ old('hari_periksa') == 'Senin' ? 'selected' : '' }}>Senin</option>
                <option value="Selasa" {{ old('hari_periksa') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                <option value="Rabu" {{ old('hari_periksa') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                <option value="Kamis" {{ old('hari_periksa') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                <option value="Jumat" {{ old('hari_periksa') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                <option value="Sabtu" {{ old('hari_periksa') == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                <option value="Minggu" {{ old('hari_periksa') == 'Minggu' ? 'selected' : '' }}>Minggu</option>
            </select>

            <div>
                <label for="waktu_periksa" class="block mb-1 text-gray-600 text-sm">Waktu Periksa</label>
                <select id="waktu_periksa" name="waktu_periksa"
                    class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-[#1e3a8a]"
                    required>
                    <option value="" disabled {{ old('waktu_periksa') ? '' : 'selected' }}>-- Pilih Waktu --</option>
                    <option value="pagi" {{ old('waktu_periksa') == 'pagi' ? 'selected' : '' }}>Pagi</option>
                    <option value="sore" {{ old('waktu_periksa') == 'sore' ? 'selected' : '' }}>Sore</option>
                </select>
                @error('waktu_periksa')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
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
                <span class="text-sm">Simpan</span>
            </button>
        </div>
    </form>
</div>
@endsection