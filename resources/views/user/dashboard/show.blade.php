<x-user-layout>
    <div class="mx-auto max-w-screen-2xl px-4 2xl:px-0">
        <h2 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl md:mb-6">General overview
        </h2>
        <div class="grid grid-cols-4 gap-4">
            <div
                class="col-span-4 grid gap-4 rounded-lg border border-gray-200 bg-white p-4 py-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:grid-cols-2 md:p-6 xl:grid-cols-4">
                <div class="flex space-x-4">
                    <img class="h-16 w-16 rounded-lg" src="{{ $user->profile_photo_url }}"
                        alt="{{ $user->name }} photo" />
                    <div>
                        <span
                            class="mb-2 inline-block rounded bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                            {{ $user->role }} </span>
                        <h2
                            class="flex items-center text-xl font-bold leading-none text-gray-900 dark:text-white sm:text-2xl">
                            {{ $user->name }}</h2>
                    </div>
                </div>
                <dl>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Email</dt>
                    <dd class="text-gray-500 dark:text-gray-400">{{ $user->email }}</dd>

                </dl>
                <dl>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Address
                    </dt>
                    <dd class="text-gray-500 dark:text-gray-400">{{ $user->address->home->full?? 'add an address' }}</dd>

                </dl>
                <dl>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Phone</dt>
                    <dd class="text-gray-500 dark:text-gray-400">
                        @if($user->humanized_home_phone || $user->humanized_work_phone)
                            {{ $user->humanized_work_phone ? $user->humanized_home_phone . ' / ' . $user->humanized_work_phone : $user->humanized_home_phone }}
                        @else
                            Add a phone number
                        @endif
                    </dd>
                </dl>
            </div>
            <div
                class="col-span-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:col-span-2 sm:p-6 lg:col-span-1">
                <div
                    class="mb-2 flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-400">
                    <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">{{ $user->orders->count() ?? 0 }} orders
                    </h2>
                    <p class="text-gray-500 dark:text-gray-400">in the last 90 days</p>
                </div>
            </div>
            <div
                class="col-span-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:col-span-2 sm:p-6 lg:col-span-1">
                <div
                    class="mb-2 flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-400">
                    <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">{{ $user->trips->count() ?? 0 }} Trips
                        Booked</h2>
                    <p class="text-gray-500 dark:text-gray-400">in the last 90 days</p>
                </div>
            </div>
            <div
                class="col-span-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:col-span-2 sm:p-6 lg:col-span-1">
                <div
                    class="mb-2 flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-400">
                    <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2"
                            d="M11.083 5.104c.35-.8 1.485-.8 1.834 0l1.752 4.022a1 1 0 0 0 .84.597l4.463.342c.9.069 1.255 1.2.556 1.771l-3.33 2.723a1 1 0 0 0-.337 1.016l1.03 4.119c.214.858-.71 1.552-1.474 1.106l-3.913-2.281a1 1 0 0 0-1.008 0L7.583 20.8c-.764.446-1.688-.248-1.474-1.106l1.03-4.119A1 1 0 0 0 6.8 14.56l-3.33-2.723c-.698-.571-.342-1.702.557-1.771l4.462-.342a1 1 0 0 0 .84-.597l1.753-4.022Z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">0 reviews</h2>
                    <p class="text-gray-500 dark:text-gray-400">added in the last 90 days</p>
                </div>
            </div>
            <div
                class="col-span-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:col-span-2 sm:p-6 lg:col-span-1">
                <div
                    class="mb-2 flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-400">
                    <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 21v-9m3-4H7.5a2.5 2.5 0 1 1 0-5c1.5 0 2.875 1.25 3.875 2.5M14 21v-9m-9 0h14v8a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-8ZM4 8h16a1 1 0 0 1 1 1v3H3V9a1 1 0 0 1 1-1Zm12.155-5c-3 0-5.5 5-5.5 5h5.5a2.5 2.5 0 0 0 0-5Z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                        {{ ceil($user->created_at->diffInYears(now())) }}
                        {{ Str::plural('Year', ceil($user->created_at->diffInYears(now()))) }}
                    </h2>
                    <p class="text-gray-500 dark:text-gray-400">since you are our customer</p>
                </div>
            </div>

            {{-- banner --}}
            <div
                class="col-span-4 items-center gap-6 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:col-span-2 md:p-6 lg:flex">
                {{-- <img class="mb-4 h-40 dark:hidden lg:mb-0"
                    src="/assets/images/icons/car-listing.svg" alt="car listing image" />
                <img class="hidden h-40 dark:block"
                    src="/assets/images/icons/car-listing-dark.svg" alt="car listing image" /> --}}
                <div class="w-full">
                    <h4 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Earn money with us!
                    </h4>
                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">List your vehicle and start
                        earning from Africa's largest vehicle sharing marketplace. No hidden fees!</p>
                    <a href="{{ route('user.vehicles.wizard') }}"
                        class="inline-flex w-full items-center justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">List
                        your vehicle</a>
                </div>
            </div>
            <div
                class="col-span-4 space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:col-span-2 md:p-6">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">You have a ₦10,000 discount voucher</h4>

                <div class="space-y-2">
                    <p class="text-gray-500 dark:text-gray-400">Get a ₦10,000 discount on your next trip after your
                        first 3 bookings.</p>
                    <p class="font-medium text-gray-900 dark:text-white">Valid for 6 months after your 3rd trip</p>
                </div>

                <div class="flex flex-col items-center sm:flex-row md:flex-col lg:flex-row">
                    <a href="{{ route('user.trips.index') }}"
                        class="mb-4 inline-flex w-full justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:mb-0 sm:me-4 sm:w-auto md:mb-4 md:me-0 md:w-full lg:mb-0 lg:me-4 lg:w-auto">Book
                        a trip</a>
                    {{-- <a href="#" title=""
                        class="inline-flex items-center gap-2 font-medium text-gray-900 hover:underline dark:text-white">
                        See voucher details
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                        </svg>
                    </a> --}}
                </div>
            </div>

        </div>

        {{-- Vehicles --}}
        <div class="my-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach($vehicles->take(4) as $vehicle)
                    <div class=" border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <img class="w-full h-48 object-cover" src="{{ $vehicle->featured_image->url }}"
                            alt="{{ $vehicle->name }}">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $vehicle->name }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8  mb-8 text-center">
                <x-button href="{{ route('vehicles.index') }}"  class="text-blue-600 hover:underline dark:text-blue-500">
                    View all vehicles
                </x-button>
            </div>
        </div>
    </div>
</x-user-layout>
