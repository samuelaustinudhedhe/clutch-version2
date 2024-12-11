<div class="mx-4 lg:mx-6 lg:mb-2">
    <x-div class="flex sm:flex-row flex-col gap-4 justify-between !my-0 lg:!my-2">
                <div class="">
                    <h1 class="text-xl">
                        {{ __('User: #') . $user->id }}
                    </h1>
                </div>
                    <div>
                        Role: <span class="px-3 py-1 font-bold rounded {{ $user->status_color }}"> {{ $user->role }}
                            </san>
                    </div>
            
            </x-div>

        <div class="mx-auto pt-2 pb-4 ">
  

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
                            Orders
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
                            Refunds
                        </button>
                    </li>
                    <li role="presentation">
                        <button class="inline-flex w-full items-center justify-center rounded-lg py-3 id="actions-tab"
                            data-tabs-target="#actions" type="button" role="tab" aria-controls="actions"
                            aria-selected="false">
                            <svg class="me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2"
                                    d="M11.083 5.104c.35-.8 1.485-.8 1.834 0l1.752 4.022a1 1 0 0 0 .84.597l4.463.342c.9.069 1.255 1.2.556 1.771l-3.33 2.723a1 1 0 0 0-.337 1.016l1.03 4.119c.214.858-.71 1.552-1.474 1.106l-3.913-2.281a1 1 0 0 0-1.008 0L7.583 20.8c-.764.446-1.688-.248-1.474-1.106l1.03-4.119A1 1 0 0 0 6.8 14.56l-3.33-2.723c-.698-.571-.342-1.702.557-1.771l4.462-.342a1 1 0 0 0 .84-.597l1.753-4.022Z" />
                            </svg>
                            Actions
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

                        <x-data-list 
                            title="Personal Details"
                            :items="[
                                'Name' => $user->name,
                                'Gender' => $user->details->gender,
                                'Nationality' => $user->address->home->country ?? 'Unknown',
                            ]"
                        />

                        <x-data-list 
                            title="Contact Details"
                            :items="[
                                'Email' => $user->email,
                                'Home Phone' => $user->humanized_home_phone,
                                'Work Phone' => $user->humanized_work_phone,
                            ]"
                        />

                        <x-data-list 
                            title="Addresses"
                            :items="[
                                'Home' => $user->humanized_home_address,
                                'Work' => $user->humanized_work_address,
                            ]"
                        />

                    </div>
                </div>
                <div class="hidden" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                    <div class="mt-4 space-y-4">

                        <div
                            class="divide-y divide-gray-200 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm dark:divide-gray-700 dark:border-gray-700 dark:bg-gray-800">
                            <div class="space-y-4 p-4">
                                <div
                                    class="flex flex-col-reverse items-center justify-between md:flex-row md:space-x-4">
                                    <x-search class="w-full flex-1 md:mr-4 md:max-w-md" wire:model.live="ordersSearch" />                          
                                </div>
                            </div>

                            <div class="relative overflow-x-auto">
                                <table
                                    class="w-full divide-y divide-gray-200 text-left text-sm text-gray-900 dark:divide-gray-700 dark:text-white">
                                    <thead
                                        class="bg-gray-50 text-xs whitespace-nowrap uppercase  text-gray-500 dark:text-gray-400 dark:bg-gray-700 ">
                                        <tr>
                                            <th scope="col"class=" p-4 "> Order ID </th>
                                            <th scope="col"class=" p-4 "> Date </th>
                                            <th scope="col"class=""> Price </th>
                                            <th scope="col"class=""> Status </th>
                                            <th scope="col" class="p-4 text-xs font-semibold uppercase">
                                                <span class="sr-only"> Actions </span>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                        @forelse ($orders as $order)
                                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                                <th scope="row" class="whitespace-nowrap p-4 font-medium text-gray-900 dark:text-white">
                                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="hover:underline">{{ $order->id }}</a>
                                                </th>
                                                <td class="whitespace-nowrap p-4 text-sm font-medium">{{ $order->created_at->format('d M Y') }}</td>
                                                <td class="whitespace-nowrap p-4 text-sm font-medium">{{ $order->human_total_price }}</td>
                                                <td class="p-4">
                                                    <span class="me-2 inline-flex items-center rounded bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                                        <svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.5 4h-13m13 16h-13M8 20v-3.333a2 2 0 0 1 .4-1.2L10 12.6a1 1 0 0 0 0-1.2L8.4 8.533a2 2 0 0 1-.4-1.2V4h8v3.333a2 2 0 0 1-.4 1.2L13.957 11.4a1 1 0 0 0 0 1.2l1.643 2.867a2 2 0 0 1 .4 1.2V20H8Z" />
                                                        </svg>
                                                        {{ $order->status }}
                                                    </span>
                                                </td>
                                                <td class="p-4 text-right">
                                                    <button id="actionsMenuDropdown{{ $order->id }}" data-dropdown-toggle="dropdownOrder{{ $order->id }}" type="button" class="inline-flex h-7 w-7 items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <span class="sr-only">Actions</span>
                                                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01" />
                                                        </svg>
                                                    </button>
                                        
                                                    <div id="dropdownOrder{{ $order->id }}" class="z-10 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700">
                                                        <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400" aria-labelledby="actionsMenuDropdown{{ $order->id }}">
                                                            <li>
                                                                <a href="#" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                    <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4" />
                                                                    </svg>
                                                                    <span>Order again</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                    <svg class="me-1.5 h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                                        <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                    </svg>
                                                                    Order details
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <button id="deleteOrderButton" data-modal-target="deleteOrderModal" data-modal-toggle="deleteOrderModal" type="button" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                    <svg class="me-1.5 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                                    </svg>
                                                                    Cancel order
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="p-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                                    No orders found for this user.
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>

                            {{ $orders->links('vendor.pagination.simple') }}

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
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
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
                <div class="hidden" id="actions" role="tabpanel" aria-labelledby="actions-tab">
                    <div
                        class="divide-y divide-gray-200 rounded-lg border border-gray-200 bg-white shadow-sm dark:divide-gray-700 dark:border-gray-700 dark:bg-gray-800">
                        <div class="relative">
                            <div
                                class="mx-4 items-center justify-between space-y-4 border-b border-gray-200 py-4 dark:border-gray-700 sm:flex md:space-x-4 md:space-y-0">
                                <div class="flex items-center space-x-3">
                                    <h5 class="font-semibold dark:text-white">All actions</h5>
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

</div>
