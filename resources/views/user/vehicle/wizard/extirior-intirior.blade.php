<div>
    {{-- Exterior Details --}}
    <x-div class="grid gap-4 sm:grid-cols-2">
        <div class="sm:col-span-2 flex gap-4">
            <div class="w-full">
                <x-label for="exterior_color">Exterior Color</x-label>
                <x-xinput id="exterior_color" type="text" wire:model="storeData.exterior.color" />
                <x-input-error for="storeData.exterior.color" />
            </div>
            <div class="w-full">
                <x-label for="exterior_type">Exterior Type</x-label>
                <x-xinput id="exterior_type" type="text" wire:model="storeData.exterior.type" />
                <x-input-error for="storeData.exterior.type" />
            </div>
        </div>
        <div class="sm:col-span-2 flex gap-4">
            <div class="w-full">
                <x-label for="exterior_doors">Number of Doors</x-label>
                <x-select name="exterior_doors" wire:model="storeData.exterior.doors" id="exterior_doors">
                    <option selected value="0">No Door</option>
                    <option value="1">1 Door</option>
                    <option value="2">2 Doors</option>
                    <option value="3">3 Doors</option>
                    <option value="4">4 Doors</option>
                    <option value="5">5 Doors</option>
                    <option value="6">6 Doors</option>
                </x-select>
                <x-input-error for="storeData.exterior.doors" />
            </div>
            <div class="w-full">
                <x-label for="exterior_windows">Number of Windows</x-label>
                <x-select name="exterior_windows" wire:model="storeData.exterior.windows" id="exterior_windows">
                    <option selected value="0">No Window</option>
                    <option value="1">1 Window</option>
                    <option value="2">2 Windows</option>
                    <option value="3">3 Windows</option>
                    <option value="4">4 Windows</option>
                    <option value="5">5 Windows</option>
                    <option value="6">6 Windows</option>
                </x-select>
                <x-input-error for="storeData.exterior.windows" />
            </div>
        </div>
    </x-div>

    {{-- Interior Details --}}
    <x-div class="grid gap-4 sm:grid-cols-2">

        <div class="sm:col-span-2 flex gap-4">
            <div class="w-full">
                <x-label for="interior_color">Exterior Color</x-label>
                <x-xinput id="interior_color" type="text" wire:model="storeData.interior.color" />
                <x-input-error for="storeData.interior.color" />
            </div>
        </div>
        <div class="sm:col-span-2 flex gap-4">
            <div class="w-full">
                <x-label for="interior_seats">Number of Seats</x-label>
                <x-select name="interior_seats" wire:model="storeData.interior.seats" id="interior_seats">
                    <option selected>--Select Seats--</option>
                    <option value="1">1 Seat</option>
                    <option value="2">2 Seats</option>
                    <option value="3">3 Seats</option>
                    <option value="4">4 Seats</option>
                    <option value="5">5 Seats</option>
                    <option value="6">6 Seats</option>
                    <option value="7">7 Seats</option>
                    <option value="8">8+ Seats</option>
                </x-select>
                <x-input-error for="storeData.interior.seats" />
            </div>
            <div class="w-full">
                <x-label for="interior_upholstery">Upholstery Type</x-label>
                <x-select id="interior_upholstery" wire:model="storeData.interior.upholstery">
                    <option selected>--Select an option--</option>
                    <option value="leather" selected>Leather</option>
                    <option value="fabric">Fabric</option>
                    <option value="vinyl">Vinyl</option>
                    <option value="suede">Suede</option>
                    <option value="alcantara">Alcantara</option>
                </x-select>
                <x-input-error for="storeData.interior.upholstery" />
            </div>
        </div>
        <div class="sm:col-span-2 flex gap-4">
            <div class="w-full">
                <x-label for="interior_ac">Air Conditioning</x-label>
                <x-select id="interior_ac" wire:model="storeData.interior.ac">
                    <option selected>--Select an option--</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </x-select>
                <x-input-error for="storeData.interior.ac" />
            </div>
            <div class="w-full">
                <x-label for="interior_heater">Heater</x-label>
                <x-select id="interior_heater" wire:model="storeData.interior.heater">
                    <option selected>--Select an option--</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </x-select>
                <x-input-error for="storeData.interior.heater" />
            </div>
        </div>
    </x-div>
</div>
