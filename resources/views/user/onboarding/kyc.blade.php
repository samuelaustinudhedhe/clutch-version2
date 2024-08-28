{{-- Onboarding KYC --}}
<div x-data="{ role: @entangle('storeData.role') }">
    <h1 class="mb-2 text-2xl font-extrabold tracking-tight text-gray-800 leding-tight dark:text-white">
        Verify Your Identity
    </h1>
    <p class="font-light text-gray-600 dark:text-gray-300">
        Please upload your ID card and or International Passport,
        @if ($storeData['role'] === 'driver' || $user->role === 'driver')
            Driver's license,
        @endif
        and any Utility document that proves your address (not older than 2 months).
    </p>
    <x-div>
        <div>
            <x-label for="date-of-birth">NIN*</x-label>
            <x-xinput type="text" wire:model="storeData.nin" id="nin" name="nin" />
            <x-input-error for="date_of_birth" />
        </div>
        
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload Your
            NIN</label>
        <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="user_avatar_help" id="user_avatar" type="file">

    </x-div>

    <x-div>
        <div class="mb-2 flex items-center gap-1">
            <p class="text-gray-900 dark:text-white">
                How would you like to use the vehicle?
            </p>
            <svg class="h-4 w-4 text-gray-400 hover:text-gray-900 dark:text-gray-500 dark:hover:text-white"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                data-tooltip-target="role-type-desc-1" data-tooltip-trigger="hover" fill="currentColor"
                viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z"
                    clip-rule="evenodd" />
            </svg>
            <div id="role-type-desc-1" role="tooltip"
                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                Select a Vehicle type to create a new Vehicle.
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
        <div class="mb-6 mb-6 gap-4 text-sm sm:grid-cols-2 grid">
            <x-radio id="active" name="status" value="driver" wire:model="storeData.role" showIcon="false"
                class="!p-2">

                <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span class="w-full">I want to drive it myself.</span>
            </x-radio>

            <x-radio id="inactive" name="status" value="chauffeured" wire:model="storeData.role" showIcon="false"
                class="!p-2">
                <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span class="w-full">I prefer to be chauffeured</span>
            </x-radio>
        </div>
        <x-input-error for="status" />


    </x-div>
    <x-div x-show="role === 'driver'">

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload
            file</label>
        <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="user_avatar_help" id="user_avatar" type="file">
        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile picture is
            useful
            to confirm your are logged into your account</div>

    </x-div>
    <x-div x-show="role === 'driver'">

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload
            file</label>
        <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="user_avatar_help" id="user_avatar" type="file">
        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile picture is
            useful
            to confirm your are logged into your account</div>

    </x-div>


</div>
