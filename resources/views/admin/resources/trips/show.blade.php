<div class="mx-4 lg:mx-6 lg:mb-2">
    <x-div class="flex sm:flex-row flex-col gap-4 justify-between !my-0 lg:!my-2">
        <div class="">
            <h1 class="text-xl font-bold ">
                {{ __('Trip: #') . $trip->id }}
            </h1>
        </div>

        <div>
            Status: <span
                class="px-3 py-1 rounded text-sm {{ $trip->status_text_color }}">{{ ucfirst($trip->status) }}</span>
        </div>
    </x-div>

    <div class="lg:flex lg:flex-row gap-4 lg:gap-6 ">
        <x-div class="min-w-[60%]">
            {{-- Featured Image --}}
            <div class="relative">
                <img src="{{ $trip->vehicle->featured_image_url }}"
                    class="rounded  min-w-80 w-full min-h-44 h-full object-cover" width="220px" height="180px"
                    alt="{{ $trip->vehicle->name }} image" />
            </div>

            {{-- <div class="w-full min-w-0 flex-1 space-y-4 md:max-w-md ">
                <a href="{{ route('vehicles.show', $trip->vehicle->id) }}" target="_blank"
                    class="!text-xl font-medium text-gray-900 dark:text-white hover:underline">{{ $trip->vehicle->name }}</a>
            </div> --}}

            <div class="my-8">
                @include('pages.vehicles.show.name', ['vehicle' => $trip->vehicle])
            </div>

            {{-- Details --}}
            @include('pages.vehicles.show.basic-details', ['vehicle' => $trip->vehicle])

            {{-- Host --}}
            @include('pages.vehicles.show.host', ['vehicle' => $trip->vehicle])


        </x-div>

        <div class="w-full flex flex-col justify-between">
            <div>
                <x-div>
                    {{-- Distance Allowed --}}
                    <div class="space-y-2">
                        <dl class="flex items-center justify-between gap-4">
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Start Date </dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-white">
                                {{ isset($trip->details->start->timestamp) ? date('d, M Y h:i A', $trip->details->start->timestamp) : 'N/A' }}
                            </dd>
                        </dl>

                        <dl class="flex items-center justify-between gap-4">
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">End Date </dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-white">
                                {{ isset($trip->details->end->timestamp) ? date('d, M Y h:i A', $trip->details->end->timestamp) : 'N/A' }}
                            </dd>
                        </dl>
                        <dl class="flex items-center justify-between gap-4">
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Drop-off Location </dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-white">
                                {{ formatAddress($trip->details->end->location, 'city, state, country') ?? 'N/A' }}</dd>
                        </dl>
                        <dl class="flex items-center justify-between gap-4">
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Pickup Location </dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-white">
                                {{ formatAddress($trip->details->start->location, 'city, state, country') ?? 'N/A' }}
                            </dd>
                        </dl>

                        <dl class="flex items-center justify-between gap-4">
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Allowed Mileage</dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-white">
                                {{ $trip->vehicle->details->maximum_mileage ?? 'Unlimited' }}</dd>
                        </dl>

                        {{-- aditionaly millage cost --}}
                        @if (isset($trip->vehicle->details->maximum_mileage) || isset($trip->vehicle->price->cost_per_mileage))
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Price/Mileage</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">
                                    {{ humanizePrice($trip->vehicle->price->cost_per_mileage ?? 100) }}</dd>
                            </dl>
                        @endif


                        <dl class="flex items-center justify-between gap-4">
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Discount</dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-white">
                                {{ $trip->details->location->pickup->full ?? 'N/A' }}</dd>
                        </dl>

                        <dl class="flex items-center justify-between gap-4">
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Total Price</dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-white">
                                {{ humanizePrice($trip->details->price->total_paid) ?? 'N/A' }}</dd>
                        </dl>
                    </div>
                </x-div>

                <x-div>
                    {{-- Orders for the Trip --}}
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-lg font-semibold">Payments</h3>
                            <p class="text-sm mt-2">There are <span
                                    class=" text-gray-900 dark:text-white">{{ count($trip->orders) }}</span> payment(s)
                                made for this trip from the time of booking</p>
                        </div>
                        @foreach ($trip->orders->take(1) as $order)
                            <div class="border-t border-gray-300 dark:border-gray-600 pt-4 mt-4">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Order ID</dt>
                                    <dd class="text-base font-medium">
                                        {{ $order->id ?? 'N/A' }}
                                    </dd>
                                </dl>
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Order Date</dt>
                                    <dd class="text-base font-medium">
                                        {{ $order->created_at->format('d, M Y h:i A') ?? 'N/A' }}
                                    </dd>
                                </dl>
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Payment Status
                                    </dt>
                                    <dd class="text-base font-medium">
                                        {{ ucfirst($order->payment['status']) ?? 'N/A' }}
                                    </dd>
                                </dl>
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Payment Method
                                    </dt>
                                    <dd class="text-base font-medium">
                                        {{ $order->payment['method'] ?? 'N/A' }}
                                    </dd>
                                </dl>
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Discount</dt>
                                    <dd class="text-base font-medium">
                                        {{ $order->price['discount'] ?? 'N/A' }} {{ $order->price['currency'] ?? '' }}
                                    </dd>
                                </dl>
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                                    <dd class="text-base font-medium">
                                        {{ $order->human_tax ?? 'N/A' }} {{ $order->price['currency'] ?? '' }}
                                    </dd>
                                </dl>
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Total Price</dt>
                                    <dd class="text-base font-medium">
                                        {{ $order->human_total_price ?? 'N/A' }} {{ $order->price['currency'] ?? '' }}
                                    </dd>
                                </dl>
                            </div>
                        @endforeach

                        @if ($trip->orders->count() > 1)
                            <div class="mt-4">
                                <a href="{{ route('admin.trips.orders', $trip->id) }}"
                                    class="text-blue-600 dark:text-blue-400 hover:underline">
                                    View all orders
                                </a>
                            </div>
                        @endif
                    </div>
                </x-div>

            </div>

            <x-div class="flex space-x-6 ">
                @if ($this->trip->details->start->timestamp <= now()->timestamp && $this->trip->status === 'pending')
                    <button type="button" wire:click="requestEndTrip"
                        wire:confirm="Are you sure you want to end this trip?"
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        End Trip
                    </button>
                @else
                    <button type="button" wire:click="requestCancelTrip"
                        wire:confirm="Are you sure you want to cancle this trip?"
                        class="w-full bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Cancel Trip
                    </button>
                @endif

            </x-div>

        </div>

    </div>

</div>
