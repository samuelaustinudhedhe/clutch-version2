{{-- Onboarding Personal Details --}}
<div>
    <h1 class="mb-4 text-2xl font-extrabold tracking-tight text-gray-900 sm:mb-6 leding-tight dark:text-white">
        Account details</h1>
    <form action="#" wire:submit.prevent="">

        {{-- Additional info --}}
        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <x-label for="date-of-birth">Date of Birth</x-label>

                <div class="relative w-full">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <x-xinput datepicker type="text" id="date-of-birth" class="pl-10" wire:model="date_of_birth"
                        placeholder="Select date" />
                    <x-input-error for="date_of_birth" />
                </div>
            </div>
            <div>
                <x-label for="gender">Gender</x-label>
                <x-select name="gender" wire:model="gender" id="gender">
                    <option selected value="">Select gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </x-select>
                <x-input-error for="gender" />
            </div>
        </div>
        
        <p class="text-xl text-gray-900 dark:text-white">Address</p>

        <div class="mb-4">
            <x-label for="street-address">Street</x-label>
            <x-xinput type="text" wire:model="street" id="street-address" name="street-address" />
            <x-input-error for="street" />
        </div>

        <div class="mb-4">
            <x-label for="apt-unit">Apt/Unit Number</x-label>
            <x-xinput type="text" wire:model="house" id="apt-unit" name="apt-unit" />
            <x-input-error for="house" />
        </div>
        <div class="sm:col-span-2 mb-4 flex gap-4">

            <div class="w-2/4">
                <x-label for="city">City</x-label>
                <x-xinput type="text" wire:model="city" id="city" name="city" />
                <x-input-error for="city" />
            </div>

            <div class="w-2/4">
                <x-label for="state">State/Province</x-label>
                <x-xinput type="text" wire:model="state" id="state" name="state" />
                <x-input-error for="state" />
            </div>
        </div>
        <div class="sm:col-span-2 mb-4 flex gap-4">
            <div class="w-2/4">
                <x-label for="postal-code">Postal/Zip Code</x-label>
                <x-xinput type="text" wire:model="zip_code" id="postal-code" name="postal-code" />
                <x-input-error for="postal-code" />
            </div>

            <div class="w-2/4">
                <x-label for="country">Country</x-label>
                <x-xinput type="text" wire:model="country" id="country" name="country" />
                <x-input-error for="country" />
            </div>
        </div>

        <div class="flex space-x-3">
            <a href="#" wire:click.prevent="prevStep" wire:loading.attr="disabled"
                class="text-center items-center w-full py-2.5 sm:py-3.5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Prev:
                Personal Info</a>
            <button type="submit" wire:click.prevent="nextStep" wire:loading.attr="disabled"
                class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 sm:py-3.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Next:
                Account Info</button>
        </div>
    </form>
</div>
