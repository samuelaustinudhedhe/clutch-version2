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

{{-- Additional Note --}}
@if ($note != false)
    @include('resources.orders.addtional-note', ['order' => $order])
@endIf
