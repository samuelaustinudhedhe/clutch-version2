{{-- No order Found --}}

@include('resources.orders.top-bar', ['order' => $queriedOrder, 'status' => true])

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
