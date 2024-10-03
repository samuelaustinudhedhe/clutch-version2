<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
    <form action="#" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Checkout</h2>

        <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-6 space-y-6 lg:space-y-0">
            <div class="min-w-0 flex-1 space-y-6">

                <x-div class="space-y-4 !my-0">
                    <h3 class="text-xl font-medium">Protection Plan</h3>
                    <p>
                        Protrction plan keeps you covered while pinching some penalties.
                    </p>
                </x-div>

                <x-accordion id="checlout-accordion">
                    <x-accordion-item id="checlout-accordion-item-2">
                        <x-slot name="title">
                            <h3 class="text-xl">Your insurance info (optional)</h3>
                        </x-slot>

                        <x-slot name="content">

                        </x-slot>
                    </x-accordion-item>
                </x-accordion>

                <x-accordion id="payment-accordion">
                    <x-accordion-item id="payment-accordion-item-2">
                        <x-slot name="title">
                            <h3 class="text-xl">Payment Information</h3>
                        </x-slot>

                        <x-slot name="content">
                            <div class="space-y-4 py-5">
                                <div
                                    class="flex items-center justify-between rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-600 dark:bg-gray-700">
                                    <div>
                                        <div class="flex items-start">
                                            <div class="flex h-5 items-center">
                                                <input id="visa" aria-describedby="visa-text" type="radio"
                                                    name="payment-method" value=""
                                                    class="h-4 w-4 border-gray-300 bg-white text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                                    checked />
                                            </div>

                                            <div class="ms-4 text-sm">
                                                <label for="visa" class="font-medium text-gray-900 dark:text-white">
                                                    Visa ending in 7658 </label>
                                                <p id="visa-text"
                                                    class="text-xs font-normal text-gray-500 dark:text-gray-400">Expiry
                                                    10/2024</p>
                                            </div>
                                        </div>

                                        <div class="mt-4 flex items-center gap-2">
                                            <button type="button"
                                                class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Delete</button>

                                            <div class="h-3 w-px shrink-0 bg-gray-200 dark:bg-gray-500"></div>

                                            <button type="button"
                                                class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Edit</button>
                                        </div>
                                    </div>

                                    <div class="shrink-0">
                                        <img class="h-8 w-auto dark:hidden"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/visa.svg"
                                            alt="" />
                                        <img class="hidden h-8 w-auto dark:flex"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/visa-dark.svg"
                                            alt="" />
                                    </div>
                                </div>
                                <div
                                    class="flex items-center justify-between rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-600 dark:bg-gray-700">
                                    <div>
                                        <div class="flex items-start">
                                            <div class="flex h-5 items-center">
                                                <input id="mastercard" aria-describedby="mastercard-text" type="radio"
                                                    name="payment-method" value=""
                                                    class="h-4 w-4 border-gray-300 bg-white text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                                            </div>

                                            <div class="ms-4 text-sm">
                                                <label for="mastercard"
                                                    class="font-medium text-gray-900 dark:text-white"> Mastercard ending
                                                    in 8429 </label>
                                                <p id="mastercard-text"
                                                    class="text-xs font-normal text-gray-500 dark:text-gray-400">Expiry
                                                    04/2026</p>
                                            </div>
                                        </div>

                                        <div class="mt-4 flex items-center gap-2">
                                            <button type="button"
                                                class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Delete</button>

                                            <div class="h-3 w-px shrink-0 bg-gray-200 dark:bg-gray-500"></div>

                                            <button type="button"
                                                class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Edit</button>
                                        </div>
                                    </div>

                                    <div class="shrink-0">
                                        <img class="h-8 w-auto dark:hidden"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/mastercard.svg"
                                            alt="" />
                                        <img class="hidden h-8 w-auto dark:flex"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/mastercard-dark.svg"
                                            alt="" />
                                    </div>
                                </div>
                                <div
                                    class="flex items-center justify-between rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-600 dark:bg-gray-700">
                                    <div>
                                        <div class="flex items-start">
                                            <div class="flex h-5 items-center">
                                                <input id="paypal" aria-describedby="paypal-text" type="radio"
                                                    name="payment-method" value=""
                                                    class="h-4 w-4 border-gray-300 bg-white text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                                            </div>

                                            <div class="ms-4 text-sm">
                                                <label for="paypal" class="font-medium text-gray-900 dark:text-white">
                                                    Paypal account </label>
                                            </div>
                                        </div>

                                        <div class="mt-4 flex items-center gap-2">
                                            <button type="button"
                                                class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Delete</button>

                                            <div class="h-3 w-px shrink-0 bg-gray-200 dark:bg-gray-500"></div>

                                            <button type="button"
                                                class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Edit</button>
                                        </div>
                                    </div>

                                    <div class="shrink-0">
                                        <img class="h-8 w-auto dark:hidden"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/paypal.svg"
                                            alt="" />
                                        <img class="hidden h-8 w-auto dark:flex"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/brand-logos/paypal-dark.svg"
                                            alt="" />
                                    </div>
                                </div>

                                <button type="button"
                                    class="flex w-full items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 12h14m-7 7V5" />
                                    </svg>
                                    Add new payment method
                                </button>
                            </div>
                        </x-slot>
                    </x-accordion-item>
                </x-accordion>

            </div>

            <div class="w-full space-y-4 sm:space-y-6 lg:max-w-lg">

                <x-div class="!my-0 gap-6 space-y-4">
                    {{-- Featured Image --}}
                    <div class="relative">
                        <img src="{{ $vehicle->featuredImage('car.jpg') }}"
                            class="rounded  min-w-80 w-full min-h-44 h-full  object-cover" width="220px"
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

                    <div class="inline-flex items-baseline text-xl">
                        {{ $vehicle->rating ?? '0' }}
                        <svg class="w-4 h-4 text-indigo-600 dark:text-indigo-600" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 22">
                            <path
                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                        </svg>
                        <span class="ml-2 text-sm leading-8 ">({{ '5 trips' }})</span>
                    </div>

                    <x-devider class="!opacity-70 " />

                    {{-- Trip Details  --}}
                    <div class="flex justify-between items-center px-2">

                        <div>
                            <p class="text-lg font-bold ">{{ $trip->start->humanized_date ?? now()->format('D, M d ') }}</p>
                            {{ $trip->start->time ?? now()->format('g:i A') }}
                        </div>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M16.153 19 21 12l-4.847-7H3l4.848 7L3 19h13.153Z" />
                        </svg>
                        <div class="text-right">
                            <p class="text-lg font-bold ">{{ $trip->end->humanized_date ?? now()->addDays(1)->format('D, M d ') }}</p>
                            {{ $trip->end->time ?? now()->addDays(1)->format('g:i A') }}
                        </div>


                    </div>
                    <x-devider class="!opacity-70 " />

                    <div>
                        <p>Meeting Location </p>
                        <p>{{ $trip->location->pickup->full ?? $vehicle->location->pickup->full }}</p>

                    </div>

                    <div class="flex flex-nowrap items-baseline gap-2">
                        @if ($vehicle->on_sale)
                            <span class="text-2xl ">{{ $vehicle->human_sale_price }}</span>
                        @else
                            <span class="text-2xl ">{{ $vehicle->human_price }}</span>
                        @endif
                        x {{ ($trip->days > 1) ? $trip->days . ' days' : $trip->days . ' day' }}
                    </div>

                </x-div>

                {{-- Order Summary --}}
                <x-div>
                    <p class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Order summary</p>

                    <div class="space-y-4">
                        <div class="space-y-2">
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Original price</dt>
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

                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">{{ $vehicle->calcTotalTax($trip->days) }}</dd>
                            </dl>
                        </div>

                        <dl
                            class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                            <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                            <dd class="text-base font-bold text-gray-900 dark:text-white">
                                {{ $vehicle->calcTotalPrice($trip->days,true) }}</dd>
                        </dl>
                    </div>
                </x-div>

                <x-div class="my-4">
                    <p>Your will be able to message {{ $vehicle->owner->name ?? 'the owner' }} after checkout</p>

                    <div class="flex items-center mt-6">
                        <input id="i-agree" type="checkbox"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                            required />
                        <label for="i-agree" class="ms-3.5 text-sm ">
                            I agree to pay the total shown and to the  <x-a href="/policies/terms/">Clutch's Terms</x-a> of Service and <x-a
                                href="/policies/cancellation/">Cancellation Policy</x-a>
                        </label>
                    </div>

                    <x-devider class="opacity-50 my-8" />

                    {{-- Continue Button --}}
                    <div class="gap-6 ">
                        <button type="submit"
                            class="mb-2 me-2 flex w-full items-center justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Continue
                            to payment</button>

                        <div class="flex items-center justify-center gap-2">
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>
                            <a href="{{ route('vehicles.index') }}" title="Cancle Trip"
                                class="inline-flex items-center gap-1 text-sm font-medium text-amber-700 underline hover:no-underline dark:text-amber-500">
                                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 12h14m-14 0 4-4m-4 4 4 4" />
                                </svg>                                
                                Return to Vheicles
                            </a>
                        </div>
                    </div>
                </x-div>
            </div>
        </div>
    </form>
</section>
