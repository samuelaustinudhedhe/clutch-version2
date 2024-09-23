{{-- Onboarding Select Roles --}}
<div>
    <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">What will you like to do on our platform</p>
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
        <x-input-error for="storeData.role" />
        <div class="w-2/4">
            <x-label for="year">Year of production</x-label>
            <x-xinput id="year" type="select" wire:model="storeData.year" />

            <x-input-error for="storeData.year" />
        </div>
    </div>

</div>
