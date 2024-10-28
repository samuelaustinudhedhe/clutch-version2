<div>
    <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-8">
        <div class="mx-auto max-w-screen-xl px-4 ">            
            <h2 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">General overview</h2>

            <nav class="mb-4 flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="#"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5">
                                </path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="mx-1 h-4 w-4 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m9 5 7 7-7 7"></path>
                            </svg>
                            <a href="#"
                                class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2">My
                                account</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="mx-1 h-4 w-4 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m9 5 7 7-7 7"></path>
                            </svg>
                            <span
                                class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Account</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div
                class="mb-4 rounded-lg border border-gray-200 p-4 shadow-sm dark:border-gray-700 bg-white dark:bg-gray-800">
                <ul class="-mb-px grid grid-cols-2 flex-wrap gap-4 text-center text-sm font-medium md:grid-cols-4"
                    data-tabs-active-classes="!bg-blue-700 !text-white"
                    data-tabs-inactive-classes="bg-gray-100 text-gray-500 dark:bg-gray-700 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600"
                    id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                    <li role="presentation">
                        <button class="inline-flex w-full items-center justify-center rounded-lg py-3" id="overview-tab"
                            data-tabs-target="#overview" type="button" role="tab" aria-controls="overview"
                            aria-selected="false">
                            <svg class="me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
                            </svg>
                            Overview
                        </button>
                    </li>
                    <li role="presentation">
                        <button class="inline-flex w-full items-center justify-center rounded-lg py-3" id="orders-tab"
                            data-tabs-target="#orders" type="button" role="tab" aria-controls="orders"
                            aria-selected="false">
                            <svg class="me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                            </svg>
                            My orders
                        </button>
                    </li>
                    <li role="presentation">
                        <button class="inline-flex w-full items-center justify-center rounded-lg py-3" id="returns-tab"
                            data-tabs-target="#returns" type="button" role="tab" aria-controls="returns"
                            aria-selected="false">
                            <svg class="me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M3 9h13a5 5 0 0 1 0 10H7M3 9l4-4M3 9l4 4" />
                            </svg>
                            My refunds
                        </button>
                    </li>
                    <li role="presentation">
                        <button class="inline-flex w-full items-center justify-center rounded-lg py-3 id="reviews-tab"
                            data-tabs-target="#reviews" type="button" role="tab" aria-controls="reviews"
                            aria-selected="false">
                            <svg class="me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2"
                                    d="M11.083 5.104c.35-.8 1.485-.8 1.834 0l1.752 4.022a1 1 0 0 0 .84.597l4.463.342c.9.069 1.255 1.2.556 1.771l-3.33 2.723a1 1 0 0 0-.337 1.016l1.03 4.119c.214.858-.71 1.552-1.474 1.106l-3.913-2.281a1 1 0 0 0-1.008 0L7.583 20.8c-.764.446-1.688-.248-1.474-1.106l1.03-4.119A1 1 0 0 0 6.8 14.56l-3.33-2.723c-.698-.571-.342-1.702.557-1.771l4.462-.342a1 1 0 0 0 .84-.597l1.753-4.022Z" />
                            </svg>
                            My reviews
                        </button>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content">
                <div class="hidden" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                    <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-4">
                        <div
                            class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                            <svg class="mb-2 h-6 w-6 text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                            </svg>
                            <h3 class="text-gray-500 dark:text-gray-400">Vehivles</h3>
                            <span class="text-2xl font-bold text-gray-900 dark:text-white">145</span>
                            <p
                                class="mt-2 flex flex-col items-start text-sm text-gray-500 dark:text-gray-400 lg:flex-row lg:items-center">
                                <span class="-ml-2 mr-1.5 flex items-center text-sm font-medium text-green-500">
                                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M12 6v13m0-13 4 4m-4-4-4 4"></path>
                                    </svg>
                                    7%
                                </span>
                                vs last month
                            </p>
                        </div>
                        <div
                            class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                            <svg class="mb-2 h-6 w-6 text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2"
                                    d="M11.083 5.104c.35-.8 1.485-.8 1.834 0l1.752 4.022a1 1 0 0 0 .84.597l4.463.342c.9.069 1.255 1.2.556 1.771l-3.33 2.723a1 1 0 0 0-.337 1.016l1.03 4.119c.214.858-.71 1.552-1.474 1.106l-3.913-2.281a1 1 0 0 0-1.008 0L7.583 20.8c-.764.446-1.688-.248-1.474-1.106l1.03-4.119A1 1 0 0 0 6.8 14.56l-3.33-2.723c-.698-.571-.342-1.702.557-1.771l4.462-.342a1 1 0 0 0 .84-.597l1.753-4.022Z" />
                            </svg>
                            <h3 class="text-gray-500 dark:text-gray-400">Reviews added</h3>
                            <span class="text-2xl font-bold text-gray-900 dark:text-white">26</span>
                            <p
                                class="mt-2 flex flex-col items-start text-sm text-gray-500 dark:text-gray-400 lg:flex-row lg:items-center">
                                <span class="-ml-2 mr-1.5 flex items-center text-sm font-medium text-green-500">
                                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M12 6v13m0-13 4 4m-4-4-4 4"></path>
                                    </svg>
                                    8.8%
                                </span>
                                vs last month
                            </p>
                        </div>
                        <div
                            class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                            <svg class="mb-2 h-6 w-6 text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                            </svg>
                            <h3 class="text-gray-500 dark:text-gray-400">Favorite products</h3>
                            <span class="text-2xl font-bold text-gray-900 dark:text-white">9</span>
                            <p
                                class="mt-2 flex flex-col items-start text-sm text-gray-500 dark:text-gray-400 lg:flex-row lg:items-center">
                                <span
                                    class="-ml-2 mr-1.5 flex items-center text-sm font-medium text-red-600 dark:text-red-500">
                                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M12 19V5m0 14-4-4m4 4 4-4" />
                                    </svg>
                                    2.5%
                                </span>
                                vs last month
                            </p>
                        </div>
                        <div
                            class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                            <svg class="mb-2 h-6 w-6 text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M3 9h13a5 5 0 0 1 0 10H7M3 9l4-4M3 9l4 4" />
                            </svg>
                            <h3 class="text-gray-500 dark:text-gray-400">Product returns</h3>
                            <span class="text-2xl font-bold text-gray-900 dark:text-white">4</span>
                            <p
                                class="mt-2 flex flex-col items-start text-sm text-gray-500 dark:text-gray-400 lg:flex-row lg:items-center">
                                <span class="-ml-2 mr-1.5 flex items-center text-sm font-medium text-green-500">
                                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M12 6v13m0-13 4 4m-4-4-4 4"></path>
                                    </svg>
                                    5.6%
                                </span>
                                vs last month
                            </p>
                        </div>

                        <div
                            class="col-span-2 rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:col-span-4">
                            <h2 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white md:mb-6">Customer
                                details</h2>
                            <!-- List -->
                            <dl class="list-inside text-gray-500 dark:text-gray-400">
                                <div
                                    class="border-b border-gray-200 pb-4 dark:border-gray-700 sm:flex sm:items-center sm:justify-between">
                                    <dt class="font-semibold text-gray-900 dark:text-white">Name</dt>
                                    <dd class="sm:text-end">{{ $user->name }}</dd>
                                </div>
                                <div
                                    class="border-b border-gray-200 py-4 dark:border-gray-700 sm:flex sm:items-center sm:justify-between">
                                    <dt class="font-semibold text-gray-900 dark:text-white">Email</dt>
                                    <dd class="sm:text-end">
                                        <x-a class="hover:no-underline" color="gray" href="mailto:{{ $user->email }}" >
                                            {{ $user->email }}
                                        </x-a>
                                    </dd>
                                </div>
                                <div
                                    class="border-b border-gray-200 py-4 dark:border-gray-700 sm:flex sm:items-center sm:justify-between">
                                    <dt class="font-semibold text-gray-900 dark:text-white">Home Phone</dt>
                                    <dd class="sm:text-end">
                                        <x-a class="hover:no-underline" color="gray" href="tel:{{ $user->humanized_home_phone }}">
                                            {{ $user->humanized_home_phone }}
                                        </x-a>                                    
                                    </dd>
                                </div>
                                <div
                                    class="border-b border-gray-200 py-4 dark:border-gray-700 sm:flex sm:items-center sm:justify-between">
                                    <dt class="font-semibold text-gray-900 dark:text-white">Work Phone</dt>
                                    <dd class="sm:text-end">
                                        <x-a class="hover:no-underline" color="gray" href="tel:{{ $user->humanized_work_phone }}">
                                            {{ $user->humanized_work_phone }}
                                        </x-a>                                    
                                    </dd>
                                </div>
                                <div
                                    class="border-b border-gray-200 py-4 dark:border-gray-700 sm:flex sm:items-center sm:justify-between">
                                    <dt class="font-semibold text-gray-900 dark:text-white">Country</dt>
                                    <dd class="flex items-center">
                                        {{ $user->address->home->country }}
                                    </dd>
                                </div>
                                <div class="pt-4 sm:flex sm:items-center sm:justify-between">
                                    <dt class="font-semibold text-gray-900 dark:text-white">Address </dt>
                                    <dd class="sm:text-end">{{ $user->humanized_home_address }}</dd>
                                </div>
                            </dl>
                        </div>
                        <div
                            class="col-span-2 rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:col-span-4">
                            <h2 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white md:mb-6">Delivery
                                details</h2>
                            <!-- List -->
                            <dl class="list-inside text-gray-500 dark:text-gray-400">
                                <div
                                    class="border-b border-gray-200 pb-4 dark:border-gray-700 sm:flex sm:items-center sm:justify-between">
                                    <dt class="mb-1 font-semibold text-gray-900 dark:text-white sm:mb-0">Pick-up point
                                    </dt>
                                    <dd class="sm:text-end">Herald Square, 2, New York, United States of America</dd>
                                </div>
                                <div
                                    class="border-b border-gray-200 py-4 dark:border-gray-700 sm:flex sm:items-center sm:justify-between">
                                    <dt class="font-semibold text-gray-900 dark:text-white">Delivery address</dt>
                                    <dd class="sm:text-end">9th St. PATH Station, New York, United States of America
                                    </dd>
                                </div>
                                <div
                                    class="border-b border-gray-200 py-4 dark:border-gray-700 sm:flex sm:items-center sm:justify-between">
                                    <dt class="font-semibold text-gray-900 dark:text-white">Payment method</dt>
                                    <dd class="sm:text-end">VISA Debit Card</dd>
                                </div>
                                <div
                                    class="border-b border-gray-200 py-4 dark:border-gray-700 sm:flex sm:items-center sm:justify-between">
                                    <dt class="font-semibold text-gray-900 dark:text-white">Company</dt>
                                    <dd class="sm:text-end">Flowbite LLC, VAT 123456</dd>
                                </div>
                                <div class="pt-4 sm:flex sm:items-center sm:justify-between">
                                    <dt class="font-semibold text-gray-900 dark:text-white">Delivery method</dt>
                                    <dd class="sm:text-end">Express courier</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="hidden" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                    <div class="mt-4 space-y-4">

                        <div
                            class="divide-y divide-gray-200 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm dark:divide-gray-700 dark:border-gray-700 dark:bg-gray-800">
                            <div class="space-y-4 p-4">
                                <div
                                    class="flex flex-col-reverse items-center justify-between md:flex-row md:space-x-4">
                                    <form class="w-full flex-1 md:mr-4 md:max-w-md">
                                        <label for="default-search"
                                            class="sr-only text-sm font-medium text-gray-900 dark:text-white">Search</label>
                                        <div class="relative">
                                            <div
                                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                <svg aria-hidden="true"
                                                    class="h-4 w-4 text-gray-500 dark:text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </div>
                                            <input type="search" id="default-search"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                placeholder="Search by Order ID" required="" />
                                            <button type="submit"
                                                class="absolute bottom-0 right-0 top-0 rounded-r-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                                        </div>
                                    </form>

                                    <div class="mb-4 w-full md:mb-0 md:w-auto">
                                        <button id="dateDropdownButtonLabel20"
                                            data-dropdown-toggle="dateDropdownButton20" type="button"
                                            class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 md:w-auto">
                                            Last 7 days
                                            <svg class="-me-0.5 ms-1.5 h-4 w-4" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                                            </svg>
                                        </button>
                                        <div id="dateDropdownButton20"
                                            class="z-10 hidden w-80 divide-y divide-gray-100 rounded bg-white shadow dark:divide-gray-600 dark:bg-gray-700">
                                            <ul class="divide-y divide-gray-200 text-sm dark:divide-gray-700"
                                                aria-labelledby="dateDropdownButtonLabel20">
                                                <li>
                                                    <a href="#"
                                                        class="group flex items-center gap-2 px-4 py-2 text-blue-700 hover:bg-gray-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                                        Today
                                                        <span
                                                            class="text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                                            Aug 21, 2023 - Aug 21, 2023 </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#"
                                                        class="group flex items-center gap-2 px-4 py-2 text-blue-700 hover:bg-gray-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                                        Yesterday
                                                        <span
                                                            class="text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                                            Aug 20, 2023 - Aug 21, 2023 </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#"
                                                        class="group flex items-center gap-2 px-4 py-2 text-blue-700 hover:bg-gray-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                                        Last 7 days
                                                        <span
                                                            class="text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                                            Aug 21, 2023 - Aug 21, 2023 </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#"
                                                        class="group flex items-center gap-2 px-4 py-2 text-blue-700 hover:bg-gray-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                                        Last Month
                                                        <span
                                                            class="text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                                            Aug 15, 2023 - Aug 21, 2023 </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#"
                                                        class="group flex items-center gap-2 px-4 py-2 text-blue-700 hover:bg-gray-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                                        Last year
                                                        <span
                                                            class="text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                                            Jan 1, 2023 - Aug 21, 2023 </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#"
                                                        class="group flex items-center gap-2 px-4 py-2 text-blue-700 hover:bg-gray-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                                        All time
                                                        <span
                                                            class="text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                                            Feb 1, 2020 - Aug 21, 2023 </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <hr class="border-gray-200 dark:border-gray-700" />

                                <div class="flex flex-wrap items-center">
                                    <div
                                        class="mr-4 hidden items-center text-sm font-medium text-gray-900 dark:text-white md:flex">
                                        Show:</div>
                                    <div class="flex flex-wrap gap-x-2 gap-y-3">
                                        <div class="mr-4 flex items-center">
                                            <input id="all-orders" type="radio" value="" name="show-only"
                                                class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                                            <label for="all-orders"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> All
                                            </label>
                                        </div>

                                        <div class="mr-4 flex items-center">
                                            <input id="confirmed" type="radio" value="" name="show-only"
                                                class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                                            <label for="confirmed"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                Confirmed </label>
                                        </div>

                                        <div class="mr-4 flex items-center">
                                            <input id="in-transit" type="radio" value="" name="show-only"
                                                class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                                            <label for="in-transit"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> In
                                                Transit </label>
                                        </div>

                                        <div class="mr-4 flex items-center">
                                            <input id="canceled" type="radio" value="" name="show-only"
                                                class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                                            <label for="canceled"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                Canceled </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="relative overflow-x-auto">
                                <table
                                    class="w-full divide-y divide-gray-200 text-left text-sm text-gray-900 dark:divide-gray-700 dark:text-white">
                                    <thead
                                        class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col"
                                                class="whitespace-nowrap p-4 text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">
                                                Order ID</th>
                                            <th scope="col"
                                                class="whitespace-nowrap p-4 text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">
                                                <div class="flex items-center gap-1">
                                                    Due Date
                                                    <svg class="h-4 w-4 text-gray-400 dark:text-gray-500"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                                    </svg>
                                                </div>
                                            </th>
                                            <th scope="col"
                                                class="whitespace-nowrap p-4 text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">
                                                <div class="flex items-center gap-1">
                                                    Price
                                                    <svg class="h-4 w-4 text-gray-400 dark:text-gray-500"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                                    </svg>
                                                </div>
                                            </th>
                                            <th scope="col"
                                                class="whitespace-nowrap p-4 text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">
                                                <div class="flex items-center gap-1">
                                                    Status
                                                    <svg class="h-4 w-4 text-gray-400 dark:text-gray-500"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                                    </svg>
                                                </div>
                                            </th>
                                            <th scope="col" class="p-4 text-xs font-semibold uppercase">
                                                <span class="sr-only"> Actions </span>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <th scope="row"
                                                class="whitespace-nowrap p-4 font-medium text-gray-900 dark:text-white">
                                                <a href="#" class="hover:underline">#FWB127364372</a>
                                            </th>
                                            <td class="whitespace-nowrap p-4 text-sm font-medium">09 Mar 2023</td>
                                            <td class="whitespace-nowrap p-4 text-sm font-medium">$466</td>
                                            <td class="p-4">
                                                <span
                                                    class="me-2 inline-flex items-center rounded bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                                    <svg class="me-1 h-3 w-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M18.5 4h-13m13 16h-13M8 20v-3.333a2 2 0 0 1 .4-1.2L10 12.6a1 1 0 0 0 0-1.2L8.4 8.533a2 2 0 0 1-.4-1.2V4h8v3.333a2 2 0 0 1-.4 1.2L13.957 11.4a1 1 0 0 0 0 1.2l1.643 2.867a2 2 0 0 1 .4 1.2V20H8Z" />
                                                    </svg>
                                                    Pre-order
                                                </span>
                                            </td>
                                            <td class="p-4 text-right">
                                                <button id="actionsMenuDropdown20"
                                                    data-dropdown-toggle="dropdownOrder20" type="button"
                                                    class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    <span class="sr-only"> Actions </span>
                                                    <svg class="h-5 w-5" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01" />
                                                    </svg>
                                                </button>

                                                <div id="dropdownOrder20"
                                                    class="z-10 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700">
                                                    <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                                        aria-labelledby="actionsMenuDropdown20">
                                                        <li>
                                                            <a href="#"
                                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4" />
                                                                </svg>
                                                                <span>Order again</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-width="2"
                                                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                                    <path stroke="currentColor" stroke-width="2"
                                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                </svg>
                                                                Order details
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <button id="deleteOrderButton"
                                                                data-modal-target="deleteOrderModal"
                                                                data-modal-toggle="deleteOrderModal" type="button"
                                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                <svg class="me-1.5 h-4 w-4" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                                </svg>
                                                                Cancel order
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <th scope="row"
                                                class="whitespace-nowrap p-4 font-medium text-gray-900 dark:text-white">
                                                <a href="#" class="hover:underline">#FWB125467980</a>
                                            </th>
                                            <td class="whitespace-nowrap p-4 text-sm font-medium">12 Mar 2023</td>
                                            <td class="whitespace-nowrap p-4 text-sm font-medium">$245</td>
                                            <td class="p-4">
                                                <span
                                                    class="me-2 inline-flex items-center rounded bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                                                    <svg class="me-1 h-3 w-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                                    </svg>
                                                    In transit
                                                </span>
                                            </td>
                                            <td class="p-4 text-right">
                                                <button id="actionsMenuDropdown21"
                                                    data-dropdown-toggle="dropdownOrder21" type="button"
                                                    class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    <span class="sr-only"> Actions </span>
                                                    <svg class="h-5 w-5" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01" />
                                                    </svg>
                                                </button>

                                                <div id="dropdownOrder21"
                                                    class="z-10 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700">
                                                    <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                                        aria-labelledby="actionsMenuDropdown21">
                                                        <li>
                                                            <a href="#"
                                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4" />
                                                                </svg>
                                                                <span>Order again</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-width="2"
                                                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                                    <path stroke="currentColor" stroke-width="2"
                                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                </svg>
                                                                Order details
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <button id="deleteOrderButton2"
                                                                data-modal-target="deleteOrderModal"
                                                                data-modal-toggle="deleteOrderModal" type="button"
                                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                <svg class="me-1.5 h-4 w-4" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                                </svg>
                                                                Cancel order
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <th scope="row"
                                                class="whitespace-nowrap p-4 font-medium text-gray-900 dark:text-white">
                                                <a href="#" class="hover:underline">#FWB139485607</a>
                                            </th>
                                            <td class="whitespace-nowrap p-4 text-sm font-medium">19 Mar 2023</td>
                                            <td class="whitespace-nowrap p-4 text-sm font-medium">$2000</td>
                                            <td class="p-4">
                                                <span
                                                    class="me-2 inline-flex items-center rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
                                                    <svg class="me-1 h-3 w-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M5 11.917 9.724 16.5 19 7.5" />
                                                    </svg>
                                                    Confirmed
                                                </span>
                                            </td>
                                            <td class="p-4 text-right">
                                                <button id="actionsMenuDropdown22"
                                                    data-dropdown-toggle="dropdownOrder22" type="button"
                                                    class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    <span class="sr-only"> Actions </span>
                                                    <svg class="h-5 w-5" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01" />
                                                    </svg>
                                                </button>

                                                <div id="dropdownOrder22"
                                                    class="z-10 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700">
                                                    <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                                        aria-labelledby="actionsMenuDropdown22">
                                                        <li>
                                                            <a href="#"
                                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4" />
                                                                </svg>
                                                                <span>Order again</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-width="2"
                                                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                                    <path stroke="currentColor" stroke-width="2"
                                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                </svg>
                                                                Order details
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <th scope="row"
                                                class="whitespace-nowrap p-4 font-medium text-gray-900 dark:text-white">
                                                <a href="#" class="hover:underline">#FWB137364371</a>
                                            </th>
                                            <td class="whitespace-nowrap p-4 text-sm font-medium">23 Apr 2023</td>
                                            <td class="whitespace-nowrap p-4 text-sm font-medium">$90</td>
                                            <td class="p-4">
                                                <span
                                                    class="me-2 inline-flex items-center rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
                                                    <svg class="me-1 h-3 w-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M5 11.917 9.724 16.5 19 7.5" />
                                                    </svg>
                                                    Confirmed
                                                </span>
                                            </td>
                                            <td class="p-4 text-right">
                                                <button id="actionsMenuDropdown23"
                                                    data-dropdown-toggle="dropdownOrder23" type="button"
                                                    class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    <span class="sr-only"> Actions </span>
                                                    <svg class="h-5 w-5" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01" />
                                                    </svg>
                                                </button>

                                                <div id="dropdownOrder23"
                                                    class="z-10 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700">
                                                    <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                                        aria-labelledby="actionsMenuDropdown23">
                                                        <li>
                                                            <a href="#"
                                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4" />
                                                                </svg>
                                                                <span>Order again</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-width="2"
                                                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                                    <path stroke="currentColor" stroke-width="2"
                                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                </svg>
                                                                Order details
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <th scope="row"
                                                class="whitespace-nowrap p-4 font-medium text-gray-900 dark:text-white">
                                                <a href="#" class="hover:underline">#FWB148273645</a>
                                            </th>
                                            <td class="whitespace-nowrap p-4 text-sm font-medium">20 Apr 2023</td>
                                            <td class="whitespace-nowrap p-4 text-sm font-medium">$3040</td>
                                            <td class="p-4">
                                                <span
                                                    class="me-2 inline-flex items-center rounded bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-300">
                                                    <svg class="me-1 h-3 w-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M6 18 17.94 6M18 18 6.06 6" />
                                                    </svg>

                                                    Canceled
                                                </span>
                                            </td>
                                            <td class="p-4 text-right">
                                                <button id="actionsMenuDropdown24"
                                                    data-dropdown-toggle="dropdownOrder24" type="button"
                                                    class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    <span class="sr-only"> Actions </span>
                                                    <svg class="h-5 w-5" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01" />
                                                    </svg>
                                                </button>

                                                <div id="dropdownOrder24"
                                                    class="z-10 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700">
                                                    <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                                        aria-labelledby="actionsMenuDropdown24">
                                                        <li>
                                                            <a href="#"
                                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4" />
                                                                </svg>
                                                                <span>Order again</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-width="2"
                                                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                                    <path stroke="currentColor" stroke-width="2"
                                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                </svg>
                                                                Order details
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <th scope="row"
                                                class="whitespace-nowrap p-4 font-medium text-gray-900 dark:text-white">
                                                <a href="#" class="hover:underline">#FWB146284623</a>
                                            </th>
                                            <td class="whitespace-nowrap p-4 text-sm font-medium">30 Apr 2023</td>
                                            <td class="whitespace-nowrap p-4 text-sm font-medium">$2999</td>
                                            <td class="p-4">
                                                <span
                                                    class="me-2 inline-flex items-center rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
                                                    <svg class="me-1 h-3 w-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M5 11.917 9.724 16.5 19 7.5" />
                                                    </svg>
                                                    Confirmed
                                                </span>
                                            </td>
                                            <td class="p-4 text-right">
                                                <button id="actionsMenuDropdown25"
                                                    data-dropdown-toggle="dropdownOrder25" type="button"
                                                    class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    <span class="sr-only"> Actions </span>
                                                    <svg class="h-5 w-5" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01" />
                                                    </svg>
                                                </button>

                                                <div id="dropdownOrder25"
                                                    class="z-10 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700">
                                                    <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                                        aria-labelledby="actionsMenuDropdown25">
                                                        <li>
                                                            <a href="#"
                                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4" />
                                                                </svg>
                                                                <span>Order again</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-width="2"
                                                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                                    <path stroke="currentColor" stroke-width="2"
                                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                </svg>
                                                                Order details
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="px-4 py-4">
                                <nav class="flex flex-col items-start justify-between space-y-3 md:flex-row md:items-center md:space-y-0"
                                    aria-label="Table navigation">
                                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Showing <span
                                            class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span
                                            class="font-semibold text-gray-900 dark:text-white">1000</span></span>
                                    <ul class="flex h-8 items-center -space-x-px text-sm">
                                        <li>
                                            <a href="#"
                                                class="ms-0 flex h-8 items-center justify-center rounded-s-lg border border-e-0 border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <span class="sr-only">Previous</span>
                                                <svg class="h-4 w-4 rtl:rotate-180" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m15 19-7-7 7-7" />
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                                        </li>
                                        <li>
                                            <a href="#" aria-current="page"
                                                class="z-10 flex h-8 items-center justify-center border border-blue-300 bg-blue-50 px-3 leading-tight text-blue-600 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center justify-center rounded-e-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <span class="sr-only">Next</span>
                                                <svg class="h-4 w-4 rtl:rotate-180" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden" id="returns" role="tabpanel" aria-labelledby="returns-tab">
                    <div
                        class="divide-y divide-gray-200 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm dark:divide-gray-700 dark:border-gray-700 dark:bg-gray-800">
                        <div class="space-y-4 p-4">
                            <div class="flex flex-col-reverse items-center justify-between md:flex-row md:space-x-4">
                                <form class="w-full flex-1 md:mr-4 md:max-w-md">
                                    <label for="default-search"
                                        class="sr-only text-sm font-medium text-gray-900 dark:text-white">Search</label>
                                    <div class="relative">
                                        <div
                                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                            <svg aria-hidden="true" class="h-4 w-4 text-gray-500 dark:text-gray-400"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                                                </path>
                                            </svg>
                                        </div>
                                        <input type="search" id="default-search"
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                            placeholder="Search by ID" required="" />
                                        <button type="submit"
                                            class="absolute bottom-0 right-0 top-0 rounded-r-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                                    </div>
                                </form>

                                <div
                                    class="mb-4 w-full items-center space-y-4 sm:flex sm:space-x-4 sm:space-y-0 md:mb-0 md:w-auto">
                                    <button id="dateDropdownButtonLabel" data-dropdown-toggle="dateDropdownButton"
                                        type="button"
                                        class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 md:w-auto">
                                        Last 7 days
                                        <svg class="-me-0.5 ms-1.5 h-4 w-4" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div id="dateDropdownButton"
                                        class="z-10 hidden w-80 divide-y divide-gray-100 rounded bg-white shadow dark:divide-gray-600 dark:bg-gray-700"
                                        data-popper-placement="bottom">
                                        <ul class="divide-y divide-gray-200 text-sm font-medium dark:divide-gray-600"
                                            aria-labelledby="dateDropdownButtonLabel">
                                            <li>
                                                <a href="#"
                                                    class="group flex items-center gap-2 px-4 py-2 text-blue-700 hover:bg-gray-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                                    Today
                                                    <span
                                                        class="font-normal text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                                        Aug 21, 2023 - Aug 21, 2023 </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#"
                                                    class="group flex items-center gap-2 px-4 py-2 text-blue-700 hover:bg-gray-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                                    Yesterday
                                                    <span
                                                        class="font-normal text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                                        Aug 20, 2023 - Aug 21, 2023 </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#"
                                                    class="group flex items-center gap-2 px-4 py-2 text-blue-700 hover:bg-gray-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                                    Last 7 days
                                                    <span
                                                        class="font-normal text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                                        Aug 21, 2023 - Aug 21, 2023 </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#"
                                                    class="group flex items-center gap-2 px-4 py-2 text-blue-700 hover:bg-gray-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                                    Last Month
                                                    <span
                                                        class="font-normal text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                                        Aug 15, 2023 - Aug 21, 2023 </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#"
                                                    class="group flex items-center gap-2 px-4 py-2 text-blue-700 hover:bg-gray-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                                    Last year
                                                    <span
                                                        class="font-normal text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                                        Jan 1, 2023 - Aug 21, 2023 </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#"
                                                    class="group flex items-center gap-2 px-4 py-2 text-blue-700 hover:bg-gray-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                                    All time
                                                    <span
                                                        class="font-normal text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                                        Feb 1, 2020 - Aug 21, 2023 </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <button type="button"
                                        class="flex w-full items-center justify-center rounded-lg bg-blue-700 px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300   dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 md:w-auto">
                                        <svg class="-ms-0.5 me-1.5 h-4 w-4" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M18 9V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h4M9 3v4a1 1 0 0 1-1 1H4m11 6v4m-2-2h4m3 0a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z">
                                            </path>
                                        </svg>
                                        Add refund request
                                    </button>
                                </div>
                            </div>

                            <hr class="border-gray-200 dark:border-gray-700" />

                            <div class="flex flex-wrap items-center">
                                <div
                                    class="mr-4 hidden items-center text-sm font-medium text-gray-900 dark:text-white md:flex">
                                    Show:</div>
                                <div class="flex flex-wrap gap-x-2 gap-y-3">
                                    <div class="mr-4 flex items-center">
                                        <input id="all-orders" type="radio" value="" name="show-only"
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                                        <label for="all-orders"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> All
                                        </label>
                                    </div>

                                    <div class="mr-4 flex items-center">
                                        <input id="in-progress" type="radio" value="" name="show-only"
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                                        <label for="in-progress"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Ongoing
                                        </label>
                                    </div>

                                    <div class="mr-4 flex items-center">
                                        <input id="completed" type="radio" value="" name="show-only"
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                                        <label for="completed"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            Completed </label>
                                    </div>

                                    <div class="mr-4 flex items-center">
                                        <input id="denied" type="radio" value="" name="show-only"
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                                        <label for="denied"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Denied
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="relative overflow-x-auto">
                            <table
                                class="w-full divide-y divide-gray-200 text-left text-sm text-gray-900 dark:divide-gray-700 dark:text-white">
                                <thead
                                    class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col"
                                            class="whitespace-nowrap p-4 text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">
                                            ID</th>
                                        <th scope="col"
                                            class="whitespace-nowrap p-4 text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">
                                            <div class="flex items-center gap-1">
                                                Due Date
                                                <svg class="h-4 w-4 text-gray-400 dark:text-gray-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m8 15 4 4 4-4m0-6-4-4-4 4"></path>
                                                </svg>
                                            </div>
                                        </th>
                                        <th scope="col"
                                            class="whitespace-nowrap p-4 text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">
                                            <div class="flex items-center gap-1">
                                                Reason
                                                <svg class="h-4 w-4 text-gray-400 dark:text-gray-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m8 15 4 4 4-4m0-6-4-4-4 4"></path>
                                                </svg>
                                            </div>
                                        </th>
                                        <th scope="col"
                                            class="whitespace-nowrap p-4 text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">
                                            <div class="flex items-center gap-1">
                                                Status
                                                <svg class="h-4 w-4 text-gray-400 dark:text-gray-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m8 15 4 4 4-4m0-6-4-4-4 4"></path>
                                                </svg>
                                            </div>
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-semibold uppercase">
                                            <span class="sr-only"> Actions </span>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <th scope="row"
                                            class="whitespace-nowrap p-4 font-medium text-gray-900 dark:text-white">
                                            <a href="#" class="hover:underline">#FWB127364372</a>
                                        </th>
                                        <td class="whitespace-nowrap p-4 text-sm font-medium">09 Jan 2024</td>
                                        <td class="whitespace-nowrap p-4 text-sm font-medium">Damaged product</td>
                                        <td class="p-4">
                                            <span
                                                class=" mt-1.5 inline-flex items-center rounded bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                                <svg class="me-1 h-3 w-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M18.5 4h-13m13 16h-13M8 20v-3.333a2 2 0 0 1 .4-1.2L10 12.6a1 1 0 0 0 0-1.2L8.4 8.533a2 2 0 0 1-.4-1.2V4h8v3.333a2 2 0 0 1-.4 1.2L13.957 11.4a1 1 0 0 0 0 1.2l1.643 2.867a2 2 0 0 1 .4 1.2V20H8Z">
                                                    </path>
                                                </svg>
                                                Ongoing
                                            </span>
                                        </td>
                                        <td class="p-4 text-right">
                                            <button id="actionsMenuDropdown" data-dropdown-toggle="dropdownRefund"
                                                type="button"
                                                class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <span class="sr-only"> Actions </span>
                                                <svg class="h-5 w-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01"></path>
                                                </svg>
                                            </button>

                                            <div id="dropdownRefund"
                                                class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700"
                                                data-popper-placement="bottom">
                                                <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                                    aria-labelledby="actionsMenuDropdown">
                                                    <li>
                                                        <a href="#"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z">
                                                                </path>
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                                            </svg>
                                                            More details
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01">
                                                                </path>
                                                            </svg>
                                                            <span>Download report</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <button id="deleteReturnButton2" type="button"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="me-1.5 h-4 w-4" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z">
                                                                </path>
                                                            </svg>
                                                            Cancel refund
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <th scope="row"
                                            class="whitespace-nowrap p-4 font-medium text-gray-900 dark:text-white">
                                            <a href="#" class="hover:underline">#FWB125467980</a>
                                        </th>
                                        <td class="whitespace-nowrap p-4 text-sm font-medium">12 Dec 2023</td>
                                        <td class="whitespace-nowrap p-4 text-sm font-medium">Wrong delivery</td>
                                        <td class="p-4">
                                            <span
                                                class="  inline-flex items-center rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
                                                <svg class="me-1 h-3 w-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M5 11.917 9.724 16.5 19 7.5"></path>
                                                </svg>
                                                Completed
                                            </span>
                                        </td>
                                        <td class="p-4 text-right">
                                            <button id="actionsMenuDropdown2" data-dropdown-toggle="dropdownRefund2"
                                                type="button"
                                                class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <span class="sr-only"> Actions </span>
                                                <svg class="h-5 w-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01"></path>
                                                </svg>
                                            </button>

                                            <div id="dropdownRefund2"
                                                class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700"
                                                data-popper-placement="bottom">
                                                <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                                    aria-labelledby="actionsMenuDropdown2">
                                                    <li>
                                                        <a href="#"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z">
                                                                </path>
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                                            </svg>
                                                            More details
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01">
                                                                </path>
                                                            </svg>
                                                            <span>Download report</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <th scope="row"
                                            class="whitespace-nowrap p-4 font-medium text-gray-900 dark:text-white">
                                            <a href="#" class="hover:underline">#FWB139485607</a>
                                        </th>
                                        <td class="whitespace-nowrap p-4 text-sm font-medium">19 Nov 2023</td>
                                        <td class="whitespace-nowrap p-4 text-sm font-medium">Defective item</td>
                                        <td class="p-4">
                                            <span
                                                class="  inline-flex items-center rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
                                                <svg class="me-1 h-3 w-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M5 11.917 9.724 16.5 19 7.5"></path>
                                                </svg>
                                                Completed
                                            </span>
                                        </td>
                                        <td class="p-4 text-right">
                                            <button id="actionsMenuDropdown3" data-dropdown-toggle="dropdownRefund3"
                                                type="button"
                                                class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <span class="sr-only"> Actions </span>
                                                <svg class="h-5 w-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01"></path>
                                                </svg>
                                            </button>

                                            <div id="dropdownRefund3"
                                                class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700"
                                                data-popper-placement="bottom">
                                                <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                                    aria-labelledby="actionsMenuDropdown3">
                                                    <li>
                                                        <a href="#"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z">
                                                                </path>
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                                            </svg>
                                                            More details
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01">
                                                                </path>
                                                            </svg>
                                                            <span>Download report</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <th scope="row"
                                            class="whitespace-nowrap p-4 font-medium text-gray-900 dark:text-white">
                                            <a href="#" class="hover:underline">#FWB137364371</a>
                                        </th>
                                        <td class="whitespace-nowrap p-4 text-sm font-medium">23 Oct 2023</td>
                                        <td class="whitespace-nowrap p-4 text-sm font-medium">Missing parts</td>
                                        <td class="p-4">
                                            <span
                                                class=" inline-flex items-center rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
                                                <svg class="me-1 h-3 w-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M5 11.917 9.724 16.5 19 7.5"></path>
                                                </svg>
                                                Completed
                                            </span>
                                        </td>
                                        <td class="p-4 text-right">
                                            <button id="actionsMenuDropdown4" data-dropdown-toggle="dropdownRefund4"
                                                type="button"
                                                class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <span class="sr-only"> Actions </span>
                                                <svg class="h-5 w-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01"></path>
                                                </svg>
                                            </button>

                                            <div id="dropdownRefund4"
                                                class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700"
                                                data-popper-placement="bottom">
                                                <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                                    aria-labelledby="actionsMenuDropdown4">
                                                    <li>
                                                        <a href="#"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z">
                                                                </path>
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                                            </svg>
                                                            More details
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01">
                                                                </path>
                                                            </svg>
                                                            <span>Download report</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <th scope="row"
                                            class="whitespace-nowrap p-4 font-medium text-gray-900 dark:text-white">
                                            <a href="#" class="hover:underline">#FWB148273645</a>
                                        </th>
                                        <td class="whitespace-nowrap p-4 text-sm font-medium">20 Sep 2023</td>
                                        <td class="whitespace-nowrap p-4 text-sm font-medium">Change of mind</td>
                                        <td class="p-4">
                                            <span
                                                class=" inline-flex items-center rounded bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-300">
                                                <svg class="me-1 h-3 w-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18 17.94 6M18 18 6.06 6"></path>
                                                </svg>
                                                Denied
                                            </span>
                                        </td>
                                        <td class="p-4 text-right">
                                            <button id="actionsMenuDropdown5" data-dropdown-toggle="dropdownRefund5"
                                                type="button"
                                                class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <span class="sr-only"> Actions </span>
                                                <svg class="h-5 w-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01"></path>
                                                </svg>
                                            </button>

                                            <div id="dropdownRefund5"
                                                class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700"
                                                data-popper-placement="bottom">
                                                <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                                    aria-labelledby="actionsMenuDropdown5">
                                                    <li>
                                                        <a href="#"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z">
                                                                </path>
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                                            </svg>
                                                            More details
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01">
                                                                </path>
                                                            </svg>
                                                            <span>Download report</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <th scope="row"
                                            class="whitespace-nowrap p-4 font-medium text-gray-900 dark:text-white">
                                            <a href="#" class="hover:underline">#FWB146284623</a>
                                        </th>
                                        <td class="whitespace-nowrap p-4 text-sm font-medium">30 Aug 2023</td>
                                        <td class="whitespace-nowrap p-4 text-sm font-medium">Color mismatch</td>
                                        <td class="p-4">
                                            <span
                                                class=" inline-flex items-center rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
                                                <svg class="me-1 h-3 w-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M5 11.917 9.724 16.5 19 7.5"></path>
                                                </svg>
                                                Completed
                                            </span>
                                        </td>
                                        <td class="p-4 text-right">
                                            <button id="actionsMenuDropdown6" data-dropdown-toggle="dropdownRefund6"
                                                type="button"
                                                class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <span class="sr-only"> Actions </span>
                                                <svg class="h-5 w-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01"></path>
                                                </svg>
                                            </button>

                                            <div id="dropdownRefund6"
                                                class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700"
                                                data-popper-placement="bottom">
                                                <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                                    aria-labelledby="actionsMenuDropdown6">
                                                    <li>
                                                        <a href="#"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z">
                                                                </path>
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                                            </svg>
                                                            More details
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01">
                                                                </path>
                                                            </svg>
                                                            <span>Download report</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="px-4 py-4">
                            <nav class="flex flex-col items-start justify-between space-y-3 md:flex-row md:items-center md:space-y-0"
                                aria-label="Table navigation">
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Showing <span
                                        class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span
                                        class="font-semibold text-gray-900 dark:text-white">1000</span></span>
                                <ul class="flex h-8 items-center -space-x-px text-sm">
                                    <li>
                                        <a href="#"
                                            class="ms-0 flex h-8 items-center justify-center rounded-s-lg border border-e-0 border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <span class="sr-only">Previous</span>
                                            <svg class="h-4 w-4 rtl:rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7">
                                                </path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                                    </li>
                                    <li>
                                        <a href="#" aria-current="page"
                                            class="z-10 flex h-8 items-center justify-center border border-blue-300 bg-blue-50 px-3 leading-tight text-blue-600 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex h-8 items-center justify-center rounded-e-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <span class="sr-only">Next</span>
                                            <svg class="h-4 w-4 rtl:rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7">
                                                </path>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="hidden" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <div
                        class="divide-y divide-gray-200 rounded-lg border border-gray-200 bg-white shadow-sm dark:divide-gray-700 dark:border-gray-700 dark:bg-gray-800">
                        <div class="relative">
                            <div
                                class="mx-4 items-center justify-between space-y-4 border-b border-gray-200 py-4 dark:border-gray-700 sm:flex md:space-x-4 md:space-y-0">
                                <div class="flex items-center space-x-3">
                                    <h5 class="font-semibold dark:text-white">All reviews</h5>
                                    <div class="text-gray-500 dark:text-gray-400">560 results</div>
                                    <div data-tooltip-target="results-tooltip">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 cursor-pointer text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">More info</span>
                                    </div>
                                    <div id="results-tooltip" role="tooltip"
                                        class="tooltip invisible absolute z-50 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                                        data-popper-placement="top">
                                        Showing 1-10 of 560 results
                                        <div class="tooltip-arrow" data-popper-arrow=""></div>
                                    </div>
                                </div>

                                <button type="button" data-modal-target="addReviewModal"
                                    data-modal-toggle="addReviewModal"
                                    class="flex w-full items-center justify-center rounded-lg bg-blue-700 px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 md:w-auto">Write
                                    a review</button>
                            </div>
                            <div
                                class="flex flex-col-reverse items-start justify-between p-4 md:flex-row md:items-center md:space-x-4">
                                <div class="grid w-full grid-cols-1 md:grid-cols-4 md:gap-4 lg:w-2/3">
                                    <div class="w-full">
                                        <label for="brand" class="sr-only">Brand</label>
                                        <select id="brand"
                                            class="peer block w-full appearance-none border-0 border-b-2 border-gray-200 bg-transparent px-0 py-2.5 text-sm text-gray-500 focus:border-gray-200 focus:outline-none focus:ring-0 dark:border-gray-700 dark:text-gray-400">
                                            <option selected="">Product</option>
                                            <option value="1">Ipad PRO</option>
                                            <option value="2">Apple iMac 27"</option>
                                            <option value="3">Sony PlayStation 5</option>
                                            <option value="4">DualSense PS5 Controller</option>
                                        </select>
                                    </div>
                                    <div class="w-full">
                                        <label for="price" class="sr-only">Price</label>
                                        <select id="price"
                                            class="peer block w-full appearance-none border-0 border-b-2 border-gray-200 bg-transparent px-0 py-2.5 text-sm text-gray-500 focus:border-gray-200 focus:outline-none focus:ring-0 dark:border-gray-700 dark:text-gray-400">
                                            <option selected="">Ratings</option>
                                            <option value="5 stars">5 stars</option>
                                            <option value="4 stars">4 stars</option>
                                            <option value="3 stars">3 stars</option>
                                            <option value="2 stars">2 stars</option>
                                            <option value="1 star">1 star</option>
                                        </select>
                                    </div>
                                    <div class="w-full">
                                        <label for="category" class="sr-only">Date added</label>
                                        <select id="category"
                                            class="peer block w-full appearance-none border-0 border-b-2 border-gray-200 bg-transparent px-0 py-2.5 text-sm text-gray-500 focus:border-gray-200 focus:outline-none focus:ring-0 dark:border-gray-700 dark:text-gray-400">
                                            <option selected="">This month</option>
                                            <option value="year">This year</option>
                                            <option value="week">This week</option>
                                            <option value="today">Today</option>
                                            <option value="all">All time</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="relative overflow-x-auto">
                            <table
                                class="w-full divide-y divide-gray-200 text-left text-sm text-gray-900 dark:divide-gray-700 dark:text-white">
                                <thead
                                    class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col"
                                            class="whitespace-nowrap p-4 text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">
                                            Product</th>
                                        <th scope="col"
                                            class=" w-[30rem] min-w-[20rem] p-4 text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">
                                            <div class="flex items-center gap-1">Review message</div>
                                        </th>
                                        <th scope="col"
                                            class="whitespace-nowrap p-4 text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">
                                            <div class="flex items-center gap-1">
                                                Date
                                                <svg class="h-4 w-4 text-gray-400 dark:text-gray-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m8 15 4 4 4-4m0-6-4-4-4 4"></path>
                                                </svg>
                                            </div>
                                        </th>
                                        <th scope="col"
                                            class="whitespace-nowrap p-4 text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">
                                            <div class="flex items-center gap-1">
                                                Stars
                                                <svg class="h-4 w-4 text-gray-400 dark:text-gray-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m8 15 4 4 4-4m0-6-4-4-4 4"></path>
                                                </svg>
                                            </div>
                                        </th>
                                        <th scope="col" class="p-4 text-xs font-semibold uppercase">
                                            <span class="sr-only"> Actions </span>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <th scope="row"
                                            class="whitespace-nowrap p-4 text-sm font-medium text-gray-900 dark:text-white">
                                            <a href="#" class="hover:underline">PC Apple iMac 27”</a>
                                        </th>
                                        <td class="p-4 text-sm text-gray-500 dark:text-gray-400">It’s fancy, amazing
                                            keyboard, matching accessories. Super fast, batteries last more than usual,
                                            everything runs perfect in this</td>
                                        <td
                                            class="whitespace-nowrap p-4 text-sm font-medium text-gray-500 dark:text-gray-400">
                                            9 Jul 2024</td>
                                        <td class="p-4">
                                            <div class="flex items-center space-x-0.5">
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </td>
                                        <td class="p-4 text-right">
                                            <button id="reviewActionsMenuDropdown1"
                                                data-dropdown-toggle="dropdownReview1" type="button"
                                                class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <span class="sr-only"> Actions </span>
                                                <svg class="h-5 w-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01"></path>
                                                </svg>
                                            </button>

                                            <div id="dropdownReview1"
                                                class="z-10 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700"
                                                data-popper-placement="bottom">
                                                <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                                    aria-labelledby="reviewActionsMenuDropdown2">
                                                    <li>
                                                        <button type="button"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z">
                                                                </path>
                                                            </svg>
                                                            <span>Edit review</span>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button id="deleteReviewButton1"
                                                            data-modal-target="deleteReviewModal"
                                                            data-modal-toggle="deleteReviewModal" type="button"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-red-600">
                                                            <svg class="me-1.5 h-4 w-4" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z">
                                                                </path>
                                                            </svg>
                                                            Delete review
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <th scope="row"
                                            class="whitespace-nowrap p-4 text-sm font-medium text-gray-900 dark:text-white">
                                            <a href="#" class="hover:underline">iPad Pro 13" (M4)</a>
                                        </th>
                                        <td class="p-4 text-sm text-gray-500 dark:text-gray-400">Elegant look,
                                            exceptional keyboard, and well-matched accessories. Lightning-quick speed,
                                            impressive battery duration</td>
                                        <td
                                            class="whitespace-nowrap p-4 text-sm font-medium text-gray-500 dark:text-gray-400">
                                            23 Jun 2024</td>
                                        <td class="p-4">
                                            <div class="flex items-center space-x-0.5">
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="2"
                                                        d="M11.083 5.104c.35-.8 1.485-.8 1.834 0l1.752 4.022a1 1 0 0 0 .84.597l4.463.342c.9.069 1.255 1.2.556 1.771l-3.33 2.723a1 1 0 0 0-.337 1.016l1.03 4.119c.214.858-.71 1.552-1.474 1.106l-3.913-2.281a1 1 0 0 0-1.008 0L7.583 20.8c-.764.446-1.688-.248-1.474-1.106l1.03-4.119A1 1 0 0 0 6.8 14.56l-3.33-2.723c-.698-.571-.342-1.702.557-1.771l4.462-.342a1 1 0 0 0 .84-.597l1.753-4.022Z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </td>
                                        <td class="p-4 text-right">
                                            <button id="reviewActionsMenuDropdown2"
                                                data-dropdown-toggle="dropdownReview2" type="button"
                                                class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <span class="sr-only"> Actions </span>
                                                <svg class="h-5 w-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01"></path>
                                                </svg>
                                            </button>

                                            <div id="dropdownReview2"
                                                class="z-10 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700"
                                                data-popper-placement="bottom">
                                                <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                                    aria-labelledby="reviewActionsMenuDropdown2">
                                                    <li>
                                                        <button type="button"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z">
                                                                </path>
                                                            </svg>
                                                            <span>Edit review</span>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button id="deleteReviewButton2"
                                                            data-modal-target="deleteReviewModal"
                                                            data-modal-toggle="deleteReviewModal" type="button"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-red-600">
                                                            <svg class="me-1.5 h-4 w-4" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z">
                                                                </path>
                                                            </svg>
                                                            Delete review
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <th scope="row"
                                            class="whitespace-nowrap p-4 text-sm font-medium text-gray-900 dark:text-white">
                                            <a href="#" class="hover:underline">Brother MFC-J1DW Inkjet</a>
                                        </th>
                                        <td class="p-4 text-sm text-gray-500 dark:text-gray-400">The inkjet printer
                                            has been a frustrating experience. Print quality is inconsistent, with
                                            colors often</td>
                                        <td
                                            class="whitespace-nowrap p-4 text-sm font-medium text-gray-500 dark:text-gray-400">
                                            10 Feb 2024</td>
                                        <td class="p-4">
                                            <div class="flex items-center space-x-0.5">
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="2"
                                                        d="M11.083 5.104c.35-.8 1.485-.8 1.834 0l1.752 4.022a1 1 0 0 0 .84.597l4.463.342c.9.069 1.255 1.2.556 1.771l-3.33 2.723a1 1 0 0 0-.337 1.016l1.03 4.119c.214.858-.71 1.552-1.474 1.106l-3.913-2.281a1 1 0 0 0-1.008 0L7.583 20.8c-.764.446-1.688-.248-1.474-1.106l1.03-4.119A1 1 0 0 0 6.8 14.56l-3.33-2.723c-.698-.571-.342-1.702.557-1.771l4.462-.342a1 1 0 0 0 .84-.597l1.753-4.022Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="2"
                                                        d="M11.083 5.104c.35-.8 1.485-.8 1.834 0l1.752 4.022a1 1 0 0 0 .84.597l4.463.342c.9.069 1.255 1.2.556 1.771l-3.33 2.723a1 1 0 0 0-.337 1.016l1.03 4.119c.214.858-.71 1.552-1.474 1.106l-3.913-2.281a1 1 0 0 0-1.008 0L7.583 20.8c-.764.446-1.688-.248-1.474-1.106l1.03-4.119A1 1 0 0 0 6.8 14.56l-3.33-2.723c-.698-.571-.342-1.702.557-1.771l4.462-.342a1 1 0 0 0 .84-.597l1.753-4.022Z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </td>
                                        <td class="p-4 text-right">
                                            <button id="reviewActionsMenuDropdown3"
                                                data-dropdown-toggle="dropdownReview3" type="button"
                                                class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <span class="sr-only"> Actions </span>
                                                <svg class="h-5 w-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01"></path>
                                                </svg>
                                            </button>

                                            <div id="dropdownReview3"
                                                class="z-10 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700"
                                                data-popper-placement="bottom">
                                                <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                                    aria-labelledby="reviewActionsMenuDropdown3">
                                                    <li>
                                                        <button type="button"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z">
                                                                </path>
                                                            </svg>
                                                            <span>Edit review</span>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button id="deleteReviewButton3"
                                                            data-modal-target="deleteReviewModal"
                                                            data-modal-toggle="deleteReviewModal" type="button"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-red-600">
                                                            <svg class="me-1.5 h-4 w-4" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z">
                                                                </path>
                                                            </svg>
                                                            Delete review
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <th scope="row"
                                            class="whitespace-nowrap p-4 text-sm font-medium text-gray-900 dark:text-white">
                                            <a href="#" class="hover:underline">PlayStation®5 Console</a>
                                        </th>
                                        <td class="p-4 text-sm text-gray-500 dark:text-gray-400">Amazing controller,
                                            matching accessories. Super fast, batteries last more than usual, everything
                                            runs perfect in this...</td>
                                        <td
                                            class="whitespace-nowrap p-4 text-sm font-medium text-gray-500 dark:text-gray-400">
                                            05 Dec 2023</td>
                                        <td class="p-4">
                                            <div class="flex items-center space-x-0.5">
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </td>
                                        <td class="p-4 text-right">
                                            <button id="reviewActionsMenuDropdown4"
                                                data-dropdown-toggle="dropdownReview4" type="button"
                                                class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <span class="sr-only"> Actions </span>
                                                <svg class="h-5 w-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01"></path>
                                                </svg>
                                            </button>

                                            <div id="dropdownReview4"
                                                class="z-10 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700"
                                                data-popper-placement="bottom">
                                                <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                                    aria-labelledby="reviewActionsMenuDropdown4">
                                                    <li>
                                                        <button type="button"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z">
                                                                </path>
                                                            </svg>
                                                            <span>Edit review</span>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button id="deleteReviewButton4"
                                                            data-modal-target="deleteReviewModal"
                                                            data-modal-toggle="deleteReviewModal" type="button"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-red-600">
                                                            <svg class="me-1.5 h-4 w-4" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z">
                                                                </path>
                                                            </svg>
                                                            Delete review
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <th scope="row"
                                            class="whitespace-nowrap p-4 text-sm font-medium text-gray-900 dark:text-white">
                                            <a href="#" class="hover:underline">Microsoft Surface Pro,
                                                Copilot</a>
                                        </th>
                                        <td class="p-4 text-sm text-gray-500 dark:text-gray-400">The Microsoft Surface
                                            Pro with Copilot is a versatile and powerful device. The Copilot feature it
                                            can occasionally be a bit slow</td>
                                        <td
                                            class="whitespace-nowrap p-4 text-sm font-medium text-gray-500 dark:text-gray-400">
                                            18 Sep 2023</td>
                                        <td class="p-4">
                                            <div class="flex items-center space-x-0.5">
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </td>
                                        <td class="p-4 text-right">
                                            <button id="reviewActionsMenuDropdown5"
                                                data-dropdown-toggle="dropdownReview5" type="button"
                                                class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <span class="sr-only"> Actions </span>
                                                <svg class="h-5 w-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01"></path>
                                                </svg>
                                            </button>

                                            <div id="dropdownReview5"
                                                class="z-10 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700"
                                                data-popper-placement="bottom">
                                                <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                                    aria-labelledby="reviewActionsMenuDropdown5">
                                                    <li>
                                                        <button type="button"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z">
                                                                </path>
                                                            </svg>
                                                            <span>Edit review</span>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button id="deleteReviewButton5"
                                                            data-modal-target="deleteReviewModal"
                                                            data-modal-toggle="deleteReviewModal" type="button"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-red-600">
                                                            <svg class="me-1.5 h-4 w-4" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z">
                                                                </path>
                                                            </svg>
                                                            Delete review
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <th scope="row"
                                            class="whitespace-nowrap p-4 text-sm font-medium text-gray-900 dark:text-white">
                                            <a href="#" class="hover:underline">Sony a7 III (ILCEM3K/B)</a>
                                        </th>
                                        <td class="p-4 text-sm text-gray-500 dark:text-gray-400">The Sony a7 III is a
                                            versatile mirrorless camera that excels in both photo and video quality</td>
                                        <td
                                            class="whitespace-nowrap p-4 text-sm font-medium text-gray-500 dark:text-gray-400">
                                            18 Sep 2023</td>
                                        <td class="p-4">
                                            <div class="flex items-center space-x-0.5">
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                                <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </td>
                                        <td class="p-4 text-right">
                                            <button id="reviewActionsMenuDropdown6"
                                                data-dropdown-toggle="dropdownReview6" type="button"
                                                class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <span class="sr-only"> Actions </span>
                                                <svg class="h-5 w-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01"></path>
                                                </svg>
                                            </button>

                                            <div id="dropdownReview6"
                                                class="z-10 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700"
                                                data-popper-placement="bottom">
                                                <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                                    aria-labelledby="reviewActionsMenuDropdown6">
                                                    <li>
                                                        <button type="button"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                                                aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z">
                                                                </path>
                                                            </svg>
                                                            <span>Edit review</span>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button id="deleteReviewButton6"
                                                            data-modal-target="deleteReviewModal"
                                                            data-modal-toggle="deleteReviewModal" type="button"
                                                            class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-red-600">
                                                            <svg class="me-1.5 h-4 w-4" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z">
                                                                </path>
                                                            </svg>
                                                            Delete review
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="px-4 py-4">
                            <nav class="flex flex-col items-start justify-between space-y-3 md:flex-row md:items-center md:space-y-0"
                                aria-label="Table navigation">
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Showing <span
                                        class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span
                                        class="font-semibold text-gray-900 dark:text-white">1000</span></span>
                                <ul class="flex h-8 items-center -space-x-px text-sm">
                                    <li>
                                        <a href="#"
                                            class="ms-0 flex h-8 items-center justify-center rounded-s-lg border border-e-0 border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <span class="sr-only">Previous</span>
                                            <svg class="h-4 w-4 rtl:rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7">
                                                </path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                                    </li>
                                    <li>
                                        <a href="#" aria-current="page"
                                            class="z-10 flex h-8 items-center justify-center border border-blue-300 bg-blue-50 px-3 leading-tight text-blue-600 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex h-8 items-center justify-center rounded-e-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <span class="sr-only">Next</span>
                                            <svg class="h-4 w-4 rtl:rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7">
                                                </path>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="addReviewModal" tabindex="-1" aria-hidden="true"
        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden antialiased md:inset-0">
        <div class="relative max-h-full w-full max-w-2xl p-4">
            <!-- Modal content -->
            <div class="relative rounded-lg bg-white shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 dark:border-gray-700 md:p-5">
                    <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">Add a review</h3>
                    <button type="button"
                        class="absolute right-5 top-5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="addReviewModal">
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5">
                    <div class="mb-4 grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <h4 class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Please choose the
                                product:</h4>
                            <div
                                class="divide-y divide-gray-200 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm dark:divide-gray-700 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-center gap-6 p-4">
                                    <div>
                                        <input id="product1" type="checkbox" value=""
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                                        <label for="product1" class="sr-only"> Product 1 </label>
                                    </div>

                                    <div class="flex items-center gap-6">
                                        <div>
                                            <a href="#"
                                                class="flex aspect-square h-14 w-14 shrink-0 items-center sm:mb-0">
                                                <img class="h-auto max-h-full w-full dark:hidden"
                                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg"
                                                    alt="imac image" />
                                                <img class="hidden h-auto max-h-full w-full dark:block"
                                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg"
                                                    alt="imac image" />
                                            </a>
                                        </div>

                                        <div>
                                            <a href="#"
                                                class="font-medium text-gray-900 hover:underline dark:text-white sm:mt-0">
                                                PC APPLE iMac (2023)</a>
                                            <dl class="mt-2 items-center gap-2.5 sm:flex">
                                                <dt
                                                    class="text-base font-normal text-gray-500 dark:text-gray-400 lg:w-36">
                                                    Order Number:</dt>
                                                <dd class="text-base font-normal text-gray-500 dark:text-gray-400">
                                                    <a href="#" class="hover:underline">#737423642</a>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center gap-6 p-4">
                                    <div>
                                        <input id="product2" type="checkbox" value=""
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                                        <label for="product2" class="sr-only"> Product 2 </label>
                                    </div>

                                    <div class="flex items-center gap-6">
                                        <div>
                                            <a href="#"
                                                class="mb-4 flex aspect-square h-14 w-14 shrink-0 items-center sm:mb-0">
                                                <img class="h-auto max-h-full w-full dark:hidden"
                                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-light.svg"
                                                    alt="imac image" />
                                                <img class="hidden h-auto max-h-full w-full dark:block"
                                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-dark.svg"
                                                    alt="imac image" />
                                            </a>
                                        </div>

                                        <div>
                                            <a href="#"
                                                class="font-medium text-gray-900 hover:underline dark:text-white sm:mt-0">
                                                Apple Watch SE</a>
                                            <dl class="mt-2 items-center gap-2.5 sm:flex">
                                                <dt class="text-gray-500 dark:text-gray-400 lg:w-36">Order Number:
                                                </dt>
                                                <dd class="text-base font-normal text-gray-500 dark:text-gray-400">
                                                    <a href="#" class="hover:underline">#45632736</a>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center gap-6 p-4">
                                    <div>
                                        <input id="product3" type="checkbox" value=""
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                                        <label for="product3" class="sr-only"> Product 3 </label>
                                    </div>

                                    <div class="flex items-center gap-6">
                                        <div>
                                            <a href="#"
                                                class="flex aspect-square h-14 w-14 shrink-0 items-center sm:mb-0">
                                                <img class="h-auto max-h-full w-full dark:hidden"
                                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/ps5-light.svg"
                                                    alt="imac image" />
                                                <img class="hidden h-auto max-h-full w-full dark:block"
                                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/ps5-dark.svg"
                                                    alt="imac image" />
                                            </a>
                                        </div>

                                        <div>
                                            <a href="#"
                                                class="mb-2 font-medium text-gray-900 hover:underline dark:text-white sm:mt-0">
                                                Sony PlayStation 5</a>
                                            <dl class="mt-2 items-center gap-2.5 sm:flex">
                                                <dt class="text-gray-500 dark:text-gray-400 lg:w-36">Order Number:
                                                </dt>
                                                <dd class="text-base font-normal text-gray-500 dark:text-gray-400">
                                                    <a href="#" class="hover:underline">#45632736</a>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="flex items-center">
                                <svg class="h-6 w-6 text-yellow-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="ms-2 h-6 w-6 text-yellow-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="ms-2 h-6 w-6 text-yellow-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="ms-2 h-6 w-6 text-gray-300 dark:text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="ms-2 h-6 w-6 text-gray-300 dark:text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <span class="ms-2 text-lg font-bold text-gray-900 dark:text-white">3.0 out of 5</span>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="title"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Review
                                title</label>
                            <input type="text" name="title" id="title"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-600 focus:ring-blue-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                required="" />
                        </div>
                        <div class="col-span-2">
                            <label for="description"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Review
                                description</label>
                            <textarea id="description" rows="6"
                                class="mb-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                required=""></textarea>
                            <p class="ms-auto text-xs text-gray-500 dark:text-gray-400">Problems with the product or
                                delivery? <a href="#"
                                    class="text-blue-600 hover:underline dark:text-blue-500">Send a report</a>.
                            </p>
                        </div>
                        <div class="col-span-2">
                            <p class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Add real photos of
                                the product to help other customers <span
                                    class="text-gray-500 dark:text-gray-400">(Optional)</span></p>
                            <div class="flex w-full items-center justify-center">
                                <label for="dropzone-file"
                                    class="dark:hover:bg-bray-800 flex h-52 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pb-6 pt-5">
                                        <svg class="mb-4 h-8 w-8 text-gray-500 dark:text-gray-400"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                            800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" type="file" class="hidden" />
                                </label>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="flex items-center">
                                <input id="review-checkbox" type="checkbox" value=""
                                    class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                                <label for="review-checkbox"
                                    class="ms-2 text-sm font-medium text-gray-500 dark:text-gray-400">By publishing
                                    this review you agree with the <a href="#"
                                        class="text-blue-600 hover:underline dark:text-blue-500">terms and
                                        conditions</a>.</label>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 pt-4 dark:border-gray-700 md:pt-5">
                        <button type="submit"
                            class="me-2 inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                            review</button>
                        <button type="button" data-modal-toggle="addReviewModal"
                            class="me-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="deleteReviewModal" tabindex="-1" aria-hidden="true"
        class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
        <div class="relative h-full w-full max-w-md p-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative rounded-lg bg-white p-4 text-center shadow dark:bg-gray-800 sm:p-5">
                <button type="button"
                    class="absolute right-2.5 top-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="deleteReviewModal">
                    <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div
                    class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-gray-100 p-2 dark:bg-gray-700">
                    <svg class="h-8 w-8 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                    </svg>
                    <span class="sr-only">Danger icon</span>
                </div>
                <p class="mb-3.5 text-gray-900 dark:text-white">Are you sure you want to delete this review?</p>
                <p class="mb-4 text-gray-500 dark:text-gray-300">This action cannot be undone.</p>
                <div class="flex items-center justify-center space-x-4">
                    <button data-modal-toggle="deleteReviewModal" type="button"
                        class="rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">No,
                        cancel</button>
                    <button type="submit"
                        class="rounded-lg bg-red-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Yes,
                        delete</button>
                </div>
            </div>
        </div>
    </div>

    <div id="deleteOrderModal" tabindex="-1" aria-hidden="true"
        class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
        <div class="relative h-full w-full max-w-md p-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative rounded-lg bg-white p-4 text-center shadow dark:bg-gray-800 sm:p-5">
                <button type="button"
                    class="absolute right-2.5 top-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="deleteOrderModal">
                    <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div
                    class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-gray-100 p-2 dark:bg-gray-700">
                    <svg class="h-8 w-8 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                    </svg>
                    <span class="sr-only">Danger icon</span>
                </div>
                <p class="mb-3.5 text-gray-900 dark:text-white"><span
                        class="font-medium text-blue-700 dark:text-blue-500">@bonniegr</span>, are you sure you
                    want to delete this order from your account?</p>
                <p class="mb-4 text-gray-500 dark:text-gray-300">This action cannot be undone.</p>
                <div class="flex items-center justify-center space-x-4">
                    <button data-modal-toggle="deleteOrderModal" type="button"
                        class="rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600">No,
                        cancel</button>
                    <button type="submit"
                        class="rounded-lg bg-red-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Yes,
                        delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
