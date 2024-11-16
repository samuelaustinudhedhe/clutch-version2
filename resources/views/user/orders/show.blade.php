<div class="mx-4 lg:mx-6 lg:mb-2">
    @if ($order)
        <x-div class="flex sm:flex-row flex-col gap-4 justify-between !my-0 lg:!my-2">
            <div class="">
                <h1 class="text-xl">
                    {{ __('Order: #') . $order->id }}
                </h1>
            </div>
            <div>
                Status: <span
                    class="px-3 py-1 font-bold rounded {{ $order->status_color }}"> {{ $order->payment['status'] }} </san>
            </div>
        </x-div>

        <div class="lg:flex lg:flex-row gap-4 lg:gap-6 ">
            <div class="min-w-[50%]">

                {{-- Payment --}}
                <x-div class=" space-y-2 ">
                    <h3 class="text-lg font-normal mb-4">Paymant Details</h3>
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
                            {{ ($order->human_total_price) }} {{ $order->price['currency'] }}
                        </dd>
                    </dl>
                </x-div>

                {{-- Additional Details --}}
                <x-div class=" space-y-2 ">
                    <h3 class="text-lg font-normal mb-4">Additional Details</h3>

                    @foreach ($order->details ?? [] as $key => $value)
                        <dl class="flex items-center justify-between gap-4">
                            <dt class="text-lg font-norma capitalizel text-gray-500 dark:text-gray-400">
                                {{ str_replace('_', ' ', $key) }}
                            </dt>
                            <dd class="text-lg">
                                {{ $value }}
                            </dd>
                        </dl>
                    @endforeach


                </x-div>

                {{-- Aditional Note --}}
                @isset($order->details['notes'])
                    <x-div class=" space-y-2 ">
                        <h3 class="text-lg font-normal mb-4">Note</h3>

                        <p>
                            {{ $order->details['notes'] ?? 'No additional details' }}
                        </p>

                    </x-div>
                @endisset

            </div>

            <div class="w-full">

                {{-- User Details --}}
                <x-div class="space-y-2 ">
                    <h3 class="text-lg font-normal mb-4">Payer Details</h3>
                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-lg font-normal text-gray-500 dark:text-gray-400">
                            ID
                        </dt>
                        <dd class="text-lg">
                            {{$order->authorable->id }}
                        </dd>
                    </dl>
                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-lg font-normal text-gray-500 dark:text-gray-400">
                            Name
                        </dt>
                        <dd class="text-lg">
                            {{ $order->authorable->name }}
                        </dd>
                    </dl>
                    <dl class="flex items-center justify-between gap-4">
                        <dt class="text-lg font-normal text-gray-500 dark:text-gray-400">
                            Email
                        </dt>
                        <dd class="text-lg">
                            {{ $order->authorable->email }}
                        </dd>
                    </dl>

                </x-div>

                {{-- Trip details --}}
                @if ($order->orderable && $order->orderable_type === 'App\Models\Trip')
                    {{-- Trip Info --}}
                    <x-div class="gap-y-6">
                        
                        {{-- Vehicle --}}
                        <div class="flex items-center space-y-4 sm:gap-6 sm:space-y-0 md:justify-between">
                            <div
                                class="w-full items-center space-y-4 sm:flex sm:space-x-6 sm:space-y-0 md:max-w-md lg:max-w-lg">
                                
                                    <x-img class="h-auto max-w-52 w-auto max-h-40 rounded-md border max-md:max-w-32 max-md:max-h-28  border-gray-600 dark:border-gray-500"
                                        src="{{ $order->orderable->vehicle->featured_image_url }}"
                                        alt="{{ $order->orderable->vehicle->name }}" />

                                <div class="w-full max-lg:hidden md:max-w-sm lg:max-w-md hover:underline">
                                    {{ $order->orderable->vehicle->name }}
                                </div>
                            </div>

                            <div class="w-8 shrink-0">
                                <p class="text-base font-normal">x1</p>
                            </div>

                            <div class="md:w-24 md:text-right">
                                <p class="text-base font-bold">$1,499</p>
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

                        <x-button href="{{ route('user.trips.show', $order->orderable->id) }}"
                            class="w-full mt-6 flex justify-center items-center">
                            View {{ class_basename($order->orderable) }}
                        </x-button>
                    </x-div>
                @endif
            </div>

        </div>
    @else
        <x-div class="flex sm:flex-row flex-col gap-4 justify-between !my-0 lg:!my-2">
            <div class="">
                <h1 class="text-xl font-bold ">
                    {{ __('Order: #') . $queriedOrder }}
                </h1>
            </div>


        </x-div>
        <x-div class="flex flex-col items-center justify-center space-y-4 py-8">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                {{ __('Invalid Order') }}
            </h1>
            {{-- <x-img src="" /> --}}

            <p class="text-gray-600 dark:text-gray-400">
                Sorry, the order you're looking for does not exist or is not associated with your account.
            </p>
            <x-a href="{{ route('user.orders.index') }}">
                View your Orders
            </x-a>
        </x-div>
    @endif
</div>
