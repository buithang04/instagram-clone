<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Instagram Clone') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-950 antialiased">
        <div class="flex min-h-screen items-center justify-center bg-gradient-to-br from-rose-50 via-white to-blue-50 px-4 py-8">
            <div class="w-full max-w-md overflow-hidden rounded-2xl border border-slate-200 bg-white px-6 py-8 shadow-xl shadow-slate-200/60 sm:px-10">
                <a href="/" class="mb-8 flex items-center justify-center gap-2 text-2xl font-bold tracking-tight" aria-label="Instagram Clone home">
                    <span class="ig-gradient-ring rounded-xl"><span class="flex h-9 w-9 items-center justify-center rounded-[10px] bg-white">◎</span></span>
                    <span>Instagram</span>
                </a>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
