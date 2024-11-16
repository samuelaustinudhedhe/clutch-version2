<div class="max-w-screen-2xl m-auto flex flex-col min-h-screen space-y-4 lg:space-y-6 px-4 mb-4 lg:mb-6 lg:mx-6">
    <!-- Start coding here -->
    <x-div class="!p-0">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

            <div class="flex items-center lg:max-w-28 w-full">
                <h1 class="text-xl xl:text-2xl font-bold whitespace-nowrap">My Orders</h1>
            </div>

            <div class="sm:flex items-center lg:justify-end lg:w-4/6 w-full sm:space-y-0 space-y-4  sm:space-x-6">
                <div class="w-full lg:max-w-lg">
                    <x-search wire:model.live="search" placeholder="Search..." />
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="pr-4 py-3 pl-6">order id</th>
                        <th scope="col" class="px-4 py-3">Category</th>
                        <th scope="col" class="px-4 py-3">Brand</th>
                        <th scope="col" class="px-4 py-3">Payment Method</th>
                        <th scope="col" class="px-4 py-3">Price</th>
                        <th scope="col" class="pr-6 py-3 pl-4">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Items list --}}
                    @foreach ($orders as $order)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row"
                                class="pr-4 py-3 pl-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                #{{ $order->id }}&#34;</th>
                            <td class="px-4 py-3">{{ class_basename($order->orderable_type) }}</td>
                            <td class="px-4 py-3">{{ class_basename($order->orderable_id) }}</td>
                            <td class="px-4 py-3">{{ $order->payment['method'] ?? 'N/A' }}</td>
                            <td class="px-4 py-3">{{ humanizePrice($order->price['total']) ?? 'N/A' }}</td>
                            <td class="pr-6 py-3 pl-4 flex items-center justify-end">
                                <button id="{{ $order->id }}-dropdown-button"
                                    data-dropdown-toggle="{{ $order->id }}-dropdown"
                                    class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                    type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                                <div id="{{ $order->id }}-dropdown"
                                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="{{ $order->id }}-dropdown-button">
                                        <li>
                                            <a href="{{ route('user.orders.show', $order) }}"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Show
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Edit
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    {{-- Id no orders are found --}}
                    @if ($orders->isEmpty())
                        <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 h-80">
                            <td class="px-4 py-6 text-center text-md font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                colspan="6">
                                {{ __('There are no orders found at this time') }}
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
        {{ $orders->links('vendor.pagination.data') }}
    </x-div>
</div>
