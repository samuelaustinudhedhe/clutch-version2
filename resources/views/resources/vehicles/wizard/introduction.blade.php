<div>



    <div class="flex items-center justify-center mt-20">
        <div class="grid space-y-6 text-center">
            <img src="/assets/images/placeholders/985e307e72.png" alt="Placeholder Image"
                class="mx-auto max-w-[200px] min-w-[150px]">
            <p class="text-gray-600 mt-8 dark:text-gray-300"> Welcome to Admin Vehicle Wizard .</p>


        </div>
    </div>

    {{-- <div class="max-w-screen-2xl m-auto flex flex-col min-h-screen">
        <x-div class="lg:flex justify-between items-center lg:mx-6 mx-2 !py-4 lg:!py-6 space-y-4 lg:space-y-0">
            <div class="flex items-center lg:max-w-28 w-full">
                <h1 class="text-xl xl:text-2xl font-bold whitespace-nowrap">My Vehicles</h1>
            </div>

            <div class="sm:flex items-center lg:justify-end lg:w-4/6 w-full sm:space-y-0 space-y-4  sm:space-x-6">
                <div class="w-full lg:max-w-lg">
                    <x-search wire:model.live="search" placeholder="Search vehicles..." />
                </div>
                <a href="{{ route('user.vehicles.wizard') }}" type="button"
                    class="flex items-center justify-center min-w-36 px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <svg class="h-3.5 w-3.5 sm:mr-2" fill="currentColor" viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Add vehicle
                </a>
            </div>
        </x-div>
        <div class="flex-grow mx-auto p-6">
            <!-- Vehicle Listing -->
            <!-- Vehicle Card -->
            @if ($storeAllData)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($storeAllData as $index => $vehicle)
                        <a wire:click="selectVehicle({{ $index }})"
                            class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                            <img class="w-full h-48 object-cover"
                                src="{{ !empty($vehicle['images']) ? $vehicle['images'][$vehicle['featured_image_index'] ?? 0] : getPlaceHolder('car.jpg') }}"
                                alt="Vehicle Image">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">
                                    {{ ($vehicle['details']['make'] ?? 'Unknown Make') . ' ' . ($vehicle['details']['model'] ?? 'Unknown Model') . ' ' . ($vehicle['details']['year'] ?? 'Unknown Year') }}
                                </h3>
                                <p class="text-gray-600 dark:text-gray-400">Pickup:
                                    {{ formatAddress($vehicle['location']['pickup'] ?? [], 'street, city, state,') }}
                                </p>
                                <p class="text-gray-600 dark:text-gray-400">Insurance:
                                    {{ $vehicle['document']['insurance']['status'] ?? 'Invalid' }}</p>
                                <p class="text-gray-900 dark:text-gray-100 font-bold">
                                    {{ $vehicle['price']['amount'] ?? 'N/A' }}</p>
                            </div>
                            
                        </a>
                    @endforeach
                </div>
            @else
                <div class="flex items-center justify-center">
                    <div class="grid space-y-6 text-center">
                        <img src="/assets/images/placeholders/985e307e72.png" alt="Placeholder Image"
                            class="mx-auto max-w-[200px] min-w-[150px]">
                        <p class="text-gray-600 mt-8 dark:text-gray-300">No vehicles found.</p>
                        <p class="text-gray-600 mt-8 dark:text-gray-300">List a Vehicle and start earning from Africa's
                            largest vehicle sharing marketplace.</p>
                        <x-button href="{{ route('user.vehicles.wizard') }}" class="mx-auto">List your
                            Vehicle</x-button>
                    </div>
                </div>
            @endif
        </div>

        {{ $vehicles->links('vendor.pagination.simple') }}
    </div> --}}

</div>
