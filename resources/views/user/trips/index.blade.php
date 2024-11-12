<div class="h-full flex flex-col items-center justify-start max-w-screen-2xl m-auto min-h-screen space-y-4 lg:space-y-6 px-4 mb-4 lg:mb-6 lg:mx-6">

    {{-- Do your work, then step back. --}}
    <x-div class=" w-full lg:flex justify-between items-center !py-4 lg:!py-6 space-y-4 my-0 lg:space-y-0">
        <div class="flex items-center lg:max-w-28 w-full">
            <h1 class="text-xl xl:text-2xl font-bold whitespace-nowrap">My Trips</h1>
        </div>

        <div class="sm:flex items-center lg:justify-end lg:w-4/6 w-full sm:space-y-0 space-y-4  sm:space-x-6">
            <div class="w-full lg:max-w-lg">
                <x-search wire:model.live="search" placeholder="Search trips..." />
            </div>
            <a href="{{ route('vehicles.index') }}" type="button"
                class="flex items-center justify-center min-w-36 px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <svg class="h-3.5 w-3.5 sm:mr-2" fill="currentColor" viewbox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Book a Trip
            </a>
        </div>
    </x-div>

    @if (!empty($trips))
        <div class="w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach ($trips as $trip)
                <a href="{{ route('user.trips.show', $trip->id) }}" target="_blank"
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                    <img class="w-full h-48 object-cover" src="{{ $trip->vehicle->featured_image->url }}"
                        alt="Vehicle Image">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $trip->vehicle->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">Drop Off:
                            {{ formatAddress($trip->vehicle->location->drop_off, 'street, city, state,') }}</p>
                        <p class="text-gray-600 dark:text-gray-400">Insurance:
                            {{ $trip->vehicle->document->insurance->status ?? 'Invalid' }}</p>
                    </div>
                    <x-loading-bar start="{{ $trip->details->start->timestamp }}" end="{{ $trip->details->end->timestamp }}" />
                </a>
            @endforeach
        </div>
    @else
        <div class="flex items-center justify-center my-10 mt-20 ">
            <div class="grid space-y-6 text-center">
                <img src="/assets/images/placeholders/985e307e72.png" alt="Placeholder Image" class="mx-auto max-w-sm">
                <p class="text-gray-600 mt-8 dark:text-gray-300">You have no trips planned.</p>
                <p class="text-gray-600 mt-8 dark:text-gray-300">Explore Africa's largest vehicle sharing marketplace
                    and book your next trip</p>
                <x-button class="mx-auto">Book a trip</x-button>
            </div>
        </div>
    @endif

    {{ $trips->links('vendor.pagination.simple') }}

</div>