<div class="mx-4 lg:mx-6 lg:mb-2">
    @if ($orders->isNotEmpty())
        <table class="min-w-full bg-white dark:bg-gray-800">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Order ID</th>
                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Status</th>
                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Placed On</th>
                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Payment Method</th>
                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Total</th>
                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Ordered Item</th>
                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Customer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $order->id }}</td>
                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">
                            <span class="px-3 py-1 font-bold rounded {{ $order->status_color }}">
                                {{ ucfirst($order->payment['status']) }}
                            </span>
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">
                            {{ $order->created_at->format('F j, Y, g:i a') }}
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">{{ $order->payment['method'] }}</td>
                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">
                            {{ $order->human_total_price }} {{ $order->price['currency'] }}
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">
                            <a href="{{ route('vehicles.show', $order->orderable->vehicle->id) }}" target="_blank"
                               class="text-blue-600 hover:underline">
                                {{ $order->orderable->vehicle->name }}
                            </a>
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">
                            {{ $order->authorable->name }}<br>
                            {{ $order->authorable->email }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No orders available for this trip.</p>
    @endif
</div>