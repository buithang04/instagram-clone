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
         <style>
            [x-cloak]{
                display: none !important;
            }
         </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-white text-slate-950">
          <div class="drawer lg:drawer-open">
  <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content items-center justify-center z-0 pb-20 lg:pb-0">
  <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[100] focus:rounded-lg focus:bg-white focus:px-4 focus:py-2 focus:shadow-lg">Skip to content</a>
  <main id="main-content">{{$slot}}</main>
  </div>
  <div class="drawer-side !overflow-visible  z-10"  >
    <label for="my-drawer-2" class="drawer-overlay"></label>


    <livewire:components.sidebar />

  </div>
</div>
    @livewire('wire-elements-modal')

    @auth
    <nav aria-label="Primary navigation" class="safe-bottom fixed inset-x-0 bottom-0 z-40 border-t border-slate-200 bg-white/95 px-2 pt-1 backdrop-blur lg:hidden">
        <ul class="mx-auto grid max-w-md grid-cols-5">
            @php
                $mobileNav = [
                    ['home', route('home'), 'Home', 'M3 11.5 12 3l9 8.5V21h-6v-6H9v6H3v-9.5Z'],
                    ['explore', route('explore'), 'Explore', 'M12 22a10 10 0 1 0 0-20 10 10 0 0 0 0 20Zm3.5-13.5-2 5-5 2 2-5 5-2Z'],
                    ['reels', route('reels'), 'Reels', 'M4 5.5A2.5 2.5 0 0 1 6.5 3h11A2.5 2.5 0 0 1 20 5.5v13a2.5 2.5 0 0 1-2.5 2.5h-11A2.5 2.5 0 0 1 4 18.5v-13ZM4 8h16M9 3l3 5m3-5 3 5m-8 4v5l4-2.5-4-2.5Z'],
                    ['shop.demo', route('shop.demo'), 'Shop demo', 'M6 8V6a6 6 0 0 1 12 0v2m3 0-1 13H4L3 8h18Z'],
                    ['profile.home', route('profile.home', auth()->user()->username), 'Profile', 'M20 21a8 8 0 0 0-16 0m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z'],
                ];
            @endphp
            @foreach($mobileNav as [$routeName, $href, $label, $path])
                <li><a wire:navigate href="{{ $href }}" aria-label="{{ $label }}" @class(['flex min-h-12 items-center justify-center rounded-xl', 'text-slate-950' => request()->routeIs($routeName), 'text-slate-500' => !request()->routeIs($routeName)])><svg aria-hidden="true" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}" /></svg></a></li>
            @endforeach
        </ul>
    </nav>
    @endauth
    </body>
</html>
