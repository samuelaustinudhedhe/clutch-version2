{{-- User Profile Edit Sublayout --}}
<x-app-layout>
    <div class="w-full h-full">
        {{-- Top --}}
        <div class="flex items-center justify-center">
            <div class="flex items-center max-h-14 min-w-md w-full space-x-5 my-2">
                <a href="{{ route('user.profile.show') }}" class="">
                    <svg class="w-[28px] h-[28px] text-gray-800 dark:text-gray-300" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
                            d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>
                </a>
                <div class="text-lg lg:text-2xl text-center text-gray-500 dark:text-gray-200"> {{ $title }}</div>
            </div>

        </div>
        {{-- Content --}}
        <div class="flex items-center justify-center text-gray-700 dark:text-gray-300">
            <x-div class=" min-h-20 min-w-md w-full border rounded-md dark:border-gray-600 my-8 p-8 ">
                {{ $slot }}
            </x-div>
        </div>
    </div>
</x-app-layout>
