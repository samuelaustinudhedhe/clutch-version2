@if ($payer == true)
    <x-div class="space-y-2 ">
        <h3 class="text-lg font-normal mb-4">Payer Details</h3>
        <dl class="flex items-center justify-between gap-4">
            <dt class="text-lg font-normal text-gray-500 dark:text-gray-400">
                ID
            </dt>
            <dd class="text-lg">
                {{ $order->authorable->id }}
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
@endif
