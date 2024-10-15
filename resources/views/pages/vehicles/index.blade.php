<div class="max-w-screen-4xl  dark:bg-gray-900 md:py-12 mx-auto py-8">
    <!-- Heading & Filters -->
    <section class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
        <div>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="#"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="me-2.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m9 5 7 7-7 7" />
                            </svg>
                            <span
                                class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Vehicles</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Vehicles</h2>
        </div>
        <div class="flex items-center space-x-4">
            <!-- Add an input field for location search -->
            <x-search id="search-by-location" class="!md:w-[400px]" placeholder="Search by location" />
            <button data-modal-toggle="filterModal" data-modal-target="filterModal" type="button"
                class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">
                <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                </svg>
                Filters
                <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 9-7 7-7-7" />
                </svg>
            </button>
            <button id="sortDropdownButton1" data-dropdown-toggle="dropdownSort1" type="button"
                class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">
                <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 4v16M7 4l3 3M7 4 4 7m9-3h6l-6 6h6m-6.5 10 3.5-7 3.5 7M14 18h4" />
                </svg>
                Sort
                <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 9-7 7-7-7" />
                </svg>
            </button>
            <div id="dropdownSort1"
                class="z-50 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700"
                data-popper-placement="bottom">
                <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                    aria-labelledby="sortDropdownButton">
                    <li>
                        <a href="#"
                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                            The most popular </a>
                    </li>
                    <li>
                        <a href="#"
                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                            Newest </a>
                    </li>
                    <li>
                        <a href="#"
                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                            Increasing price </a>
                    </li>
                    <li>
                        <a href="#"
                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                            Decreasing price </a>
                    </li>
                    <li>
                        <a href="#"
                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                            No. reviews </a>
                    </li>
                    <li>
                        <a href="#"
                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                            Discount % </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="w-full flex md:max-h-[calc(100vh-100px)] h-screen flex-col-reverse lg:flex-row">

        <!-- PRODUCT CARDS -->
        <div class="w-full lg:w-3/5 lg:max-w-[840px] flex flex-col justify-between">
            {{-- Cars List --}}

            <div class="w-full overflow-hidden lg:overflow-y-scroll lg:px-4 lg:mr-1">
                @foreach ($vehicles as $vehicle)
                    <a href="{{ route('vehicles.show', $vehicle->id) }}">
                        <x-div class="md:flex my-[6px] rounded-lg !p-0">

                            <div class="w-full md:h-[176px] md:w-[291px]  relative">
                                <!-- Carousel wrapper -->
                                <x-img
                                    src="{{ is_string($vehicle->featuredImage('car')) ? $vehicle->featuredImage('car') : $vehicle->featuredImage('car')->url }}"
                                    class="h-full w-full object-cover " alt="{{ $vehicle->name }}" />
                                <div class="absolute right-0 top-0 p-1">
                                    <button type="button" data-tooltip-target="tooltip-add-to-favorites-9"
                                        class="rounded p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        <span class="sr-only"> Add to Favorites </span>
                                        <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
                                        </svg>
                                    </button>
                                    <div id="tooltip-add-to-favorites-9" role="tooltip"
                                        class="tooltip invisible absolute z-10 inline-block w-[132px] rounded-lg bg-gray-900 px-3 py-2 font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-600"
                                        data-popper-placement="top">
                                        Add to favorites
                                        <div class="tooltip-arrow" data-popper-arrow=""></div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full md:w-2/3 p-2 h-full flex flex-col justify-between">
                                <div class="space-y-2 px-2 pb-2">
                                    <h3 class="md:text-xl font-bold capitalize">{{ $vehicle->name }}</h3>

                                    <div class="flex items-center">
                                        {{ $vehicle->rating }}
                                        <svg class="w-4 h-4 text-gray-800 dark:text-indigo-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                        </svg>
                                    </div>
                                    <div class="text-xs flex items-cente -ml-1">
                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
                                        </svg>

                                        {{ $vehicle->location->pickup->city ?? '' }}
                                    </div>
                                </div>

                                <div class="flex justify-between gep-4 items-center p-2">

                                    @if ($vehicle->on_sale)
                                        <span class="bg-green/.55 ">
                                            save {{ $vehicle->human_discounted_price }}
                                        </span>
                                    @endif
                                    <div class="flex font-semibold justify-end w-full items-baseline gap-2">
                                        @if ($vehicle->on_sale)
                                            <span class="flex line-through text-gray-600 dark:text-gray-400  text-sm">
                                                {{ $vehicle->human_price }}
                                            </span>
                                            <span class="text-lg">
                                                {{ $vehicle->human_sale_price }}
                                            </span>
                                        @else
                                            <span class="text-lg">

                                                {{ $vehicle->human_price }}
                                            </span>
                                        @endif
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </x-div>
                    </a>
                @endforeach


            </div>

            {{-- Pagination --}}
            <div class="mt-6">
                {{ $vehicles->links('vendor.pagination.simple') }}

            </div>

        </div>

        <div class="w-full lg:w-2/5 xl:w-[calc(100%-840px)] min-h-full max-h-screen lg:max-h-full">
            @php
                $mapVehicles = $vehicles->map(function ($vehicle) {
                    return [
                        'lat' => $vehicle->location->pickup->latitude ?? '',
                        'lng' => $vehicle->location->pickup->longitude ?? '',
                        'price' => formatPrice($vehicle->price->sale),
                        'regular_price' => formatPrice($vehicle->price->amount),
                        'image' => $vehicle->featuredImage('car')->url,
                        'name' => $vehicle->name,
                        'rating' => $vehicle->rating ?? 5.0,
                        'host_rating' =>
                            $vehicle->owner->rating > 4.9 ? 'All Star Host' : $vehicle->owner->rating . ' ★',
                        'location' => $vehicle->location->pickup->city ?? '',
                        'discount' => $vehicle->price->on_sale ? $vehicle->price->amount - $vehicle->price->sale : 0,
                        'extra_fees' => $vehicle->extra_fees ?? 0,
                        'trips' => '200 trips',
                        'pickup_city' => $vehicle->location->pickup->city ?? '',
                    ];
                });
            @endphp

            <style>
                .price-marker {
                    background: white;
                    border-radius: 6px;
                    padding: 5px;
                    border: 1px solid #ccc;
                    text-align: center;
                    font-weight: bold;
                }

                .gm-style-iw-d,
                .gm-style-iw.gm-style-iw-c {
                    overflow: hidden !important;
                    min-height: 320px;
                    max-height: 320px;
                }

                .gm-style-iw-chr {
                    display: none !important;
                }

                .gm-style-iw.gm-style-iw-c {
                    padding: 0 !important;
                }
            </style>

            <div wire:ignore id="map" class="h-full w-full" style="background-image: url('{{ getPlaceholder('map') }}'); background-position: center center; background-size: cover;"></div>
            {{-- The map JS --}}
            <script>
                let openInfoWindow = null; // Track the currently open InfoWindow
                let map;
                let geocoder; // For converting addresses to coordinates
                const zoomThreshold = 10; // Threshold to switch between price and blue dot markers
                let markers = []; // Array to hold all markers
                var mapStyle = [];

                // Initialize the map
                function initMap() {
                    // Default location: Nigeria
                    var defaultCenter = {
                        lat: 9.0579,
                        lng: 7.4951
                    };
                    var mapOptions = {
                        zoom: 10,
                        center: defaultCenter,
                        styles: mapStyle, // Apply custom map style
                        disableDefaultUI: true, // Remove all map controls
                        gestureHandling: 'greedy', // Allow zooming without holding Ctrl
                    };

                    // Initialize the map
                    map = new google.maps.Map(document.getElementById('map'), mapOptions);
                    geocoder = new google.maps.Geocoder(); // Initialize Geocoder

                    // Re-enable autocomplete for the input field
                    var input = document.getElementById('search-by-location');
                    var autocomplete = new google.maps.places.Autocomplete(input);
                    autocomplete.bindTo('bounds', map); // Bind autocomplete to the map bounds

                    // Attempt to get user's current location
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            function(position) {
                                var userLocation = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude,
                                };
                                smoothPanAndZoom(userLocation, 15); // Center map on user location with smooth animation
                            },
                            function() {
                                console.log('Geolocation denied or unavailable. Centering map on Nigeria.');
                                smoothPanAndZoom(defaultCenter, 15); // Center on Nigeria as fallback
                            }
                        );
                    }

                    // Handle the manual search by address when the user presses "Enter"
                    input.addEventListener('keydown', function(event) {
                        if (event.key === 'Enter') {
                            geocodeAddress();
                        }
                    });

                    // Listen to place changes for autocomplete
                    autocomplete.addListener('place_changed', function() {
                        var place = autocomplete.getPlace();
                        if (!place.geometry) {
                            alert("No details available for the selected place.");
                            return;
                        }
                        // Smoothly pan and zoom to the selected place
                        smoothPanAndZoom(place.geometry.location, 12);
                    });

                    // Example vehicle data with image
                    var vehicles = @json($mapVehicles);

                    // Create markers for each vehicle
                    vehicles.forEach(function(vehicle) {
                        var marker = new google.maps.Marker({
                            position: {
                                lat: vehicle.lat,
                                lng: vehicle.lng
                            },
                            map: map,
                            icon: {
                                url: '', // No icon for now, will be set based on zoom level
                                scaledSize: new google.maps.Size(vehicle.price.length * 8.5, 28),
                            },
                            label: {
                                text: `${vehicle.price}`,
                                color: 'black',
                                fontSize: '12px',
                                fontWeight: 'bold',
                                className: 'price-marker',
                            },
                        });

                        // InfoWindow content with HTML and inline styling
                        var infowindow = new google.maps.InfoWindow({
                            content: `                                
                                <div class="max-w-xs bg-white rounded-lg shadow-md overflow-hidden">

                                    <!-- Car Image -->
                                    <div class="relative">
                                        <img src="${vehicle.image}" alt="${vehicle.name}" class="w-full h-40 object-cover">
                                        <!-- Favorite Icon (Heart) -->
                                    </div>

                                    <!-- Car Details -->
                                    <div class="p-4">
                                        <!-- Car Title -->
                                        <h2 class="text-lg font-bold text-gray-900 truncate w-full max-w-xs">${vehicle.name.substring(0, 24)}</h2>
                                        <!-- Rating and Host Details -->
                                        <div class="flex items-center mt-2 space-x-2 text-sm text-gray-600">
                                            <!-- Rating -->
                                            <div class="flex items-center">
                                                <span class="text-indigo-500">${vehicle.rating}</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 ml-1" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                                </svg>
                                            </div>
                                            <!-- Number of Trips -->
                                            <span>(${vehicle.trips})</span>
                                            <!-- Host Badge -->
                                            <div class="flex items-center space-x-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-black" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M12 2L1 21h22L12 2z" />
                                                </svg>
                                                <span>${vehicle.host_rating}</span>
                                            </div>
                                        </div>

                                        <!-- Location -->
                                        <div class="flex items-center text-gray-600 text-sm mt-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 2a6 6 0 00-6 6c0 4.284 6 10 6 10s6-5.716 6-10a6 6 0 00-6-6zM5 8a5 5 0 1110 0 5 5 0 01-10 0z" clip-rule="evenodd" />
                                            </svg>
                                            <span>${vehicle.pickup_city}</span>
                                        </div>

                                        <!-- Price Section -->
                                        <div class="mt-3">
                                            <!-- Save Amount -->
                                            <div class="bg-green-100 text-green-600 text-xs font-semibold px-2 py-1 rounded-full inline-block">
                                                Save ${vehicle.discount}
                                            </div>

                                            <!-- Price -->
                                            <div class="flex items-center mt-1">
                                                <span class="line-through text-gray-500 text-sm">${vehicle.regular_price}</span>
                                                <span class="text-lg font-bold text-gray-900 ml-2">${vehicle.price}/day</span>
                                            </div>

                                            <!-- Excluded Fees -->
                                            <p class="text-gray-500 text-xs mt-1">${vehicle.extra_fees} excl. taxes & fees</p>
                                        </div>
                                    </div>
                                </div>
                                `,
                        });

                        // Handle marker click to open InfoWindow
                        marker.addListener('click', function() {
                            if (openInfoWindow) {
                                openInfoWindow.close();
                            }
                            infowindow.open(map, marker);
                            openInfoWindow = infowindow;

                            // Smoothly zoom in and center the map on the clicked vehicle's location
                            smoothPanAndZoom(marker.getPosition(), 16); // Center and zoom to level 16
                        });

                        // Store the marker for later use
                        markers.push({
                            marker: marker,
                            priceLabel: vehicle.price,
                        });
                    });

                    // Close any open popup when clicking elsewhere on the map
                    map.addListener('click', function() {
                        if (openInfoWindow) {
                            openInfoWindow.setMap(null);
                            openInfoWindow = null;
                        }
                    });

                    // Listen for zoom changes and update markers accordingly
                    map.addListener('zoom_changed', function() {
                        updateMarkersByZoom(map.getZoom());
                    });

                    // Update the markers based on the current zoom level
                    updateMarkersByZoom(map.getZoom());
                }

                // Function to smoothly pan and zoom the map
                function smoothPanAndZoom(targetPosition, targetZoom) {
                    // Smooth pan
                    map.panTo(targetPosition);

                    // Gradually zoom into the target zoom level, but keep the vehicle centered
                    let currentZoom = map.getZoom();
                    let zoomDirection = targetZoom > currentZoom ? 1 : -1; // Determine zoom direction

                    let zoomInterval = setInterval(function() {
                        if ((zoomDirection === 1 && currentZoom < targetZoom) || (zoomDirection === -1 && currentZoom >
                                targetZoom)) {
                            currentZoom += zoomDirection;
                            map.setZoom(currentZoom);
                            // Continuously pan the map to ensure the vehicle remains centered while zooming
                            map.panTo(targetPosition);
                        } else {
                            clearInterval(zoomInterval); // Clear interval when zoom is complete
                        }
                    }, 80); // 80ms delay for smoother transitions (faster but smoother)
                }

                // Function to geocode the address entered by the user
                function geocodeAddress() {
                    var address = document.getElementById('search-by-location').value;
                    geocoder.geocode({
                        address: address
                    }, function(results, status) {
                        if (status === 'OK') {
                            smoothPanAndZoom(results[0].geometry.location,
                                15); // Smoothly pan and zoom to the searched location
                        } else {
                            alert('Geocode was not successful for the following reason: ' + status);
                        }
                    });
                }

                // Function to update markers based on the current zoom level
                function updateMarkersByZoom(zoomLevel) {
                    markers.forEach(function(markerObj) {
                        if (zoomLevel <= zoomThreshold) {
                            // Set marker to custom blue dot when zoomed out
                            markerObj.marker.setIcon({
                                path: google.maps.SymbolPath.CIRCLE,
                                fillColor: 'blue',
                                fillOpacity: 0.6,
                                scale: 7, // 10px radius for inner circle
                                strokeColor: 'white',
                                strokeWeight: 3, // 2px outer border
                            });
                            markerObj.marker.setLabel(null); // Remove label when zoomed out
                        } else {
                            // Show price label when zoomed in
                            markerObj.marker.setIcon({
                                url: '', // No icon
                                scaledSize: new google.maps.Size(markerObj.priceLabel.length * 8.5, 28),
                            });
                            markerObj.marker.setLabel({
                                text: `${markerObj.priceLabel}`,
                                color: 'black',
                                fontSize: '14px',
                                fontWeight: 'bold',
                                className: 'price-marker',
                            });
                        }
                    });
                }

                // Load the map when the window loads
                google.maps.event.addDomListener(livewire, 'load', initMap);
            </script>


        </div>
    </section>

</div>
