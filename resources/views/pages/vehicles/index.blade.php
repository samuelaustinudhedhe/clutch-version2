<div class="max-w-screen-2xl dark:bg-gray-900 mx-auto" x-data="{}" {{-- on load scroll down by 300px only on mobile or screens smaller than 1020px --}}
    x-init="() => {
        if (window.innerWidth < 1021) {
            setTimeout(() => window.scrollTo({ top: 300, behavior: 'smooth' }), 100);
        }
    }">
    {{-- Verification Note --}}
    @include('pages.vehicles.index.verification-note')

    {{-- Container  lg:max-h-[calc(100vh-100px)] --}}
    <section
        class="relative w-full flex flex-wrap flex-row-reverse lg:flex-nowrap lg:h-[calc(100vh-165px)] lg:max-h-[1500px]">

        {{-- Vehicles --}}
        <div
            class="flex flex-col justify-between w-full lg:min-w-[640px] lg:max-w-[740px] order-2 max-lg:mt-[calc(100vh-153px)]  max-lg:z-[5] max-lg:bg-white dark:bg-gray-900">
            <button class="lg:hidden flex items-center justify-center py-4 sticky top-16 z-10 bg-white dark:bg-gray-800 "
                onclick="window.scrollTo({top: 0,behavior: 'smooth'})">
                <span class="w-20 h-1 bg-gray-400 rounded-xl"></span>
            </button>


            {{-- Filters --}}
            @include('pages.vehicles.index.filters')

            {{-- Cars List --}}
            @include('pages.vehicles.index.listing', ['vehicles' => $vehicles])

            {{-- Pagination --}}
            <div class="mt-4 max-md:mx-2 mx-4 lg:mr-8 pb-6">
                {{ $vehicles->links('vendor.pagination.simple') }}

            </div>

        </div>

        {{-- Map --}}
        <div class="w-full max-lg:min-h-[calc(100vh-300px)] h-full lg:max-h-full fixed lg:relative">
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
                        'rating' => $vehicle->rating ?? '5.0',
                        'host_rating' =>
                            $vehicle->owner->rating > 4.9 ? 'All Star Host' : $vehicle->owner->rating . ' ★',
                        'location' => $vehicle->location->pickup->city ?? '',
                        'discount' => $vehicle->discount(),
                        'discount_note' =>
                            'Discount applies if rented ' .
                            (!$ly ? ' for ' : ' ') .
                            countDays($vehicle->discount_days ?? 1, $ly),
                        'extra_fees' => $vehicle->extra_fees ?? 0,
                        'trips' => '200 trips',
                        'pickup_city' => $vehicle->location->pickup->city ?? '',
                    ];
                });
            @endphp

            <style>
                .price-marker {
                    background: rgb(44, 92, 234);
                    color: white !important;
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
                }

                .gm-style-iw-chr {
                    display: none !important;
                }

                .gm-style-iw.gm-style-iw-c {
                    padding: 0 !important;
                }
            </style>

            <div wire:ignore id="map" class="w-full h-full "></div>

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
                    var mapStyle = [{
                            featureType: "all",
                            elementType: "labels",
                            stylers: [{
                                visibility: "off"
                            }]
                        },
                        // Highway roads
                        {
                            featureType: "road.highway",
                            elementType: "geometry",
                            stylers: [{
                                visibility: "on"
                            }, {
                                color: "#fde293"
                            }]
                        },
                        {
                            featureType: "road.highway",
                            elementType: "geometry.stroke",
                            stylers: [{
                                    color: "#f8af10"
                                }, // Darker shade of the fill color
                                {
                                    visibility: "on"
                                },
                                {
                                    weight: 2
                                } // Increase this value to make the stroke thicker
                            ]
                        },
                        {
                            featureType: "road.highway",
                            elementType: "labels.text.fill",
                            stylers: [{
                                visibility: "on"
                            }, {
                                color: "#773c04"
                            }]
                        },
                        // Arterial roads
                        {
                            featureType: "road.arterial",
                            elementType: "geometry",
                            stylers: [{
                                visibility: "on"
                            }]
                        },
                        {
                            featureType: "road.arterial",
                            elementType: "geometry.stroke",
                            stylers: [{
                                    color: "#fde293"
                                }, // Darker shade of the fill color
                                {
                                    visibility: "on"
                                },
                                {
                                    weight: 2
                                } // Increase this value to make the stroke thicker
                            ]
                        },
                        {
                            featureType: "road.arterial",
                            elementType: "geometry.fill",
                            stylers: [{
                                    color: "#e8eaed"
                                },
                                {
                                    visibility: "on"
                                },
                                {
                                    weight: 3
                                },
                            ]
                        },
                        {
                            featureType: "road.arterial",
                            elementType: "labels.text.fill",
                            stylers: [{
                                visibility: "on"
                            }, {
                                color: "#773c04"
                            }]
                        },

                        // Local roads
                        {
                            featureType: "road.local",
                            elementType: "geometry",
                            stylers: [{
                                visibility: "on"
                            }]
                        },
                        {
                            featureType: "road",
                            elementType: "labels.text.fill",
                            stylers: [{
                                visibility: "on"
                            }]
                        },
                        {
                            featureType: "transit.station.bus",
                            elementType: "labels",
                            stylers: [{
                                    visibility: "on"
                                },
                                {
                                    color: "#1C64F2"
                                },
                                {
                                    weight: "bold"
                                },
                                {
                                    size: "16"
                                }
                            ]
                        },
                        {
                            featureType: "transit.station.bus",
                            elementType: "geometry",
                            stylers: [{
                                    visibility: "on"
                                },
                                {
                                    color: "#1C64F2"
                                },
                                {
                                    scale: "2"
                                }
                            ]
                        },
                        {
                            featureType: "landscape",
                            elementType: "geometry",
                            //stylers: [{ visibility: "on" }, { color: "#f5f5f5" }]
                        },
                        {
                            featureType: "water",
                            elementType: "geometry",
                            // stylers: [{ visibility: "on" }, { color: "#e9e9e9" }]
                        },
                        {
                            featureType: "administrative.country",
                            elementType: "labels",
                            stylers: [{
                                visibility: "on"
                            }]
                        },
                        {
                            featureType: "administrative.province",
                            elementType: "labels",
                            stylers: [{
                                visibility: "on"
                            }]
                        },
                        {
                            featureType: "administrative.locality",
                            elementType: "labels",
                            stylers: [{
                                visibility: "on"
                            }]
                        },
                        {
                            featureType: "administrative.neighborhood",
                            elementType: "labels",
                            stylers: [{
                                visibility: "off"
                            }]
                        }
                    ];
                    var mapOptions = {
                        zoom: 13, // Increased zoom level for better detail
                        center: defaultCenter,
                        styles: mapStyle,
                        disableDefaultUI: true, // Disable default UI
                        gestureHandling: 'greedy',
                        zoomControl: true, // Add zoom control back
                        streetViewControl: false,
                        fullscreenControl: false,
                        mapTypeControl: false
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
                                smoothPanAndZoom(userLocation, 14); // Center map on user location with smooth animation
                            },
                            function() {
                                //console.log('Geolocation denied or unavailable. Centering map on Abuja, Nigeria.');
                                $wire.dispatch('notify', {
                                    message: 'Geolocation denied or unavailable. Centering map on Abuja, Nigeria.',
                                    type: 'info'
                                });
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
                            // console.log("No details available for the selected place.");
                            $wire.dispatch('notify', {
                                message: 'No details available for the selected place.',
                                type: 'info'
                            });
                            return;
                        }
                        // Smoothly pan and zoom to the selected place
                        smoothPanAndZoom(place.geometry.location, 17);
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
                            title: vehicle.name,
                            icon: {
                                url: '', // No icon for now, will be set based on zoom level
                                scaledSize: new google.maps.Size(vehicle.price.length * 8, 28),
                            },
                            label: {
                                text: `${vehicle.price}`,
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
                                                                                                                        <div class="bg-green-100 text-green-600 text-xs min-w-[60px] max-w-[60px] font-semibold px-2 py-1.5 max-w-32 rounded-lg inline-block">
                                                                                                                            ${vehicle.discount}% off
                                                                                                                        </div>` : ''}

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
                            //smoothPanAndZoom(marker.getPosition(), 11); // Center and zoom to level 16
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
                    }, 180); // 80ms delay for smoother transitions (faster but smoother) or 180, or 200
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
                            //console.log('Geocode was not successful for the following reason: ' + status);
                            $wire.dispatch('notify', {
                                message: 'Geocode was not successful for the following reason: ' + status,
                                type: 'error'
                            });

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
                            //!! NOTE !! update this to show icon of vehicle type when zoomed out
                            markerObj.marker.setLabel(null); // Remove label when zoomed out
                        } else {
                            // Show price label when zoomed in
                            markerObj.marker.setIcon({
                                url: '', // No icon
                                scaledSize: new google.maps.Size(markerObj.priceLabel.length * 9, 28),

                            });
                            markerObj.marker.setLabel({
                                text: `${markerObj.priceLabel}`,
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
