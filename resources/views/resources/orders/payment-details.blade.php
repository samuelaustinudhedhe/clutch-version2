<x-div class=" space-y-2 ">
    <h3 class="text-lg font-normal mb-4">Payment Details</h3>
    <dl class="flex items-center justify-between gap-4">
        <dt class="text-lg capitalize font-normal text-gray-500 dark:text-gray-400">
            {{ $order->payment['status'] }} on:
        </dt>
        <dd class="text-lg">
            {{ $order->created_at->format('F j, Y, g:i a') }}
        </dd>
    </dl>
    <dl class="flex items-center justify-between gap-4">
        <dt class="text-lg font-normal text-gray-500 dark:text-gray-400">
            Payment method:
        </dt>
        <dd class="text-lg">
            {{ $order->payment['method'] }}
        </dd>
    </dl>

    <dl class="flex items-center justify-between gap-4">
        <dt class="text-lg font-normal text-gray-500 dark:text-gray-400">
            Discount:
        </dt>
        <dd class="text-lg">
            {{ $order->price['discount'] }} {{ $order->price['currency'] }}
        </dd>
    </dl>
    <dl class="flex items-center justify-between gap-4">
        <dt class="text-lg font-normal text-gray-500 dark:text-gray-400">
            Tax:
        </dt>
        <dd class="text-lg">
            {{ $order->human_tax }} {{ $order->price['currency'] }}
        </dd>
    </dl>

    <dl class="flex items-center justify-between gap-4">
        <dt class="text-lg font-normal text-gray-500 dark:text-gray-400">
            Total:
        </dt>
        <dd class="text-lg">
            {{ $order->human_total_price }} {{ $order->price['currency'] }}
        </dd>
    </dl>
</x-div>
