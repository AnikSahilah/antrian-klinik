@extends('admin.template.admin')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg">

    <!-- Header & Button -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-lg font-semibold text-gray-800 border-b pb-2">Jadwal Antrian</h1>
        <a href="{{ route('jadwal.create') }}"
            class="flex items-center gap-2 bg-[#1e3a8a] text-white px-4 py-2 rounded hover:bg-[#163570] transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Jadwal
        </a>
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
                    <th class="border-b border-gray-200 px-4 py-2 text-left font-medium text-gray-600">Hari</th>
                    <th class="border-b border-gray-200 px-4 py-2 text-left font-medium text-gray-600">Jam Buka Pagi</th>
                    <th class="border-b border-gray-200 px-4 py-2 text-left font-medium text-gray-600">Jam Buka Sore</th>
                    <th class="border-b border-gray-200 px-4 py-2 text-left font-medium text-gray-600">Status</th>
                    <th class="border-b border-gray-200 px-4 py-2 text-left font-medium text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jadwals as $jadwal)
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="border-b border-gray-100 px-4 py-3 capitalize">{{ $jadwal->hari }}</td>
                    <td class="border-b border-gray-100 px-4 py-3">{{ $jadwal->jam_buka_pagi }}</td>
                    <td class="border-b border-gray-100 px-4 py-3">{{ $jadwal->jam_buka_sore }}</td>
                    <td class="border-b border-gray-100 px-4 py-3 capitalize">{{ $jadwal->status }}</td>
                    <td class="border-b border-gray-100 px-4 py-3 flex space-x-4">
                        <!-- Edit -->
                        <a href="{{ route('jadwal.edit', $jadwal->id) }}"
                            class="text-green-600 hover:text-green-800" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5m-10-7l8 8m-3 0h3v3" />
                            </svg>
                        </a>

                        <!-- Delete -->
                        <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus jadwal ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 bg-transparent border-0"
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
                    <td colspan="5" class="text-center py-6 text-gray-400 italic">Belum ada jadwal antrian.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection