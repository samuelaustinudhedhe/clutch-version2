<div>
    {{-- Engine Details --}}
    <x-div class="grid gap-4 sm:grid-cols-2">
        <div class="sm:col-span-2 flex gap-4">
            <div class="w-2/4">
                <x-label for="engine_size">Engine Size</x-label>
                <x-select id="engine_size" wire:model="storeData.engine.size">
                    <option value="small">Small (Under 1.0L or Below 1000cc)</option>
                    <option value="1.0L-1.5L">1.0L - 1.5L (1000cc - 1500cc)</option>
                    <option value="1.6L-2.0L">1.6L - 2.0L (1600cc - 2000cc)</option>
                    <option value="2.1L-2.5L" selected>2.1L - 2.5L (2100cc - 2500cc)</option>
                    <option value="2.6L-3.0L">2.6L - 3.0L (2600cc - 3000cc)</option>
                    <option value="3.1L-4.0L">3.1L - 4.0L (3100cc - 4000cc)</option>
                    <option value="large">Large (Over 4.0L or Above 4000cc)</option>
                </x-select> <x-input-error for="storeData.engine.size" />
            </div>
            <div class="w-2/4">
                <x-label for="engine_hp">Horsepower</x-label>
                <x-xinput id="engine_hp" type="number" wire:model="storeData.engine.hp"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '') + 'HP'" />
                <x-input-error for="storeData.engine.hp" />
            </div>
        </div>
        <div class="sm:col-span-2 flex gap-4">
            <div class="w-2/4">
                <x-label for="engine_type">Engine Type</x-label>
                <x-select id="engine_type" wire:model="storeData.engine.type">
                    <option value="">Select Engine Type</option>
                    <option value="Petrol">Petrol</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Hybrid">Hybrid (Petrol/Electric)</option>
                    <option value="Electric">Electric</option>
                    <option value="Hydrogen Fuel Cell">Hydrogen Fuel Cell</option>
                    <option value="CNG">Compressed Natural Gas (CNG)</option>
                    <option value="LPG">LPG (Liquefied Petroleum Gas)</option>
                </x-select>
                <x-input-error for="storeData.engine.type" />
            </div>
        </div>
    </x-div>

    {{-- Transmission Details --}}
    <x-div class="grid gap-4 sm:grid-cols-2">
        <div class="sm:col-span-2 flex gap-4">
            <div class="w-2/4">
                <x-label for="transmission_type">Transmission Type</x-label>
                <x-select id="transmission_type" wire:model="storeData.transmission.type">
                    <option value="manual">Manual</option>
                    <option value="automatic">Automatic</option>
                    <option value="semi-automatic">Semi-Automatic</option>
                </x-select> <x-input-error for="storeData.transmission.type" />
            </div>
            <div class="w-2/4">
                <x-label for="transmission_gear_ratio">Gear Ratio</x-label>
                <x-xinput id="transmission_gear_ratio" type="text" wire:model="storeData.transmission.gear_ratio" />
                <x-input-error for="storeData.transmission.gear_ratio" />
            </div>
        </div>
        <div class="sm:col-span-2 flex gap-4">
            <div class="w-2/4">
                <x-label for="transmission_gears">Number of Gears</x-label>
                <x-select id="transmission_gears" wire:model="storeData.transmission.gears">
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                </x-select> <x-input-error for="storeData.transmission.gears" />
            </div>
            <div class="w-2/4">
                <x-label for="transmission_drivetrain">Drivetrain Type</x-label>
                <x-select id="transmission_drivetrain" wire:model="storeData.transmission.drivetrain">
                    <option value="fwd">FWD</option>
                    <option value="rwd">RWD</option>
                    <option value="awd">AWD</option>
                    <option value="4wd">4WD</option>
                </x-select> <x-input-error for="storeData.transmission.drivetrain" />
            </div>
        </div>
    </x-div>

    {{-- Fuel Details --}}
    <x-div class="grid gap-4 sm:grid-cols-2">
        <div class="sm:col-span-2 flex gap-4">
            <div class="w-2/4">
                <x-label for="fuel_type">Fuel Type</x-label>
                <x-select id="fuel_type" wire:model="storeData.fuel.type">
                    <option value="" disabled selected>Select Fuel Type</option>
                    <option value="petrol">Petrol (Gasoline)</option>
                    <option value="diesel">Diesel</option>
                    <option value="electricity">Electricity</option>
                    <option value="hydrogen">Hydrogen</option>
                </x-select>
                <x-input-error for="storeData.fuel.type" />
            </div>
            <div class="w-2/4">
                <x-label for="fuel_economy">Fuel Economy</x-label>
                <x-xinput id="fuel_economy" type="text" wire:model="storeData.fuel.economy" />
                <x-input-error for="storeData.fuel.economy" />
            </div>
        </div>
    </x-div>


    <script>
        document.getElementById('engine_type').addEventListener('change', function() {
            var fuelType = document.getElementById('fuel_type');
            fuelType.value = '';

            switch (this.value) {
                case 'petrol':
                    fuelType.value = 'petrol';
                    break;
                case 'diesel':
                    fuelType.value = 'diesel';
                    break;
                case 'hybrid':
                    fuelType.value = 'petrol';
                    break;
                case 'electric':
                    fuelType.value = 'electricity';
                    break;
                case 'plug-in-hybrid':
                    fuelType.value = 'electricity';
                    break;
                case 'hydrogen':
                    fuelType.value = 'hydrogen';
                    break;
                default:
                    fuelType.value = '';
                    break;
            }
        });
    </script>
</div>
