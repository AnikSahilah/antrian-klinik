<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - RentalMobil</title>

    <!-- Google Font: Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS via Vite -->
    @vite('resources/css/app.css')

    <!-- Font Custom Style -->
    <style>
        .font-roboto {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-[#e0e7ff] to-[#1e3a8a] min-h-screen flex items-center justify-center p-6 font-roboto text-[#1e3a8a]">

    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8 border border-[#e0e7ff]">
        <h2 class="text-3xl font-bold mb-6 text-center">Login ke RentalMobil</h2>

        <!-- Session Status -->
        @if (session('status'))
        <div class="mb-4 text-sm text-green-600 font-medium">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    required autofocus autocomplete="username"
                    class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-300 shadow-sm focus:ring-[#1e3a8a] focus:border-[#1e3a8a]" />
                @error('email')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="mt-1 block w-full rounded-md bg-gray-100 border border-gray-300 shadow-sm focus:ring-[#1e3a8a] focus:border-[#1e3a8a]" />
                @error('password')
                <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-6">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember"
                        class="rounded border-gray-300 text-[#1e3a8a] shadow-sm focus:ring-[#1e3a8a]">
                    <span class="ml-2 text-sm">Remember me</span>
                </label>

                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-[#1e3a8a] hover:underline">
                    Lupa password?
                </a>
                @endif
            </div>

            <button type="submit"
                class="w-full bg-[#1e3a8a] text-white font-semibold py-2 rounded-md shadow hover:bg-[#3344aa] transition">
                Masuk
            </button>
        </form>

        <p class="mt-6 text-sm text-center">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-[#1e3a8a] hover:underline font-medium">Daftar sekarang</a>
        </p>
    </div>

</body>

</html>