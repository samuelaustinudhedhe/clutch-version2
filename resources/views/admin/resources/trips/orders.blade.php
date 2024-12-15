<div class="mx-4 lg:mx-6 lg:mb-2">

    <x-div class="flex sm:flex-row flex-col gap-4 justify-between !my-0 lg:!my-2">
        <div class="">
            <h1 class="text-xl font-bold">
                {{ __('Trip orders: #') . $trip->id . ' ' }}
            </h1>
        </div>
        <div>
            Status: <span class="px-3 py-1 font-bold rounded {{ $trip->status_color }}"> {{ ucfirst($trip->status) }}
            </span>
        </div>
    </x-div>
    @if ($orders)
        <div class="lg:flex lg:flex-row gap-4 lg:gap-6">
            <div class="min-w-[50%]">

                @foreach ($orders as $order)
                    {{-- Order Details --}}
                    <x-div class="space-y-2">
                        <x-a href="{{ route('admin.orders.show', $order->id) }}" class=" inline-flex items-baseline mb-4 "
                            color="white">
                            <h3 class="text-lg font-normal">Payment Details</h3>
                            <span>(#{{ $order->id ?? 'N/A' }})</span>
                        </x-a>
                        <dl class="flex items-center justify-between gap-4">
                            <dt class="text-lg font-normal text-gray-500 dark:text-gray-400">Placed on:</dt>
                            <dd class="text-lg text-right">{{ $order->created_at->format('F j, Y, g:i a') }}</dd>
                        </dl>
                        <dl class="flex items-center justify-between gap-4">
                            <dt class="text-lg font-normal text-gray-500 dark:text-gray-400">Method:</dt>
                            <dd class="text-lg">{{ $order->payment['method'] }}</dd>
                        </dl>
                        <dl class="flex items-center justify-between gap-4">
                            <dt class="text-lg font-normal text-gray-500 dark:text-gray-400">Status:</dt>
                            <dd class="text-lg">
                                {{ ucfirst($order->payment['status']) ?? 'N/A' }}

                            </dd>
                        </dl>
                        <dl class="flex items-center justify-between gap-4">
                            <dt class="text-lg font-normal text-gray-500 dark:text-gray-400">Total:</dt>
                            <dd class="text-lg">{{ $order->human_total_price }} {{ $order->price['currency'] }}</dd>
                        </dl>

                    </x-div>
                @endforeach
            </div>

            <div class="w-full flex flex-col justify-between">
                {{-- Ordered Item --}}
                {{-- TODO: make ordered items show other items and not just trips --}}
                <x-div class="space-y-2">
                    <h3 class="text-lg font-normal mb-4">Ordered Item</h3>
                    <div class="relative">
                        <img src="{{ $trip->vehicle->featured_image_url }}"
                            class="rounded min-w-72 w-full min-h-44 h-full object-cover" width="220px" height="180px"
                            alt="{{ $trip->vehicle->name }} image" />
                    </div>
                    <x-a href="{{ route('vehicles.show', $trip->vehicle->id) }}" target="_blank"
                        class="!text-xl font-medium text-gray-900 dark:text-white hover:underline">{{ $trip->vehicle->name }}</x-a>
                </x-div>

                {{-- Customer Details --}}
                {{-- <x-div class="space-y-2">
                    <x-a href="{{ route('admin.orders.show', $order->id) }}"
                        class=" inline-flex items-baseline mb-4 " color="white" >
                        <h3 class="text-lg font-normal">Customer Details</h3>
                        <span>(#{{ $order->id ?? 'N/A' }})</span>
                    </x-a>
                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-lg font-normal text-gray-500 dark:text-gray-400">Name</dt>
                        <dd class="text-lg">{{ $trip->traveler->name }}</dd>
                    </dl>
                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-lg font-normal text-gray-500 dark:text-gray-400">Gender</dt>
                        <dd class="text-lg">{{ $trip->traveler->details->gender }}</dd>
                    </dl>
                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-lg font-normal text-gray-500 dark:text-gray-400">Nationality</dt>
                        <dd class="text-lg">{{ $trip->traveler->address->home->country ?? 'Unknown' }}</dd>
                    </dl>
                  
                </x-div> --}}

            </div>
        </div>
    @else
        <p>No order details available.</p>
    @endif


</div>
