<div class="mx-4 lg:mx-6 lg:mb-2">
   
        <x-div class="flex sm:flex-row flex-col gap-4 justify-between !my-0 lg:!my-2">
            <div class="">
                <h1 class="text-xl font-bold">
                    {{ __('Order: #') . $order->id }}
                </h1>
            </div>
            <div>
                Status: <span
                    class="px-3 py-1 font-bold rounded {{ $order->status_color }}"> {{ ucfirst($order->payment['status']) }} </span>
            </div>
        </x-div>
 @if ($order)
        <div class="lg:flex lg:flex-row gap-4 lg:gap-6">
            <div class="min-w-[50%]">
                {{-- Order Details --}}
                <x-div class="space-y-2">
                    <h3 class="text-lg font-normal mb-4">Order Details</h3>
                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-lg font-normal text-gray-500 dark:text-gray-400">Placed on:</dt>
                        <dd class="text-lg">{{ $order->created_at->format('F j, Y, g:i a') }}</dd>
                    </dl>
                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-lg font-normal text-gray-500 dark:text-gray-400">Payment method:</dt>
                        <dd class="text-lg">{{ $order->payment['method'] }}</dd>
                    </dl>
                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-lg font-normal text-gray-500 dark:text-gray-400">Total:</dt>
                        <dd class="text-lg">{{ $order->human_total_price }} {{ $order->price['currency'] }}</dd>
                    </dl>
                </x-div>

                {{-- Additional Details --}}
                <x-div class="space-y-2">
                    <h3 class="text-lg font-normal mb-4">Additional Details</h3>
                    <p class="text-gray-800">{{ $order->details['notes'] ?? 'No additional details' }}</p>
                </x-div>
            </div>

            <div class="w-full flex flex-col justify-between">
                {{-- Ordered Item --}}
                <x-div class="space-y-2">
                    <h3 class="text-lg font-normal mb-4">Ordered Item</h3>
                    <div class="relative">
                        <img src="{{ $order->orderable->vehicle->featured_image_url }}"
                            class="rounded min-w-80 w-full min-h-44 h-full object-cover" width="220px" height="180px"
                            alt="{{ $order->orderable->vehicle->name }} image" />
                    </div>
                    <a href="{{ route('vehicles.show', $order->orderable->vehicle->id) }}" target="_blank"
                        class="!text-xl font-medium text-gray-900 dark:text-white hover:underline">{{ $order->orderable->vehicle->name }}</a>
                </x-div>

                {{-- Customer Details --}}
                <x-div class="space-y-2">
                    <h3 class="text-lg font-normal mb-4">Customer Details</h3>
                    <p class="text-gray-800">{{ $order->authorable->name }}</p>
                    <p class="text-gray-800">{{ $order->authorable->email }}</p>
                </x-div>
            </div>
        </div>
    @else
        <p>No order details available.</p>
    @endif


</div>