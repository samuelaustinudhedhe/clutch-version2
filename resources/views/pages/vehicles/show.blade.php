<div class="max-w-screen-xl m-auto">

    {{-- Gallery Section --}}
    <x-carousel :images="$vehicle->gallery->sortByDesc('is_featured')" />
        
    {{-- Content Section --}}
    <div class="mx-2 2xl:mx-0 mt-4 md:mt-4 xl:mt-5">
        <div class="flex flex-wrap md:flex-nowrap gap-4">

            {{-- Right --}} 
            <x-div class="w-full md:w-3/5 order-1 !my-0">
                <div class="hidden md:block mb-8">
                    @include('pages.vehicles.show.name')
                </div>
                @include('pages.vehicles.show.basic-details', ['vehicle' => $vehicle])
                {{-- Host --}}
                @include('pages.vehicles.show.host', ['vehicle' => $vehicle])
            </x-div>
            {{-- Left --}}
            <x-div class="w-full md:w-2/5 order-first md:order-2 !my-0">
                <div class="md:hidden mb-4">
                    @include('pages.vehicles.show.name')
                </div>
                <div class="flex flex-nowrap items-baseline gap-2">
                    @if ($vehicle->on_sale)
                        <span class=" text-lg line-through opacity-60">{{ $vehicle->human_price }}</span>
                        <span class="text-xl sm:text-2xl font-semibold">{{ $vehicle->human_sale_price }}</span>
                    @else
                        <span class="text-xl sm:text-2xl font-semibol">{{ $vehicle->human_price }}</span>
                    @endif
                    / day
                </div>

                <p class="text-xs hover:underline font-light mt-2">The discount is applied if the vehicle is rented for
                    <span class="font-bold"> {{ countDays($vehicle->discount_days) }} </span> or more
                </p>
                <x-devider />
                <form wire:submit.prevent="bookTrip" class="grid grid-col-1 space-y-6">
                    <div class="grid">
                        <x-label for="start_time" class="text-sm">Pickup Date</x-label>
                        <div class="flex w-full gap-4">
                            {{-- Pickup Date --}}
                            <x-date id="start" wire:model="trip.start.date" class="w-2/3"
                                datepicker-min-date="{{ now()->format('m/d/Y') }}" loadJS="true" />
                            {{-- Pickup Time --}}
                            <x-select class="!w-1/3" wire:model="trip.start.time" :loadJS="true" title="- Pickup Time -" selected="10:00 AM">
                                @foreach ($times as $time)
                                        <option value="{{ $time }}">{{ $time }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="trip.start.date" class=" mt-2" />
                        <x-input-error for="trip.start.time" class=" mt-2" />
                    </div>
                    <div class="grid">
                        <x-label for="end_time" class="text-sm">Drop-off Date</x-label>
                        <div class="flex w-full gap-4 mb-2">
                            {{-- Drop-off Date --}}
                            <x-date id="end" wire:model="trip.end.date" class="w-2/3"
                                datepicker-min-date="{{ now()->addDay()->format('m/d/Y') }}" loadJS=true />
                            {{-- Drop-off Time --}}
                            <x-select class="!w-1/3" wire:model="trip.end.time" title="- Drop-off Time -" selected="10:00 AM">
                                @foreach ($times as $time)
                                        <option value="{{ $time }}">{{ $time }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="trip.end.date" class=" mt-2" />
                        <x-input-error for="trip.end.time" class=" mt-2" />
                    </div>

                    
                    <x-button wire:click="bookTrip" class="flex justify-center !font-light">
                        Continue
                    </x-button>
                </form>
            </x-div>

        </div>
        
        {{-- Description --}}
        {{-- Details --}}
        <x-accordion id="description-accordion" class="block" accordion="open">
            <x-accordion-item id="description-accordion-item-1">
                <x-slot name="title">
                    <h3 class="text-xl">Description</h3>
                </x-slot>

                <x-slot name="content">
                    {{ $vehicle->description }}
                </x-slot>
            </x-accordion-item>

            <x-accordion-item id="description-accordion-item-2">
                <x-slot name="title">
                    <h3 class="text-xl">Features</h3>
                </x-slot>

                <x-slot name="content">
                    <div class="columns-2 md:columns-3 gap-4 space-y-4">
                        @foreach (['safety', 'security', 'exterior', 'interior', 'engine', 'transmission'] as $key)
                            <div
                                class="break-inside-avoid p-4 rounded-lg border border-gray-100 bg-gray-50 dark:border-gray-700 dark:bg-gray-800">
                                <!-- Section Header -->
                                <h4 class="text-base font-semibold text-gray-900 dark:text-white capitalize">
                                    {{ str_replace('_', ' ', $key) }}
                                </h4>

                                <!-- Dynamically Display Each Section's Content -->
                                <div class="mt-2 divide-y divide-gray-200 dark:divide-gray-700 dark:border-gray-800">
                                    @foreach ($vehicle->getDetails()->$key as $item => $value)
                                        <dl class="flex items-center justify-between gap-4 py-2">
                                            <dt
                                                class="text-sm font-medium text-gray-500 dark:text-gray-400 capitalize">
                                                {{ str_replace('_', ' ', $item) ?? '' }}
                                            </dt>
                                            <dd class="text-sm font-normal text-gray-900 dark:text-white capitalize">
                                                {{ str_replace('-', ', ', $value) ?? '' }}
                                            </dd>
                                        </dl>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-slot>
            </x-accordion-item>
        </x-accordion>
    </div>
</div>
