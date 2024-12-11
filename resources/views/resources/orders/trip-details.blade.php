@if ($order->orderable && $order->orderable_type === 'App\Models\Trip')
    {{-- Trip Info --}}
    <x-div class="gap-y-6">

        {{-- Vehicle --}}
        <div class="flex max-sm:flex-wrap items-center space-y-4 sm:gap-6 sm:space-y-0 md:justify-between">

            <x-img
                class="sm:w-40 max-h-40 rounded-md border  border-gray-600 dark:border-gray-500"
                src="{{ $order->orderable->vehicle->featured_image_url }}" alt="{{ $order->orderable->vehicle->name }}" />


            <div class="flex flex-wrap w-full items-center space-y-4">

                <div class="w-full hover:underline font-bold">
                    {{ $order->orderable->vehicle->name }}
                </div>

                <div class="w-full inline-flex space-x-2 max-lg:w-full">
                    <div class=" w-auto min-w-20 max-w-28">
                        x {{ countDays($order->orderable->days) }}
                    </div>

                    <div class="w-full text-right">
                        <p class="text-base font-bold">{{ humanizePrice($order->orderable->total_paid) }}</p>
                    </div>
                </div>
            </div>

        </div>
        <x-devider />

        {{-- Distance Allowed --}}
        <div class="space-y-2">
            <dl class="flex items-center justify-between gap-4">
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Start Date </dt>
                <dd class="text-base">
                    {{ isset($order->orderable->details->start->timestamp) ? date('d, M Y h:i A', $order->orderable->details->start->timestamp) : 'N/A' }}
                </dd>
            </dl>

            <dl class="flex items-center justify-between gap-4">
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">End Date </dt>
                <dd class="text-base">
                    {{ isset($order->orderable->details->end->timestamp) ? date('d, M Y h:i A', $order->orderable->details->end->timestamp) : 'N/A' }}
                </dd>
            </dl>
        </div>

        <x-button href="{{ route( (getUser()? 'user' : 'admin') . '.trips.show', $order->orderable->id) }}"
            class="w-full mt-6 flex justify-center items-center">
            View {{ class_basename($order->orderable) }}
        </x-button>
    </x-div>
@endif
