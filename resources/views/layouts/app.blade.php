<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ darkModeOn() }}>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'EaseWheels') }}</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>

    <body class="h-full font-sans text-gray-900 dark:text-gray-100 antialiased">
        {{-- Toasts --}}
        @livewire('toast.notify')
        {{-- Page Content Start --}}
        {{ $slot }}
        {{-- Page Conent End --}}
        @stack('modals')
        @stack('scripts') 
        @livewireScripts
        {{-- Google Map --}}
        <script async src="https://maps.googleapis.com/maps/api/js?key={{ getGoogleMapKey() }}&libraries=places&callback=initAddressAutocomplete&callback=initMap"></script>
    </body>

</html>
