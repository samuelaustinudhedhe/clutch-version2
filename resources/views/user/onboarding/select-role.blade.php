{{-- Onboarding Select Roles --}}
<div>

    <h1 class="mb-4 text-2xl font-extrabold leading-tight tracking-tight text-gray-900 sm:mb-6 dark:text-white">Tell us
        about your goal</h1>

    <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">What will you like to do on our platform</p>

    <form action="#" wire:submit.prevent="updateRole">
        <div class="mb-6 space-y-4 sm:space-y-6">
            <x-radio id="driver" name="role" value="driver" wire:model="role" color="blue" class="space-x-6">
                <img src="https://cdn-icons-png.flaticon.com/512/11287/11287075.png" width="30" height="30"
                    alt="" title="" class="img-small">
                <span class="w-full">Rent a vehicle</span>
            </x-radio>

            <x-radio id="owner" name="role" value="owner" wire:model="role" color="blue" class="space-x-6">
                <img src="https://cdn-icons-png.flaticon.com/512/3418/3418139.png" width="30" height="30"
                    alt="" title="" class="img-small">

                <span class="w-full">Host a vehicle</span>
            </x-radio>        
            <x-input-error for="role" />

        </div>


        <button type="submit"
            class="w-full px-5 py-2.5 sm:py-3.5 text-sm font-medium text-center text-white rounded-lg bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Next:
            Account Info</button>
    </form>

    <p class="mt-4 text-sm font-light text-gray-500 dark:text-gray-400">
        Already have an account? <a href="#"
            class="font-medium text-blue-600 hover:underline dark:text-blue-500">Login here</a>.
    </p>
</div>
