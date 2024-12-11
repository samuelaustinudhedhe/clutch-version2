<x-div class="flex sm:flex-row flex-col gap-4 justify-between !my-0 lg:!my-2">
    <div class="">
        <h1 class="text-xl">
            {{ __('Order: #') . $order->id }}
        </h1>
    </div>
    @if ($status == true)
        <div>
            Status: <span class="px-3 py-1 font-bold rounded {{ $order->status_color }}"> {{ $order->payment['status'] }}
                </san>
        </div>
    @endif

</x-div>
