<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ darkModeOn() }}>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Clutch') }}</title>
        {{ printSEO() }}

        {{-- Fonts --}}
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- Scripts --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Styles --}}
        @livewireStyles
    </head>
    <body class="font-sans text-gray-900 dark:text-gray-100 antialiased">
        {{-- Notification --}}
        @include('layouts.partials.session-flash')

        {{-- Header Content--}}        
        <header class="h-[65px] relative">
            {{-- Add your navigation or header content here --}}
            @include('layouts.partials.header')
        </header>

        {{-- Main Page Content --}}
        <main>
            {{ $slot }}
        </main>

        {{-- Footer Content --}}
        <footer class="relative">
            {{-- Add your footer content here --}}
            @include('layouts.partials.footer')
        </footer>

        {{-- Livewire Scripts --}}
        @livewireScripts

        {{-- Google Map --}}
        <script async src="https://maps.googleapis.com/maps/api/js?key={{ getGoogleMapKey() }}&loading=async&libraries=places&callback=initAddressAutocomplete&callback=initMap"></script>
        {{-- <script>
            if (typeof initMap === 'function') {
                var script = document.createElement('script');
                script.src = "https://maps.googleapis.com/maps/api/js?key={{ getGoogleMapKey() }}&loading=async&libraries=places&callback=initMap";
                script.async = true;
                script.defer = true;
                document.body.appendChild(script);
            }
        </script> --}}
    </body>
</html>
