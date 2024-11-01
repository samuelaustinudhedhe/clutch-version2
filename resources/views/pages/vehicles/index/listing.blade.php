<div class="w-full overflow-hidden lg:overflow-y-auto lg:px-4 lg:mr-1 2xl:pl-0 lg:min-h-[calc(100%-148px)]">
    @foreach ($vehicles as $vehicle)
        <a href="{{ route('vehicles.show', $vehicle->id) }}">
            <x-div class="max-md:mx-2 max-lg:mx-4 md:flex rounded-lg !p-0 overflow-hidden">

                <div class="w-full md:h-[176px] md:w-[291px]  relative">
                    <x-img src="{{ $vehicle->featured_image_url }}" class="h-full max-h-96 w-full object-cover "
                        alt="{{ $vehicle->name }}" />
                    <div class="absolute right-0 top-0 p-1">
                        <button type="button" data-tooltip-target="tooltip-add-to-favorites-9"
                            class="rounded p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only"> Add to Favorites </span>
                            <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
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

                <div class="w-full md:w-2/3 p-2 flex flex-col justify-between">
                    <div class="space-y-2 px-2 pb-2">
                        <h3 class="md:text-xl font-normal capitalize">{{ $vehicle->name }}</h3>

                        <div class="flex items-center">
                            {{ $vehicle->rating }}
                            <svg class="w-4 h-4 text-gray-800 dark:text-indigo-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                            </svg>
                        </div>
                        <div class="text-xs flex items-cente -ml-1">
                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
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
                            <div class="min-w-fit text-[10px] px-1 py-0.5 rounded bg-green-200 dark:bg-green-700 ">
                                Save {{ $vehicle->human_discounted_price }}
                            </div>
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
    
    @if($vehicles->isEmpty())
        @include('pages.vehicles.index.no-results')
    @endif
</div>
