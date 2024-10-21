<x-guest-layout>
    <div class="h-96 flex items-center justify-center">
        <div class="text-center py-10">
            @if ($message)
                <h1 class="text-9xl font-bold text-gray-500 dark:text-gray-500">
                    Error Error!
                </h1>
                <p class="text-2xl md:text-3xl font-light leading-normal mt-10">
                    {{ $message }}
                </p>
            @else
                <h1 class="text-9xl font-bold text-gray-500 dark:text-gray-500">
                    Hey!
                </h1>
                <p class="text-2xl md:text-3xl font-light leading-normal mt-10">
                    You are not allowed to do that!
                </p>
            @endif

            <x-button href="{{ url('/') }}" class="mt-6 px-8 py-3 rounded text-[18px]" color="blue" focus="false">
                Start all over
            </x-button>
        </div>
    </div>
</x-guest-layout>
