@isset($order->details['notes'])
    <x-div class=" space-y-2 ">
        <h3 class="text-lg font-normal mb-4">Note</h3>

        <p>
            {{ $order->details['notes'] ?? 'No additional details' }}
        </p>

    </x-div>
@endisset
