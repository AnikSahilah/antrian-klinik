@extends('admin.template.admin')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow rounded">

    <h1 class="text-lg font-semibold mb-4 text-gray-700">
        Edit Jadwal Antrian
    </h1>

    <form method="POST" action="{{ route('jadwal.update', $jadwal->id) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Hari -->
        <div>
            <label for="hari" class="block mb-1 text-gray-600 text-sm">Hari</label>
            <input type="text" name="hari" id="hari"
                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-[#1e3a8a] @error('hari') border-red-500 @enderror"
                value="{{ old('hari', $jadwal->hari) }}" required>
            @error('hari')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Jam Buka Pagi -->
        <div>
            <label for="jam_buka_pagi" class="block mb-1 text-gray-600 text-sm">Jam Buka Pagi</label>
            <input type="time" name="jam_buka_pagi" id="jam_buka_pagi"
                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-[#1e3a8a] @error('jam_buka_pagi') border-red-500 @enderror"
                value="{{ old('jam_buka_pagi', $jadwal->jam_buka_pagi) }}" required>
            @error('jam_buka_pagi')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Jam Buka Sore -->
        <div>
            <label for="jam_buka_sore" class="block mb-1 text-gray-600 text-sm">Jam Buka Sore</label>
            <input type="time" name="jam_buka_sore" id="jam_buka_sore"
                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-[#1e3a8a] @error('jam_buka_sore') border-red-500 @enderror"
                value="{{ old('jam_buka_sore', $jadwal->jam_buka_sore) }}" required>
            @error('jam_buka_sore')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status -->
        <div>
            <label for="status" class="block mb-1 text-gray-600 text-sm">Status</label>
            <select name="status" id="status"
                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-[#1e3a8a] @error('status') border-red-500 @enderror"
                required>
                <option value="buka" {{ old('status', $jadwal->status) == 'buka' ? 'selected' : '' }}>Buka</option>
                <option value="tutup" {{ old('status', $jadwal->status) == 'tutup' ? 'selected' : '' }}>Tutup</option>
            </select>
            @error('status')
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
                Update
            </button>
        </div>
    </form>
</div>
@endsection