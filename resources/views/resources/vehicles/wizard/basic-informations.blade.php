<!-- Step 1: Basic Vehicle Information -->

<div>
    <x-div class="grid gap-4 sm:grid-cols-2 grid-cols-1">
        {{-- Vin and Vit --}}
        <div class="sm:col-span-2 flex sm:flex-nowrap flex-wrap gap-4 items-start">
            {{-- IT --}}
            <div class="w-full sm:w-1/3">
                <x-label for="vit" class="inline-flex items-center">

                    VI type
                    <button type="button" data-tooltip-target="tooltip-vit" data-tooltip-style="dark" class="ml-1">
                        <svg aria-hidden="true"
                            class="ml-1 w-4 h-4 text-gray-400 dark:text-gray-500 hover:text-gray-900 dark:hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Vin Type details</span>
                    </button>
                    <div id="tooltip-vit" role="tooltip"
                        class="inline-block absolute invisible z-10 py-2 px-3 max-w-sm text-xs font-normal text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        The identification type and number of the Vehicleis this is know as "VIN" on
                        cars and motorcycles and "HIN" on Boats and watercrafts.
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </x-label>
                <x-select wire:model="storeData.details.vin.type" name="Vehicle Identification Type"
                    title="Vehicle Identification Type">
                    @foreach ($vits as $key => $description)
                        <option title="{{ $description }}" value="{{ $key }}">
                            {{ $key }}</option>
                    @endforeach
                </x-select>
                <x-input-error for="storeData.details.vin.type" />

            </div>
            {{-- IN --}}
            <div class="w-full sm:w-2/3">
                <x-label for="vin" class="mt-1">Vin number</x-label>
                <x-xinput id="vin" type="text" wire:model="storeData.details.vin.number"
                    placeholder="Enter your Identifcation Number" maxlength="17"
                    title="Identification number of the vehicle" />

                <x-input-error for="storeData.details.vin.number" />

            </div>
        </div>

        {{-- Make and Manufacturer  --}}
        <div class="w-full">
            <x-label for="make">Make</x-label>
            <x-xinput id="make" type="text" wire:model="storeData.details.make" />

            <x-input-error for="storeData.details.make" />
        </div>
        <div class="w-full">
            <x-label for="manufacturer">Manufacturer</x-label>
            <x-xinput id="manufacturer" type="text" wire:model="storeData.details.manufacturer" />

            <x-input-error for="storeData.details.manufacturer" />
        </div>
        <div class="w-full">
            <x-label for="model">Model</x-label>
            <x-xinput id="model" type="text" wire:model="storeData.details.model"
                value="{{ $vehicleDetails['model'] ?? '' }}" />

            <x-input-error for="storeData.details.model" />
        </div>
        <div class="w-full">
            <x-label for="year">Year of production</x-label>
            <x-xinput id="year" type="select" wire:model="storeData.details.year" />

            <x-input-error for="storeData.details.year" />
        </div>
    </x-div>

    <x-div class="grid gap-x-4 sm:grid-cols-2 !pb-2">

        {{-- Location --}}
        <x-location id="storeData.location.pickup.full" name="Vehicle Pickup Location" label="Pickup Location"
            wire:model="storeData.location.pickup.full" loadJS=true />
        <x-location id="storeData.location.drop_off.full" name="Vehicle drop_off Location" label="drop_off Location"
            wire:model="storeData.location.drop_off.full" loadJS=false />

    </x-div>
    <x-div>
        <div class="grid gap-4 sm:grid-cols-2">

            <div class="sm:col-span-2">
                <x-label for="description">Description</x-label>
                <x-textarea id="description" height="100px" wire:model="storeData.details.description" />
                <x-input-error for="storeData.details.description" />
            </div>
        </div>
    </x-div>


</div>
