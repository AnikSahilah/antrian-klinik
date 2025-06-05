@extends('superadmin.template')

@section('content')
<!-- Welcome Card -->
<div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 rounded-xl shadow-lg text-white p-5 flex items-center justify-between mb-8">
    <div class="max-w-xl">
        <div class="text-2xl font-bold mb-2">Welcome, {{ auth()->user()->name }}!</div>
        <p class="text-white text-opacity-90 text-sm leading-relaxed">
            Anda login sebagai admin. Anda dapat mengelola data antrian dan jadwal praktik.
        </p>
    </div>
    <div class="hidden md:flex items-center pr-16">
        <img src="{{ asset('assets/images/admin.svg') }}" alt="Admin Illustration" class="w-64 h-auto">
    </div>
</div>

<!-- Cards container -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

    <!-- Folder-Style Total Antrian Card -->
    <div class="relative bg-gradient-to-br from-green-100 via-green-50 to-white rounded-t-3xl rounded-b-xl shadow-lg overflow-hidden p-6 text-center hover:shadow-2xl transition duration-300 border border-green-200">

        <!-- Folder Tab -->
        <div class="absolute top-0 left-6 w-28 h-6 bg-green-300 rounded-b-xl shadow-md"></div>

        <!-- Icon -->
        <div class="mb-4 mt-6 flex justify-center relative">
            <div class="bg-white p-3 rounded-full shadow-inner border border-green-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v12a2 2 0 01-2 2z" />
                </svg>
            </div>
        </div>

        <!-- Text -->
        <h2 class="text-lg font-bold text-green-800 mb-1">Total Antrian</h2>
        <p class="text-5xl font-extrabold text-green-700 drop-shadow-sm">{{ $totalAntrian }}</p>
        <p class="text-sm text-gray-500 mt-1">Jumlah pasien yang mendaftar</p>

        <!-- Decorative Bottom Accent -->
        <div class="mt-6 flex justify-center">
            <div class="w-16 h-1 rounded-full bg-green-300"></div>
        </div>
    </div>

    <!-- Jadwal Mingguan Card -->
    <div class="bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition duration-300">
        <h3 class="text-xl font-bold mb-4 text-gray-800 border-b pb-2">Jadwal Mingguan</h3>

        <table class="w-full text-left table-auto border-collapse">
            <thead>
                <tr class="bg-indigo-100">
                    <th class="px-4 py-2 font-semibold text-indigo-700">Hari</th>
                    <th class="px-4 py-2 font-semibold text-indigo-700">Pagi</th>
                    <th class="px-4 py-2 font-semibold text-indigo-700">Sore</th>
                    <th class="px-4 py-2 font-semibold text-indigo-700">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal as $item)
                <tr class="border-b last:border-b-0 hover:bg-indigo-50">
                    <td class="px-4 py-2 font-medium text-indigo-800">{{ ucfirst($item->hari) }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ \Carbon\Carbon::parse($item->jam_buka_pagi)->format('H:i') }}</td>
                    <td class="px-4 py-2 text-gray-700">{{ \Carbon\Carbon::parse($item->jam_buka_sore)->format('H:i') }}</td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-1 rounded-full text-xs {{ $item->status === 'buka' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection