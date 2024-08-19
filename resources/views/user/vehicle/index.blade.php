<div class="max-w-screen-2xl m-auto">
    <x-div class="!py-6 flex justify-between items-center">
        <div class="flex items-center w-4/6 max-w-xl space-x-8 ">
            <h1 class="text-xl xl:text-2xl font-bold whitespace-nowrap">My Vehicles </h1>
            <div class=" w-full max-w-sm">
                <x-search wire:model="search" placeholder="Search vehicles..." />
            </div>
        </div>

        <div class="flex items-center justify-end space-x-8 ">
            <a href="{{ route('user.vehicles.create') }}" type="button"
                class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Add vehicle
            </a>

        </div>

    </x-div>
    <div class="container mx-auto p-6">
        <!-- Vehicle Listing -->
        <!-- Vehicle Card -->
        @isset($vehicles)

            <div class="flex items-center justify-center">
                <div class="grid space-y-6 text-center">
                    <img src="/assets/images/placeholders/985e307e72.png" alt="Placeholder Image" class="mx-auto max-w-sm">
                    <p class="text-gray-600 mt-8 dark:text-gray-300">No vehicles found.</p>
                    <p class="text-gray-600 mt-8 dark:text-gray-300">List a Vehicle and start earing form Africa's
                        largest vehicle sharing
                        marketplace.</p>

                    <x-button href="{{ route('user.vehicles.create') }}" class="mx-auto">List your Vehicle</x-button>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($vehicles as $vehicle)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <img class="w-full h-48 object-cover" src="{{ $vehicle->attachment }}" alt="Vehicle Image">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">Toyota Camry</h3>
                            <p class="text-gray-600 dark:text-gray-400">Model: LE</p>
                            <p class="text-gray-600 dark:text-gray-400">Year: 2020</p>
                            <p class="text-gray-900 dark:text-gray-100 font-bold">$22,000</p>
                            <div class="mt-4 flex justify-between items-center">
                                <a href="#" class="text-blue-500 dark:text-blue-400 hover:underline">Edit</a>
                                <a href="#" class="text-red-500 dark:text-red-400 hover:underline">Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @endempty

    </div>
</div>
