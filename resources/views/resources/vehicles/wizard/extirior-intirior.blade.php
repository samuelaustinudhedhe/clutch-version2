<div>
    {{-- Exterior Details --}}
    <x-div class="grid gap-4 sm:grid-cols-2">
        <div class="sm:col-span-2 flex gap-4">
            <div class="w-full">
                <x-label for="exterior_color">Exterior Color</x-label>
                <x-xinput id="exterior_color" type="text" wire:model="storeData.details.exterior.color" />
                <x-input-error for="storeData.details.exterior.color" />
            </div>
            <div class="w-full">
                <x-label for="exterior_type">Exterior Type</x-label>
                <x-select id="exterior_type" wire:model="storeData.details.exterior.type" loadJS="true">
                    <option selected value="sedan">Sedan</option>
                    <option value="suv">SUV</option>
                    <option value="hatchback">Hatchback</option>
                    <option value="convertible">Convertible</option>
                    <option value="coupe">Coupe</option>
                    <option value="wagon">Wagon</option>
                    <option value="pickup">Pickup</option>
                    <option value="van">Van</option>
                    <option value="other">Other</option>
                </x-select> <x-input-error for="storeData.details.exterior.type" />
            </div>
        </div>
        <div class="sm:col-span-2 flex gap-4">
            <div class="w-full">
                <x-label for="exterior_doors">Doors</x-label>
                <x-select name="exterior_doors" wire:model="storeData.details.exterior.doors" id="exterior_doors"
                    >
                    <option value="0">No Door</option>
                    <option value="1">1 Door</option>
                    <option value="2">2 Doors</option>
                    <option value="3">3 Doors</option>
                    <option selected value="4">4 Doors</option>
                    <option value="5">5 Doors</option>
                    <option value="6">6 Doors</option>
                </x-select>
                <x-input-error for="storeData.details.exterior.doors" />
            </div>
            <div class="w-full">
                <x-label for="exterior_windows">Windows</x-label>
                <x-select name="exterior_windows" wire:model="storeData.details.exterior.windows" id="exterior_windows">
                    <option value="0">No Window</option>
                    <option value="1">1 Window</option>
                    <option value="2">2 Windows</option>
                    <option value="3">3 Windows</option>
                    <option selected value="4">4 Windows</option>
                    <option value="5">5 Windows</option>
                    <option value="6">6 Windows</option>
                </x-select>
                <x-input-error for="storeData.details.exterior.windows" />
            </div>
        </div>
    </x-div>

    {{-- Interior Details --}}
    <x-div class="grid gap-4 sm:grid-cols-2">
        <div class="sm:col-span-2 flex gap-4">
            <div class="w-full">
                <x-label for="interior_color">Exterior Color</x-label>
                <x-xinput id="interior_color" type="text" wire:model="storeData.details.interior.color" />
                <x-input-error for="storeData.details.interior.color" />
            </div>
        </div>
        <div class="sm:col-span-2 flex gap-4">
            <div class="w-full">
                <x-label for="interior_seats">Seats</x-label>
                <x-select name="interior_seats" wire:model="storeData.details.interior.seats" id="interior_seats">
                    <option value="1">1 Seat</option>
                    <option value="2">2 Seats</option>
                    <option value="3">3 Seats</option>
                    <option value="4">4 Seats</option>
                    <option selected value="5">5 Seats</option>
                    <option value="6">6 Seats</option>
                    <option value="7">7 Seats</option>
                    <option value="8">8+ Seats</option>
                </x-select>
                <x-input-error for="storeData.details.interior.seats" />
            </div>
            <div class="w-full">
                <x-label for="interior_upholstery">Upholstery Type</x-label>
                <x-select id="interior_upholstery" wire:model="storeData.details.interior.upholstery">
                    <option value="leather" selected>Leather</option>
                    <option value="fabric">Fabric</option>
                    <option value="vinyl">Vinyl</option>
                    <option value="suede">Suede</option>
                    <option value="alcantara">Alcantara</option>
                </x-select>
                <x-input-error for="storeData.details.interior.upholstery" />
            </div>
        </div>
        <div class="sm:col-span-2 flex gap-4">
            <div class="w-full">
                <x-label for="interior_ac">Air Conditioning</x-label>
                <x-select id="interior_ac" wire:model="storeData.details.interior.ac">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </x-select>
                <x-input-error for="storeData.details.interior.ac" />
            </div>
            <div class="w-full">
                <x-label for="interior_heater">Heater</x-label>
                <x-select id="interior_heater" wire:model="storeData.details.interior.heater">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </x-select>
                <x-input-error for="storeData.details.interior.heater" />
            </div>
        </div>
    </x-div>
</div>
