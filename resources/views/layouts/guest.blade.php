<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen bg-gray-100">

        <!-- LOGIN AREA -->
        <div class="w-full flex justify-center mt-6 pt-20">
            <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg pt-36">
                <div class="flex justify-center mb-24">
                    <a href="{{ url('/') }}" class="text-2xl font-bold tracking-widest uppercase no-underline">
                        KWAR<span class="text-blue-400">TA</span>
                    </a>
                </div>
                {{ $slot }}
            </div>
        </div>

    </div>

</body>
</html>
