<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  {{ darkModeOn(); }} >

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Clutch') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>

    <body class="auth h-full font-sans text-gray-900 dark:text-gray-100 antialiased">

        {{ $slot }}

        @livewireScripts
        @stack('scripts')
        <script async src="https://maps.googleapis.com/maps/api/js?key={{ getGoogleMapKey() }}&loading=async&libraries=places&callback=initAddressAutocomplete&callback=initMap"></script>
    </body>

</html>
