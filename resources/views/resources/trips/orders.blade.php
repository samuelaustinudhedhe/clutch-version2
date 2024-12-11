<div class="mx-4 lg:mx-6 lg:mb-2">
    @if ($order)
        @include('resources.orders.top-bar', ['order' => $order, 'status' => true])

        <div class="lg:flex lg:flex-row gap-4 lg:gap-6 ">
            <div class="min-w-[50%]">

                {{-- Payment --}}
                @include('resources.orders.payment-details', ['order' => $order])

                {{-- Additional Details --}}
                @include('resources.orders.additional-details', ['order' => $order, $note => true])

            </div>

            <div class="w-full">

                {{-- Payer Details --}}
                @include('resources.orders.payer-details',['order' => $order])
                
                {{-- Trip Details --}}
                @include('resources.orders.trip-details', ['order' => $order])

            </div>

        </div>
    @else

        {{-- no order found --}}
        @include('resources.orders.no-order-found',['queriedOrder' => $queriedOrder])

    @endif
</div>
