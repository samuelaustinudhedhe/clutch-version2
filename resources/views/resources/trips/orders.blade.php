
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