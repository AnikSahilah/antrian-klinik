@php
$layout = auth()->user()->role === 'admin' ? 'admin.template.admin' : 'superadmin.template';
@endphp

@extends($layout)

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow rounded">

    <h1 class="text-lg font-semibold mb-4 text-gray-700">
        Edit Antrian Pasien
    </h1>

    <form method="POST" action="{{ route('antrian.update', $antrian->id) }}" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Nomor Antrian (readonly) --}}
        <div>
            <label for="nomor_antrian" class="block text-sm text-gray-600 mb-1">Nomor Antrian</label>
            <input type="text" name="nomor_antrian" id="nomor_antrian" readonly
                class="w-full border rounded px-3 py-1.5 text-sm border-gray-300 bg-gray-100"
                value="{{ old('nomor_antrian', $antrian->nomor_antrian) }}">
        </div>

        {{-- Nama Pasien --}}
        <div>
            <label for="nama" class="block text-sm text-gray-600 mb-1">Nama Pasien</label>
            <input type="text" name="nama" id="nama"
                class="w-full border rounded px-3 py-1.5 text-sm border-gray-300"
                value="{{ old('nama', $antrian->nama) }}" required>
            @error('nama')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Keluhan --}}
        <div>
            <label for="keluhan" class="block text-sm text-gray-600 mb-1">Keluhan</label>
            <textarea name="keluhan" id="keluhan" rows="3"
                class="w-full border rounded px-3 py-1.5 text-sm border-gray-300"
                required>{{ old('keluhan', $antrian->keluhan) }}</textarea>
            @error('keluhan')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Status --}}
        <div>
            <label for="status" class="block text-sm text-gray-600 mb-1">Status</label>
            <select name="status" id="status"
                class="w-full border rounded px-3 py-1.5 text-sm border-gray-300" required>
                @foreach(['menunggu', 'diperiksa', 'selesai'] as $status)
                <option value="{{ $status }}" {{ old('status', $antrian->status) === $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
                @endforeach
            </select>
            @error('status')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Hasil Pemeriksaan --}}
        <div>
            <label for="hasil_pemeriksaan" class="block text-sm text-gray-600 mb-1">Hasil Pemeriksaan</label>
            <textarea name="hasil_pemeriksaan" id="hasil_pemeriksaan" rows="3"
                class="w-full border rounded px-3 py-1.5 text-sm border-gray-300">{{ old('hasil_pemeriksaan', $antrian->hasil_pemeriksaan) }}</textarea>
            @error('hasil_pemeriksaan')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Resep Obat --}}
        <div>
            <label for="resep_obat" class="block text-sm text-gray-600 mb-1">Resep Obat</label>
            <textarea name="resep_obat" id="resep_obat" rows="2"
                class="w-full border rounded px-3 py-1.5 text-sm border-gray-300">{{ old('resep_obat', $antrian->resep_obat) }}</textarea>
            @error('resep_obat')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex justify-end gap-3">
            <a href="{{ route('antrian.index') }}"
                class="text-sm text-gray-600 hover:text-gray-800 transition">Batal</a>

            <button type="submit"
                class="bg-[#1e3a8a] text-white px-4 py-2 text-sm rounded hover:bg-[#163570] transition">Update</button>
        </div>
    </form>
</div>
@endsection