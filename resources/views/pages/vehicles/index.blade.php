<div class="max-w-screen-4xl  dark:bg-gray-900 md:py-12 mx-auto py-8">
    <!-- Heading & Filters -->

    {{-- Content --}}
    <section class="w-full flex flex-wrap flex-row-reverse lg:flex-nowrap md:max-h-[calc(100vh-100px)] h-screen">

        <!-- PRODUCT CARDS -->
        <div class="grid w-full lg:min-w-[640px] lg:max-w-[740px] order-2 ">
            {{-- Cars List --}}

            <div class="w-full overflow-hidden lg:overflow-y-scroll lg:px-4 lg:mr-1">
                @foreach ($vehicles as $vehicle)
                    <a href="{{ route('vehicles.show', $vehicle->id) }}">
                        <x-div class="md:flex my-[6px] rounded-lg !p-0">

                            <div class="w-full md:h-[176px] md:w-[291px]  relative">
                                <x-img src="{{ $vehicle->featured_image_url }}" class="h-full w-full object-cover "
                                    alt="{{ $vehicle->name }}" />
                                <div class="absolute right-0 top-0 p-1">
                                    <button type="button" data-tooltip-target="tooltip-add-to-favorites-9"
                                        class="rounded p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        <span class="sr-only"> Add to Favorites </span>
                                        <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
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
                                    <h3 class="md:text-xl font-normal capitalize">{{ $vehicle->name }}</h3>

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
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
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
                                    <div class="flex font-normal justify-end w-full items-baseline gap-2">
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
            <div class="mt-6 ml-4 mr-8">
                {{ $vehicles->links('vendor.pagination.simple') }}

            </div>

        </div>

        <div class="w-full min-h-full max-h-screen lg:max-h-full">
            @php
                $mapVehicles = $vehicles->map(function ($vehicle) {
                    // Generate a small random offset for latitude and longitude
                    $latOffset = mt_rand(-10, 10) / 10000; // Random offset between -0.001 and 0.001
                    $lngOffset = mt_rand(-10, 10) / 10000; // Random offset between -0.001 and 0.001
                    $ly = true;
                    $price = $vehicle->price->sale ?? $vehicle->price->amount;
                    return [
                        'id' => $vehicle->id,
                        'lat' => ($vehicle->location->pickup->latitude ?? 0) + $latOffset,
                        'lng' => ($vehicle->location->pickup->longitude ?? 0) + $lngOffset,
                        'price' => humanifyPrice($price), // Ensure the price is formatted correctly
                        'image' => $vehicle->featured_image_url,
                        'name' => $vehicle->name,
                        'rating' => $vehicle->rating ??'5.0',
                        'host_rating' =>
                            $vehicle->owner->rating > 4.9 ? 'All Star Host' : $vehicle->owner->rating . ' ★',
                        'location' => $vehicle->location->pickup->city ?? '',
                        'discount' => $vehicle->discount(),
                        'discount_note' => 'Discount applies if rented '.(!$ly ? ' for ' : ' ') . countDays(($vehicle->discount_days ?? 1), $ly),
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
                    font-size: 10px;
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

            <div wire:ignor id="map" class="h-full w-full "></div>
            
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
                        disableDefaultUI: false, // Remove all map controls
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
                                smoothPanAndZoom(userLocation, 12); // Center map on user location with smooth animation
                            },
                            function() {
                                console.log('Geolocation denied or unavailable. Centering map on Abuja, Nigeria.');
                                smoothPanAndZoom(defaultCenter, 10); // Center on Nigeria as fallback
                            }
                        );
                    }

                    // Handle the manual search by address when the user presses "Enter"
                    // input.addEventListener('keydown', function(event) {
                    //     if (event.key === 'Enter') {
                    //         geocodeAddress();
                    //     }
                    // });

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
                                scaledSize: new google.maps.Size(vehicle.price.length * 8, 28),
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
                                <a  href="/vehicles/${vehicle.id}" >
                                <div class="min-w-[320px] w-[320px] max-w-[320px] max-h-[330px] min-h-[330px] bg-white rounded-lg shadow-md overflow-hidden">

                                    <!-- Car Image -->
                                    <div class="relative">
                                        <img src="${vehicle.image}" alt="${vehicle.name}" width="320" hight="170" class="w-full h-[170px] object-cover">
                                        <!-- Favorite Icon (Heart) -->
                                    </div>

                                    <!-- Car Details -->
                                    <div class="mx-4 mt-1 mb-4 text-gray-600">
                                        <!-- Car Title -->
                                        <div class="text-xl font-bold text-gray-900 truncate w-full max-w-xs">${vehicle.name.substring(0, 24)}</div>
                                        <!-- Rating and Host Details -->
                                        <div class="flex items-center mt-[4px] space-x-2 font-medium text-[16px]">
                                            ${vehicle.rating}
                                            <svg class="w-4 h-4 mt-[-3px] text-gray-800 dark:text-indigo-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                            </svg>

                                            <!-- Number of Trips -->
                                            <span>(${vehicle.trips})</span>

                                        </div>

                                        <!-- Location -->
                                        <div class="flex items-center text-xs font-bold mt-1.5">
                                            <svg class="w-[14px] h-[14px] text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m17 21-5-4-5 4V3.889a.92.92 0 0 1 .244-.629.808.808 0 0 1 .59-.26h8.333a.81.81 0 0 1 .589.26.92.92 0 0 1 .244.63V21Z"/>
                                            </svg>

                                            ${vehicle.pickup_city}
                                        </div>

                                        <!-- Price Section -->
                                        <div class="mt-2 flex items-center justify-between">
                                            
                                            <!-- Save Amount -->
                                            ${vehicle.discount > 0 ? `
                                                <div class="bg-green-100 text-green-600 text-xs min-w-[60px] max-w-[60px] font-semibold px-2 py-1 rounded-lg inline-block">
                                                    ${vehicle.discount}% off
                                                </div>
                                            ` : ''}

                                            <!-- Price -->
                                            <div class="text-right w-full ml-2">
                                                <div class="text-base font-bold text-gray-900">${vehicle.price}/day</div>                                            
                                                <p class="text-gray-500 underline text-xs mt-1">${vehicle.discount_note}</p>
                                            </div>

                                            <!-- Excluded Fees -->
                                        </div>
                                    </div>
                                </div>
                                </a>
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
                            smoothPanAndZoom(marker.getPosition(), 11); // Center and zoom to level 16
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
                                14); // Smoothly pan and zoom to the searched location
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
