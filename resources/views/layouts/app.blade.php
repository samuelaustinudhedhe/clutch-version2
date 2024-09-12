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

    <body class="h-full font-sans antialiased">
        {{-- Toasts --}}
        @livewire('toast.notify')
        {{-- Page Content Start --}}
        {{ $slot }}
        {{-- Page Conent End --}}
        @stack('modals')
        @livewireScripts
        {{-- Google Map --}}
        <script async src="https://maps.googleapis.com/maps/api/js?key={{ getGoogleMapKey() }}&loading=async&libraries=places&callback=initAddressAutocomplete&callback=initMap"></script>
        <script>
            function initAddressAutocomplete() {
                const addressInputs = document.querySelectorAll('[address]');
                addressInputs.forEach(input => {
                    // Remove any existing pac-container
                    const existingPacContainers = document.querySelectorAll('.pac-container');
                    existingPacContainers.forEach(container => container.remove());
        
                    // Initialize a new autocomplete instance
                    const autocomplete = new google.maps.places.Autocomplete(input);
                    autocomplete.setOptions({
                        types: [(input.dataset.type || 'address')],
                        strictBounds: false
                    });
        
                    autocomplete.addListener('place_changed', function() {
                        const place = autocomplete.getPlace();
        
                        // Trigger the input event to ensure the value is recognized
                        const event = new Event('input', {
                            bubbles: true,
                            cancelable: true,
                        });
                        input.dispatchEvent(event);
                    });
                });
            }
        </script>

    </body>

</html>
