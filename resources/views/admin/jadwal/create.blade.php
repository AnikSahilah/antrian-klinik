@extends('admin.template.admin')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow rounded">

    <h1 class="text-lg font-semibold mb-4 text-gray-700">
        Tambah Jadwal Antrian
    </h1>

    <form method="POST" action="{{ route('jadwal.store') }}" class="space-y-4">
        @csrf

        <!-- Tanggal -->
        <div>
            <label for="tanggal" class="block mb-1 text-gray-600 text-sm">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal"
                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-[#1e3a8a] @error('tanggal') border-red-500 @enderror"
                value="{{ old('tanggal') }}" required>
            @error('tanggal')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Jam & Status Pagi -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="jam_buka_pagi" class="block mb-1 text-gray-600 text-sm">Jam Buka Pagi</label>
                <input type="time" name="jam_buka_pagi" id="jam_buka_pagi"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm @error('jam_buka_pagi') border-red-500 @enderror"
                    value="{{ old('jam_buka_pagi') }}" required>
                @error('jam_buka_pagi')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="jam_tutup_pagi" class="block mb-1 text-gray-600 text-sm">Jam Tutup Pagi</label>
                <input type="time" name="jam_tutup_pagi" id="jam_tutup_pagi"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm @error('jam_tutup_pagi') border-red-500 @enderror"
                    value="{{ old('jam_tutup_pagi') }}" required>
                @error('jam_tutup_pagi')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="status_pagi" class="block mb-1 text-gray-600 text-sm">Status Pagi</label>
            <select name="status_pagi" id="status_pagi"
                class="w-full border border-gray-300 rounded px-3 py-2 text-sm @error('status_pagi') border-red-500 @enderror"
                required>
                <option value="">-- Pilih Status --</option>
                <option value="buka" {{ old('status_pagi') == 'buka' ? 'selected' : '' }}>Buka</option>
                <option value="tutup" {{ old('status_pagi') == 'tutup' ? 'selected' : '' }}>Tutup</option>
            </select>
            @error('status_pagi')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Jam & Status Sore -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="jam_buka_sore" class="block mb-1 text-gray-600 text-sm">Jam Buka Sore</label>
                <input type="time" name="jam_buka_sore" id="jam_buka_sore"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm @error('jam_buka_sore') border-red-500 @enderror"
                    value="{{ old('jam_buka_sore') }}" required>
                @error('jam_buka_sore')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="jam_tutup_sore" class="block mb-1 text-gray-600 text-sm">Jam Tutup Sore</label>
                <input type="time" name="jam_tutup_sore" id="jam_tutup_sore"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm @error('jam_tutup_sore') border-red-500 @enderror"
                    value="{{ old('jam_tutup_sore') }}" required>
                @error('jam_tutup_sore')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="status_sore" class="block mb-1 text-gray-600 text-sm">Status Sore</label>
            <select name="status_sore" id="status_sore"
                class="w-full border border-gray-300 rounded px-3 py-2 text-sm @error('status_sore') border-red-500 @enderror"
                required>
                <option value="">-- Pilih Status --</option>
                <option value="buka" {{ old('status_sore') == 'buka' ? 'selected' : '' }}>Buka</option>
                <option value="tutup" {{ old('status_sore') == 'tutup' ? 'selected' : '' }}>Tutup</option>
            </select>
            @error('status_sore')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-end gap-4 pt-4">
            <a href="{{ route('jadwal.index') }}"
                class="flex items-center gap-1 text-gray-500 hover:text-[#1e3a8a] transition text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Batal
            </a>

            <button type="submit"
                class="flex items-center gap-2 text-white bg-[#1e3a8a] hover:bg-[#163570] transition px-4 py-2 rounded text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection