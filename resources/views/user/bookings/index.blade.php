<div class="max-w-screen-2xl m-auto flex flex-col min-h-screen space-y-4 lg:space-y-6 px-4 mb-4 lg:mb-6 lg:mx-6">
    <x-div class="lg:flex justify-between items-center !py-4 lg:!py-6 space-y-4 my-0 lg:space-y-0">
        <div class="flex items-center lg:max-w-28 w-full">
            <h1 class="text-xl xl:text-2xl font-bold whitespace-nowrap">Bookings</h1>
        </div>

        <div class="sm:flex items-center lg:justify-end lg:w-4/6 w-full sm:space-y-0 space-y-4 sm:space-x-6">
            <div class="w-full lg:max-w-lg">
                <x-search wire:model.live="search" placeholder="Search bookings..." />
            </div>
            <a href="{{ route('user.bookings.create') }}" type="button"
                class="flex items-center justify-center min-w-36 px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <svg class="h-3.5 w-3.5 sm:mr-2" fill="currentColor" viewbox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Add Booking
            </a>
        </div>
    </x-div>

    <div class="">
        <!-- Booking Listing -->
        @if ($bookings->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @foreach ($bookings as $vehicle)
                    @foreach ($vehicle->trips as $trip)
                        <a href="{{ route('user.bookings.show', $trip->id) }}" target="_blank"
                            class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                            <x-img :src="$trip->vehicle->featured_image->url" alt="Vehicle Image" class="w-full h-64 object-cover" />
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">{{ $trip->name }}</h3>
                                <p class="text-gray-600 dark:text-gray-400">Pickup Date:
                                    {{ date('d, M Y h:i A', $trip->details->start->timestamp) }}</p>
                                <p class="text-gray-600 dark:text-gray-400">Return Date:
                                    {{ date('d, M Y h:i A', $trip->details->end->timestamp) }}</p>
                                <p class="text-lg text-gray-900 dark:text-gray-100 font-bold">
                                    {{ humanizePrice($trip->details->price->total) }}</p>
                            </div>
                            <div class="flex flex-nowrap items-center justify-center w-full gap-4 p-4 pt-0">
                                <span>Start</span>
                                    <x-loading-bar start="{{ $trip->details->start->timestamp }}" end="{{ $trip->details->end->timestamp }}" />
                                <span>End</span>
                            </div>

                        </a>
                    @endforeach
                @endforeach
            </div>
        @else
            <div class="flex items-center justify-center">
                <div class="grid space-y-6 text-center">
                    <img src="/assets/images/placeholders/985e307e72.png" alt="Placeholder Image"
                        class="mx-auto max-w-[200px] min-w-[150px]">
                    <p class="text-gray-600 mt-8 dark:text-gray-300">No bookings found.</p>
                    <p class="text-gray-600 mt-8 dark:text-gray-300">Make a booking and start your journey with us.</p>
                    <x-button href="{{ route('user.bookings.create') }}" class="mx-auto">Make a Booking</x-button>
                </div>
            </div>
        @endif
    </div>

    {{-- Pagination --}}
    {{ $bookings->links('vendor.pagination.simple') }}
</div>
