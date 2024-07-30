<x-guest-layout>
    <div class="h-96 flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-9xl font-bold text-gray-400 dark:text-gray-600">
                404
            </h1>
            <p class="text-2xl md:text-3xl font-light leading-normal">
                Sorry, the page you are looking for could not be found.
            </p>
            <p class="mt-4">
                But don't worry, you can find plenty of other things on our homepage.
            </p>
            <x-button href="{{ url('/') }}" class="mt-6 px-8 py-3 rounded " color="blue" focus="false">
                Go to Homepage
            </x-button>
        </div>
    </div>
</x-guest-layout>
