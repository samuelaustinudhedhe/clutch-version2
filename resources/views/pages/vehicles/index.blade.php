<section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
    <div class="mx-auto container px-8 2xl:px-0">
        <!-- Heading & Filters -->
        <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
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
                <button data-modal-toggle="filterModal" data-modal-target="filterModal" type="button"
                    class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">
                    <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                    </svg>
                    Filters
                    <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </button>
                <button id="sortDropdownButton1" data-dropdown-toggle="dropdownSort1" type="button"
                    class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">
                    <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 4v16M7 4l3 3M7 4 4 7m9-3h6l-6 6h6m-6.5 10 3.5-7 3.5 7M14 18h4" />
                    </svg>
                    Sort
                    <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
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
        </div>


        <div class="w-full flex max-h-[calc(100vh-200px)] overflow-hidden">

            <!-- PRODUCT CARDS -->
            <div class="w-3/5 max-w-[740px] grid gap-4 overflow-y-scroll md:pr-4 md:mr-1">
                {{-- Cars List --}}
                @foreach ($vehicles as $vehicle)
                    <div
                        class=" sm:hidden space-y-4 rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="relative mb-4 max-h-72 overflow-hidden rounded-md">
                            <!-- Carousel wrapper -->
                            <img src="{{ $vehicle->featuredImage('car.jpg') }}"
                                class="h-72 w-full object-cover rounded-md" alt="{{ $vehicle->name }}" />
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

                        <div>
                            <a href="{{ route('vehicles.show', $vehicle->id) }}"
                                class="text-lg capitalize font-semibold leading-tight text-gray-900 hover:underline dark:text-white">{{ $vehicle->name }}</a>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                                {{ $vehicle->rating }}</p>
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Mileage:
                                {{ json_decode($vehicle->details, true)['mileage'] }} km</span>

                            <div class="flex items-center justify-end gap-2">
                                <p class="text-xl leading-tight text-gray-900 dark:text-white">
                                    {{ $vehicle->human_price }}<span class="text-lg">/
                                        day</span></p>

                            </div>
                        </div>

                    </div>

                    <a href="{{ route('vehicles.show', $vehicle->id) }}"
                        class="flex my-2 border-1 rounded-lg border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

                        <div class="border-1 border-lg h-[176px] w-[291px]  relative">
                            <!-- Carousel wrapper -->
                            <img src="{{ $vehicle->featuredImage('car.jpg') }}"
                                class="h-full w-full object-cover rounded-l-md" alt="{{ $vehicle->name }}" />
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
                        <div class="w-2/3 p-2 h-full flex flex-col justify-between">
                            <div class="space-y-2 px-2 pb-2">
                                <h3 class="text-xl font-bold capitalize">{{ $vehicle->name }}</h3>

                                <div class="flex items-center">
                                    {{ $vehicle->rating }}
                                    <svg class="w-4 h-4 text-gray-800 dark:text-indigo-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                                      </svg>
                                </div>
                                <div class="text-xs flex items-cente -ml-1">
                                    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z"/>
                                      </svg>
                                      
                                    {{ $vehicle->location->pickup->city }}
                                </div>
                            </div>

                            <div class="flex justify-between gep-4 items-center p-2">

                                @if ($vehicle->on_sale)
                                    <div class="bg-green/.55 ">
                                        save
                                    </div>
                                @endif
                                <div class="flex font-semibold justify-end w-full items-baseline gap-2">
                                    @if ($vehicle->on_sale)
                                        <span class="line-through text-gray-600 dark:text-gray-400  text-sm">
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

                    </a>
                @endforeach
            </div>

            <div class="w-2/5 xl:w-[calc(100%-740px)]">

                <script src="https://maps.googleapis.com/maps/api/js?key={{ getGoogleMapKey() }}"></script>
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
                <div id="map" style="height: 100%; width: 100%;"></div>

                <script>
                    let openInfoWindow = null; // Track the currently open InfoWindow

                    function initMap() {
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 13,
                            center: {
                                lat: 4.8360,
                                lng: 7.0250
                            },
                        });

                        // Example vehicle data with image
                        var vehicles = @json($mapVehicles);

                        vehicles.forEach(vehicle => {
                            var marker = new google.maps.Marker({
                                position: {
                                    lat: vehicle.lat,
                                    lng: vehicle.lng
                                },
                                map: map,
                                icon: {
                                    url: '',
                                    scaledSize: new google.maps.Size(vehicle.price.length * 8.5, 28)
                                },
                                label: {
                                    text: `${vehicle.price}`,
                                    color: 'black',
                                    fontSize: '14px',
                                    fontWeight: 'bold',
                                    className: 'price-marker'
                                }
                            });

                            // InfoWindow content with HTML and inline styling
                            var infowindow = new google.maps.InfoWindow({
                                content: `<div style="width: 320px; height:320px; font-family: Arial, sans-serif;">
                                    <img src="${vehicle.image}" style="width: 100%; height: auto;" class="object-cover" alt="${vehicle.details}" />
                                    <div style="padding:0 20px 15px;">
                                        <h3 style="margin: 10px 0; font-size: 16px;">${vehicle.name}</h3>
                                        <p style="font-size: 12px; color: gray;">New listing • ${vehicle.host}</p>
                                        <p style="font-size: 12px; margin-bottom: 5px;">${vehicle.location}</p>
                                        <p style="color: green; font-size: 14px;">Save $${vehicle.price.dscount}</p>
                                        <p style="font-size: 14px;"><del>$${vehicle.price + vehicle.save}</del> <strong>$${vehicle.price}/day</strong></p>
                                    </div>
                                </div> `,
                            });

                            marker.addListener('click', function() {
                                // Close the currently open InfoWindow if it exists
                                if (openInfoWindow) {
                                    openInfoWindow.close();
                                }

                                // Open the clicked InfoWindow
                                infowindow.open(map, marker);

                                // Store the open InfoWindow globally
                                openInfoWindow = infowindow;
                            });
                        });
                        // Close popup when clicking elsewhere on the map
                        map.addListener('click', function() {
                            if (openInfoWindow) {
                                openInfoWindow.setMap(null);
                                openInfoWindow = null;
                            }
                        });
                    }

                    // Load the map
                    google.maps.event.addDomListener(window, 'load', initMap);
                </script>


            </div>

        </div>
        {{-- Pagination --}}
        <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0"
            aria-label="Table navigation">
            <div class="flex items-center space-x-3">
                <label for="rows" class="font-normal text-gray-500 dark:text-gray-400">Rows per
                    page</label>
                <select id="rows" wire:model.lazy="perPage"
                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block py-1.5 pl-3.5 pr-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <div class="font-normal text-gray-500 dark:text-gray-400">
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $vehicles->firstItem() }}</span>
                    -
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $vehicles->lastItem() }}</span>
                    of
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $vehicles->total() }}</span>
                </div>
            </div>
            <ul class="inline-flex items-stretch -space-x-px">
                <li>
                    @if ($vehicles->onFirstPage())
                        <span
                            class="flex w-20 items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 cursor-not-allowed dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Previous</span>
                    @else
                        <button wire:click="previousPage" wire:loading.attr="disabled"
                            class="flex w-20 items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</button>
                    @endif
                </li>
                <li>
                    @if ($vehicles->hasMorePages())
                        <button wire:click="nextPage" wire:loading.attr="disabled"
                            class="flex w-20 items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</button>
                    @else
                        <span
                            class="flex w-20 items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 cursor-not-allowed dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Next</span>
                    @endif
                </li>
            </ul>
        </nav>
    </div>
</section>
