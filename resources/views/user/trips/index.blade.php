<div class="h-full flex items-center justify-center">
    {{-- Do your work, then step back. --}}

    @empty($trips)
        <div class="flex items-center justify-center my-10 mt-20 ">
            <div class="grid space-y-6 text-center">
                <img src="/assets/images/placeholders/985e307e72.png" alt="Placeholder Image" class="mx-auto max-w-sm">
                <p class="text-gray-600 mt-8 dark:text-gray-300">You have no trips planned.</p>
                <p class="text-gray-600 mt-8 dark:text-gray-300">Explore Africa's largest vehicle sharing marketplace and book your next trip</p>
                <x-button class="mx-auto">Book a trip</x-button>
            </div>
        </div>
    @endempty
</div>