@php
$layout = auth()->user()->role === 'admin' ? 'admin.template.admin' : 'superadmin.template';
@endphp

@extends($layout)

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-lg font-semibold text-gray-800 border-b pb-2">Daftar Antrian Pasien</h1>

        <div class="flex items-center gap-4">
            {{-- Filter --}}
            <div class="flex flex-wrap items-center justify-between mb-6 gap-4">

                {{-- 🔍 Filter Tabel Antrian --}}
                <form method="GET" class="flex items-center gap-3">
                    {{-- Tanggal --}}
                    <input type="date" name="tanggal"
                        class="text-sm px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        value="{{ request('tanggal', $tanggal) }}">

                    {{-- Dropdown Sesi --}}
                    <div class="relative">
                        <select name="sesi" onchange="this.form.submit()"
                            class="text-sm pl-3 pr-8 py-2 border border-gray-300 rounded-md appearance-none focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="pagi" {{ ($sesi ?? 'pagi') == 'pagi' ? 'selected' : '' }}>🌅 Pagi</option>
                            <option value="sore" {{ ($sesi ?? 'pagi') == 'sore' ? 'selected' : '' }}>🌇 Sore</option>
                        </select>
                        {{-- Icon panah ▼ --}}
                        <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>

                    {{-- Tombol --}}
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-md">
                        Tampilkan
                    </button>
                </form>

                {{-- 📦 Export ke Excel --}}
                <form action="{{ route('antrian.export') }}" method="GET" class="flex items-center gap-3">
                    <input type="date" name="dari" required
                        class="text-sm px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:outline-none"
                        placeholder="Dari tanggal">

                    <input type="date" name="sampai" required
                        class="text-sm px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:outline-none"
                        placeholder="Sampai tanggal">

                    <div class="relative">
                        <select name="sesi"
                            class="text-sm pl-3 pr-8 py-2 border border-gray-300 rounded-md appearance-none focus:ring-2 focus:ring-green-500 focus:outline-none">
                            <option value="semua">Semua Sesi</option>
                            <option value="pagi">Pagi</option>
                            <option value="sore">Sore</option>
                        </select>
                        {{-- Icon panah ▼ --}}
                        <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>

                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-2 rounded-md">
                        Export Excel
                    </button>
                </form>
            </div>

            {{-- Tambah Antrian --}}
            <a href="{{ route('antrian.create', ['sesi' => $sesi]) }}"
                class="flex items-center gap-2 bg-[#1e3a8a] text-white px-4 py-2 rounded hover:bg-[#163570] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Antrian
            </a>
        </div>
    </div>

    {{-- Notifikasi --}}
    @if (session('success'))
    <div class="mb-4 text-sm text-green-700 bg-green-100 px-4 py-3 rounded">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="mb-4 text-sm text-red-700 bg-red-100 px-4 py-3 rounded">
        {{ session('error') }}
    </div>
    @endif

    {{-- Tabel --}}
    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse text-sm text-gray-700">
            <thead>
                <tr class="bg-gray-50">
                    <th class="border-b px-4 py-2 text-left font-medium text-gray-600">Nomor</th>
                    <th class="border-b px-4 py-2 text-left font-medium text-gray-600">Nama</th>
                    <th class="border-b px-4 py-2 text-left font-medium text-gray-600">Keluhan</th>
                    <th class="border-b px-4 py-2 text-left font-medium text-gray-600">Tanggal</th>
                    <th class="border-b px-4 py-2 text-left font-medium text-gray-600">Sesi</th>
                    <th class="border-b border-gray-200 px-4 py-2 text-left font-medium text-gray-600">Hasil Pemeriksaan</th>
                    <th class="border-b border-gray-200 px-4 py-2 text-left font-medium text-gray-600">Resep Obat</th>
                    <th class="border-b border-gray-200 px-4 py-2 text-left font-medium text-gray-600">Status</th>
                    <th class="border-b px-4 py-2 text-left font-medium text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($antrians as $antrian)
                <tr class="hover:bg-gray-50 transition">
                    <td class="border-b px-4 py-3">{{ $antrian->nomor_antrian }}</td>
                    <td class="border-b px-4 py-3">{{ $antrian->nama }}</td>
                    <td class="border-b px-4 py-3">{{ $antrian->keluhan }}</td>
                    <td class="border-b px-4 py-3">
                        {{ \Carbon\Carbon::parse($antrian->jadwal->tanggal)->locale('id')->translatedFormat('l, d M Y') }}
                    </td>
                    <td class="border-b px-4 py-3 capitalize">{{ $antrian->sesi }}</td>
                    <td class="border-b border-gray-100 px-4 py-3">
                        {{ $antrian->hasil_pemeriksaan ?? '-' }}
                    </td>

                    <td class="border-b border-gray-100 px-4 py-3">
                        {{ $antrian->resep_obat ?? '-' }}
                    </td>
                    <td class="border-b border-gray-100 px-4 py-3">
                        @php
                        $status = $antrian->status;
                        $badgeColor = match ($status) {
                        'menunggu' => 'bg-yellow-100 text-yellow-800',
                        'diperiksa' => 'bg-green-100 text-green-800',
                        'selesai' => 'bg-red-100 text-red-800',
                        default => 'bg-gray-100 text-gray-800',
                        };
                        @endphp

                        <span class="inline-block px-2 py-1 rounded text-xs font-semibold {{ $badgeColor }}">
                            {{ ucfirst($status) }}
                        </span>
                    </td>
                    <td class="border-b px-4 py-3 flex space-x-4">
                        {{-- Edit --}}
                        <a href="{{ route('antrian.edit', $antrian->id) }}" class="text-green-600 hover:text-green-800" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5m-10-7l8 8m-3 0h3v3" />
                            </svg>
                        </a>

                        {{-- Hapus --}}
                        <form action="{{ route('antrian.destroy', $antrian->id) }}"
                            method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a2 2 0 00-2 2v2h8V5a2 2 0 00-2-2m-4 0h4" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-6 text-gray-400 italic">
                        Tidak ada antrian untuk sesi ini.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection