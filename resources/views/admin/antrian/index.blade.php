@php
$layout = auth()->user()->role === 'admin' ? 'admin.template.admin' : 'superadmin.template';
@endphp

@extends($layout)

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg">

    <!-- Header & Button -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-lg font-semibold text-gray-800 border-b pb-2">Daftar Antrian Pasien</h1>

        <div class="flex items-center gap-4">
            <form method="GET" class="relative">
                <select name="waktu" onchange="this.form.submit()"
                    class="w-32 text-sm block appearance-none bg-white border border-gray-300 text-gray-700 py-1.5 px-3 pr-6 rounded leading-tight focus:outline-none focus:ring focus:border-blue-500">
                    <option value="pagi" {{ ($waktu ?? 'pagi') == 'pagi' ? 'selected' : '' }}>Pagi</option>
                    <option value="sore" {{ ($waktu ?? 'pagi') == 'sore' ? 'selected' : '' }}>Sore</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center text-gray-700">
                    <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                        <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" />
                    </svg>
                </div>
            </form>

            <a href="{{ route('antrian.create') }}"
                class="flex items-center gap-2 bg-[#1e3a8a] text-white px-4 py-2 rounded hover:bg-[#163570] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Antrian
            </a>
        </div>
    </div>

    <!-- Notifikasi -->
    @if (session('success'))
    <div class="mb-4 text-sm text-green-700 bg-green-100 px-4 py-3 rounded">
        {{ session('success') }}
    </div>
    @endif

    <!-- Tabel -->
    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse text-sm text-gray-700">
            <thead>
                <tr class="bg-gray-50">
                    <th class="border-b border-gray-200 px-4 py-2 text-left font-medium text-gray-600">Nomor</th>
                    <th class="border-b border-gray-200 px-4 py-2 text-left font-medium text-gray-600">Nama</th>
                    <th class="border-b border-gray-200 px-4 py-2 text-left font-medium text-gray-600">Keluhan</th>
                    <th class="border-b border-gray-200 px-4 py-2 text-left font-medium text-gray-600">Hari</th>
                    <th class="border-b border-gray-200 px-4 py-2 text-left font-medium text-gray-600">Waktu</th>
                    <th class="border-b border-gray-200 px-4 py-2 text-left font-medium text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($antrians as $antrian)
                <tr class="hover:bg-gray-50 transition-colors duration-150 cursor-pointer">
                    <td class="border-b border-gray-100 px-4 py-3">{{ $antrian->nomor_antrian }}</td>
                    <td class="border-b border-gray-100 px-4 py-3">{{ $antrian->nama }}</td>
                    <td class="border-b border-gray-100 px-4 py-3">{{ $antrian->keluhan }}</td>
                    <td class="border-b border-gray-100 px-4 py-3">{{ ucfirst($antrian->hari_periksa) }}</td>
                    <td class="border-b border-gray-100 px-4 py-3 capitalize">{{ $antrian->waktu_periksa }}</td>
                    <td class="border-b border-gray-100 px-4 py-3 flex space-x-4">

                        <!-- Edit -->
                        <a href="{{ route('antrian.edit', $antrian->id) }}"
                            class="text-green-600 hover:text-green-800" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5m-10-7l8 8m-3 0h3v3" />
                            </svg>
                        </a>

                        <!-- Delete -->
                        <form action="{{ route('antrian.destroy', $antrian->id) }}"
                            method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-600 hover:text-red-800 bg-transparent border-0"
                                title="Hapus">
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
                    <td colspan="6" class="text-center py-6 text-gray-400 italic">Belum ada antrian pasien.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection