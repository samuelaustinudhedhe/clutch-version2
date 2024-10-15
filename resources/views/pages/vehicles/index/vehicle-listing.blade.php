<div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
    {{-- Cars List --}}

    @foreach ($vehicles as $vehicle)
        <div
            class="space-y-4 rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <div class="relative mb-4 max-h-72 overflow-hidden rounded-md">
                <!-- Carousel wrapper -->
                <img src="{{ $vehicle->featuredImage('car') }}" class="h-72 object-cover rounded-md"
                    alt="{{ $vehicle->name }}" />
                <div class="absolute right-0 top-0 p-1 z-50">
                    <button type="button" data-tooltip-target="tooltip-add-to-favorites-9"
                        class="rounded p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only"> Add to Favorites </span>
                        <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
                        </svg>
                    </button>
                    <div id="tooltip-add-to-favorites-9" role="tooltip"
                        class="tooltip invisible absolute z-10 inline-block w-[132px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-600"
                        data-popper-placement="top">
                        Add to favorites
                        <div class="tooltip-arrow" data-popper-arrow=""></div>
                    </div>
                </div>
            </div>

            <div>
                <a href="{{ route('vehicles.show', $vehicle->id) }}"
                    class="text-lg capitalize font-semibold leading-tight text-gray-900 hover:underline dark:text-white">{{ $vehicle->name }}</a>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400 text-sm">
                    {{ $vehicle->rating }}</p>
            </div>

            <div class="flex items-center justify-between gap-4">
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Mileage:
                    {{ json_decode($vehicle->details, true)['mileage'] }} km</span>

                <div class="flex items-center justify-end gap-2">
                    <p class="text-2xl font-semibold leading-tight text-gray-900 dark:text-white">₦
                        {{ $vehicle->price->amount }}<span class="text-lg">/
                            day</span></p>

                </div>
            </div>

        </div>
    @endforeach
</div>