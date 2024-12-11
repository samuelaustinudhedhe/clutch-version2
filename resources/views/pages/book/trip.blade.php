<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">

    @if (isset($trip) && isset($trip->days) && isset($vehicle))
        <form action="#" class="mx-auto max-w-screen-xl px-4 2xl:px-0" wire:submit.prevent="initializePayment">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Checkout</h2>

            <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-6 space-y-6 lg:space-y-0">
                <div class="min-w-0 flex-1 space-y-6">
                    {{-- Vehicle Details --}}
                    <x-div class="!my-0 gap-6 space-y-4">
                        {{-- Featured Image --}}
                        <div class="relative">
                            <img src="{{ $vehicle->featured_image_url }}"
                                class="rounded  min-w-80 w-full min-h-44 h-full max-h-96 object-cover" width="220px"
                                height="180px" alt="{{ $vehicle->name }} image" />
                            <div class="flex items-center gap-4 absolute bottom-0 left-0 p-2 rounded-tr-lg">
                                <div class="relative w-16 h-16 ">
                                    <img class="w-16 h-16 rounded-full border border-gray-200 shadow-sm dark:border-gray-700"
                                        src="{{ $vehicle->owner->profile_photo_url }}"
                                        alt="{{ $vehicle->owner->name . 'Photo' }}">
                                    <div
                                        class="flex items-center space-x-1 absolute bottom-0 left-1/2 transform -translate-x-1/2">
                                        <span
                                            class="flex bg-white dark:bg-gray-800 rounded text-xs border border-gray-200 shadow-sm dark:border-gray-700 px-[6px] py-[1px] gap-1">
                                            {{ $vehicle->owner->rating }}
                                            <svg class="w-3 h-3 dark:text-indigo-400 text-indigo-800" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" viewBox="0 0 22 22">
                                                <path
                                                    d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full min-w-0 flex-1 space-y-4 md:max-w-md ">
                            <a href="{{ route('vehicles.show', $vehicle->id) }}" target="_blank"
                                class="!text-xl font-medium text-gray-900 dark:text-white hover:underline">{{ $vehicle->name }}</a>
                        </div>

                        @if ((isset($vehicle->rating) && $vehicle->rating > 0) || (isset($vehicle->trips_count) && $vehicle->trips_count > 0))
                            <div class="inline-flex items-baseline text-xl">
                                @if (isset($vehicle->rating) && $vehicle->rating > 0)
                                    <span class="flex items-center !text-[21px] font-semibold"
                                        title="This is not the actual rating for your vehicle">{{ $vehicle->rating }}
                                        <svg class="w-5 h-5 ml-1 text-gray-800 dark:text-indigo-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                        </svg>
                                    </span>
                                @endif
                        
                                @if (isset($vehicle->trips_count) && $vehicle->trips_count > 0)
                                    <span class="ml-2" title="Trips Taken">({{ $vehicle->trips_count }} trips)</span>
                                @endif
                            </div>
                        @endif

                        <x-devider class="!opacity-70 " />

                        {{-- Trip Details  --}}
                        <div class="flex justify-between items-center px-2">

                            <div>
                                <p class="text-lg font-bold ">
                                    {{ $trip->start->humanized_date ?? now()->format('D, M d ') }}</p>
                                {{ $trip->start->time ?? now()->format('g:i A') }}
                            </div>
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M16.153 19 21 12l-4.847-7H3l4.848 7L3 19h13.153Z" />
                            </svg>
                            <div class="text-right">
                                <p class="text-lg font-bold ">
                                    {{ $trip->end->humanized_date ?? now()->addDays(1)->format('D, M d ') }}</p>
                                {{ $trip->end->time ?? now()->addDays(1)->format('g:i A') }}
                            </div>


                        </div>
                        <x-devider class="!opacity-70 " />

                        <div>
                            <p>Meeting Location </p>
                            <p>{{ $trip->location->pickup->full ?? $vehicle->location->pickup->full }}</p>

                        </div>

                        {{-- Check if trip Has Booking Days --}}
                        @isset($trip->days)
                            <div class="flex flex-nowrap items-baseline gap-2">
                                @if ($vehicle->on_sale)
                                    <span class="text-2xl ">{{ $vehicle->human_sale_price }}</span>
                                @else
                                    <span class="text-2xl ">{{ $vehicle->human_price }}</span>
                                @endif
                                x {{ countDays($trip->days ?? 0) }}
                            </div>
                        @endisset

                    </x-div>


                    {{-- 
                    <x-accordion id="checlout-accordion">
                        <x-accordion-item id="checlout-accordion-item-2">
                            <x-slot name="title">
                                <h3 class="text-xl">Your insurance info (optional)</h3>
                            </x-slot>

                            <x-slot name="content">

                            </x-slot>
                        </x-accordion-item>
                    </x-accordion> --}}

                </div>

                <div class="w-full space-y-4 sm:space-y-6 lg:max-w-lg">

                    {{-- Protection Plan --}}
                    <x-div class="space-y-4 !my-0">
                        <h3 class="text-xl font-medium">Protection Plan</h3>
                        <p>
                            Protrction plan keeps you covered while pinching some penalties.
                        </p>
                    </x-div>

                    {{-- Order Summary --}}
                    <x-div>
                        <p class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Order summary</p>

                        <div class="space-y-4">
                            <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Price
                                    </dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">
                                        {{ $vehicle->human_price }}</dd>
                                </dl>
                                @if ($vehicle->discount() > 0)
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Savings</dt>
                                        <dd class="text-base font-medium text-green-500">-
                                            {{ $vehicle->human_discounted_price }}</dd>
                                    </dl>
                                @endif
                                @isset($trip->days)
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">
                                            {{ $vehicle->calcTotalTax($trip->days) }}</dd>
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Days</dt>
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">
                                            x {{ $trip->days }}</dd>
                                    </dl>
                                @endisset
                            </div>

                            {{-- Check if trip Has Booking Days --}}
                            @isset($trip->days)
                                {{-- Total price --}}

                                <dl
                                    class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                    <dd class="text-base font-bold text-gray-900 dark:text-white">
                                        {{ $vehicle->calcTotalPrice($trip->days, true) }}</dd>
                                </dl>
                            @endisset
                        </div>
                    </x-div>

                    <x-div class="my-4">
                        <p>Your will be able to message {{ $vehicle->owner->name ?? 'the owner' }} after checkout</p>

                        <div class="flex items-center mt-6">
                            <input id="i-agree" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                required />
                            <label for="i-agree" class="ms-3.5 text-sm ">
                                I agree to pay the total shown and to the <x-a href="/policies/terms/">Clutch's
                                    Terms</x-a> of Service and <x-a href="/policies/cancellation/">Cancellation
                                    Policy</x-a>
                            </label>
                        </div>
                        {{-- Check if trip Has Booking Days --}}
                        @isset($trip->days)
                            <x-devider class="opacity-50 my-8" />

                            {{-- Continue Button --}}
                            <div class="gap-6 ">
                                <button type="submit"
                                    class="mb-2 me-2 flex w-full items-center justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Continue
                                    to Paystack</button>

                                <div class="flex items-center justify-center gap-2">
                                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>
                                    <a href="{{ route('vehicles.index') }}" title="Cancle Trip"
                                        class="inline-flex items-center gap-1 text-sm font-medium text-amber-700 underline hover:no-underline dark:text-amber-500">
                                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 12h14m-14 0 4-4m-4 4 4 4" />
                                        </svg>
                                        Return to Vehicles
                                    </a>
                                </div>
                            </div>
                        @endisset
                    </x-div>
                </div>
            </div>
        </form>
        {{-- Check if vehicle is set but No trip is Booked --}}
    @elseif(isset($vehicle) && !isset($trip->days))
        <div class="text-center max-w-md mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <svg class="w-16 h-16 mx-auto text-red-500 mb-4" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Booking Error</h1>
            <p class="text-lg font-medium text-gray-600 dark:text-gray-300 mb-6">
                There was an error getting your booking details. Please try booking again.
            </p>
            <a href="{{ route('vehicles.show', ['vehicle' => $vehicle->id]) }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                    </path>
                </svg>
                ReBook?
            </a>
        </div>
    @else
        <div class="text-center">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">No Vehicle Selected</h1>
            <p class="text-lg font-medium text-gray-500 dark:text-gray-400">Please select a vehicle from the list to
                proceed.</p>
        </div>
    @endif

</section>
