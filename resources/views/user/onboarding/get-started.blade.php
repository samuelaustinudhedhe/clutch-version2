<div>
    <h1 class="mb-4 text-2xl font-extrabold leading-tight tracking-tight text-gray-900 sm:mb-6 dark:text-white">
        Welcome to clutch</h1>

    <p class="mb-14 text-lg font-light text-gray-500 dark:text-gray-400">Click on next to proceed</p>

    <a wire:click.prevent="nextStep" wire:loading.attr="disabled"
        class="flex items-center justify-center w-full px-5 py-2.5 sm:py-3.5 text-sm font-medium text-center text-white rounded-lg bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">
        Begain Onboarding Now
    </a>

    <p class="mt-4 text-sm font-light text-gray-500 dark:text-gray-400">
        Not read to onboard? <a href="#" wire:click.prevent="skipOnboarding"
            class="font-medium text-blue-600 hover:underline dark:text-blue-500">Skip the Onboarding
            Process</a>.
    </p>
</div>
