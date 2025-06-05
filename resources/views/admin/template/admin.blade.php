<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes car-move {
            0% {
                left: -40px;
            }

            100% {
                left: 100%;
            }
        }

        .animate-car-move {
            animation: car-move 6s linear infinite;
        }
    </style>
</head>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        const bulan = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        const today = new Date();
        const tanggal = `${hari[today.getDay()]}, ${today.getDate()} ${bulan[today.getMonth()]} ${today.getFullYear()}`;

        document.getElementById("tanggal-hari-ini").textContent = tanggal;
    });

    function toggleFullscreen() {
        const doc = window.document;
        const docEl = doc.documentElement;

        const requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullscreen || docEl.msRequestFullscreen;
        const cancelFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen;

        if (!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc.msFullscreenElement) {
            requestFullScreen.call(docEl);
        } else {
            cancelFullScreen.call(doc);
        }
    }
</script>

<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#1e3a8a] text-white shadow-lg hidden md:flex flex-col font-inter">
        <div
            class="p-3 flex items-center gap-4 border-b border-blue-700 bg-white shadow-sm select-none">
            <!-- Icon Dashboard - modern & minimal -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#1e3a8a]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                <circle cx="12" cy="14" r="3" stroke="#1e3a8a" stroke-width="2" fill="#2563eb" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 20h6" />
            </svg>

            <!-- Teks Admin Panel -->
            <h1 class="text-2xl font-extrabold text-[#1e3a8a] tracking-wide drop-shadow-sm">
                Admin Panel
            </h1>
        </div>

        <!-- Nav -->
        <nav class="flex-1 px-6 py-6 space-y-2 text-base font-medium">
            @php
            $navItems = [
            ['route' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'home'],
            ['route' => 'antrian.index', 'label' => 'Antrian Pasien', 'icon' => 'list'],
            ['route' => 'jadwal.index', 'label' => 'Jadwal', 'icon' => 'plus'],
            ];

            $icons = [
            'home' => '
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2 7-7 7 7M13 5v6h6" />',
            'list' => '
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />',
            'plus' => '
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-3-3v6m-3-9h6a2 2 0 012 2v14a2 2 0 01-2 2H9a2 2 0 01-2-2V7a2 2 0 012-2z" />',
            ];
            @endphp

            @foreach ($navItems as $item)
            @php
            $isActive = request()->routeIs($item['route']) ? 'bg-white text-[#1e3a8a]' : '';
            @endphp
            <a href="{{ route($item['route']) }}" class="flex items-center gap-4 px-5 py-3 rounded-md transition-colors duration-300 group shadow-sm {{ $isActive }} hover:bg-white hover:text-[#1e3a8a]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 stroke-current {{ $isActive ? 'text-[#1e3a8a]' : 'text-white group-hover:text-[#1e3a8a]' }}" fill="none" viewBox="0 0 24 24" stroke-width="2">{!! $icons[$item['icon']] !!}</svg>
                <span class="tracking-wide drop-shadow-sm select-none">{{ $item['label'] }}</span>
            </a>
            @endforeach
        </nav>
    </aside>

    <!-- Content -->
    <div class="flex-1 flex flex-col">
        <!-- Topbar -->
        <header class="w-full h-16 bg-white shadow flex items-center justify-between px-6 border-b">
            <div class="text-lg font-semibold text-[#1e3a8a]" id="tanggal-hari-ini"></div>

            <div class="flex items-center gap-4">
                <!-- Fullscreen Button -->
                <button onclick="toggleFullscreen()" class="p-2 rounded hover:bg-[#e0e7ff] transition" title="Perbesar Layar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#1e3a8a] hover:text-[#1e3a8a]" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 4h6M4 4v6M20 4h-6M20 4v6M4 20h6M4 20v-6M20 20h-6M20 20v-6" />
                    </svg>
                </button>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="p-2 rounded hover:bg-[#e0e7ff] transition" title="Logout">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#1e3a8a] hover:text-[#1e3a8a]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
                        </svg>
                    </button>
                </form>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-6">
            @yield('content')
        </main>
    </div>

</body>

</html>