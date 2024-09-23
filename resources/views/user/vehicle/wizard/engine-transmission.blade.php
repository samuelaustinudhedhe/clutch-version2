<div>
    {{-- Engine Details --}}
    <x-div class="grid gap-4 sm:grid-cols-2">
        <div class="sm:col-span-2 flex gap-4">
            <div class="w-2/4">
                <x-label for="engine_type">Engine Type</x-label>
                <x-select id="engine_type" wire:model="storeData.engine.type">
                    <option value="">Select Engine Type</option>
                    <option value="Internal Combustion Engine (ICE)">Internal Combustion Engine (ICE)</option>
                    <option value="Gasoline">Gasoline</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Natural Gas">Natural Gas</option>
                    <option value="Ethanol">Ethanol</option>
                    <option value="Electric Engine">Electric Engine</option>
                    <option value="Battery Electric Vehicle (BEV)">Battery Electric Vehicle (BEV)</option>
                    <option value="Hybrid Engine">Hybrid Engine</option>
                    <option value="Plug-in Hybrid Electric Vehicle (PHEV)">Plug-in Hybrid Electric Vehicle (PHEV)
                    </option>
                    <option value="Mild Hybrid Electric Vehicle (MHEV)">Mild Hybrid Electric Vehicle (MHEV)</option>
                    <option value="Hydrogen Fuel Cell Engine">Hydrogen Fuel Cell Engine</option>
                    <option value="Gas Turbine Engine">Gas Turbine Engine</option>
                    <option value="Other">Other</option>

                </x-select>
                <x-input-error for="storeData.engine.type" />
            </div>
            <div class="w-2/4">
                <x-label for="engine_size">Engine Size</x-label>
                <x-select id="engine_size" wire:model="storeData.engine.size">
                    <option value="1.0L or Below">Small (Under 1.0L or Below 1000cc)</option>
                    <option value="1.0L - 1.5L">1.0L - 1.5L (1000cc - 1500cc)</option>
                    <option value="1.6L - 2.0L">1.6L - 2.0L (1600cc - 2000cc)</option>
                    <option value="2.1L - 2.5L">2.1L - 2.5L (2100cc - 2500cc)</option>
                    <option value="2.6L - 3.0L">2.6L - 3.0L (2600cc - 3000cc)</option>
                    <option value="3.1L - 4.0L">3.1L - 4.0L (3100cc - 4000cc)</option>
                    <option value="4.0L or Above">Large (Over 4.0L or Above 4000cc)</option>
                </x-select> <x-input-error for="storeData.engine.size" />
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
                    <option value="Gasoline">Gasoline</option>
                    <option value="Petrol">Petrol</option>
                    <option value="E85 (Ethanol blend)">E85 (Ethanol blend)</option>
                    <option value="Regular Diesel">Regular Diesel</option>
                    <option value="Biodiesel">Biodiesel</option>
                    <option value="Compressed Natural Gas (CNG)">Compressed Natural Gas (CNG)</option>
                    <option value="Liquefied Natural Gas (LNG)">Liquefied Natural Gas (LNG)</option>
                    <option value="E85 (85% ethanol, 15% gasoline)">E85 (85% ethanol, 15% gasoline)</option>
                    <option value="E100 (100% ethanol)">E100 (100% ethanol)</option>
                    <option value="Battery Electric Vehicle (BEV)">Battery Electric Vehicle (BEV)</option>
                    <option value="Hydrogen Fuel Cell">Hydrogen Fuel Cell</option>
                    <option value="LPG (Liquefied Petroleum Gas)">LPG (Liquefied Petroleum Gas)</option>
                    <option value="Propane">Propane</option>
                </x-select>

                <x-input-error for="storeData.fuel.type" />
            </div>
            <div class="w-2/4">
                <x-label for="fuel_economy">Fuel Economy</x-label>
                <x-select id="fuel_economy" wire:model="storeData.fuel.economy">
                    <option value="" disabled selected>Select Fuel Economy</option>
                    <option value="Below 15">Below 15 MPG (Very Poor)</option>
                    <option value="15-19">15-19 MPG (Poor)</option>
                    <option value="20-24">20-24 MPG (Below Average)</option>
                    <option value="25-29">25-29 MPG (Average)</option>
                    <option value="30-34">30-34 MPG (Above Average)</option>
                    <option value="35-39">35-39 MPG (Good)</option>
                    <option value="40 Above">40 MPG and Above (Excellent)</option>
                </x-select>
                <x-input-error for="storeData.fuel.economy" />
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
                <x-label for="engine_hp">Horsepower</x-label>
                <x-xinput id="engine_hp" type="number" wire:model="storeData.engine.hp" />
                <x-input-error for="storeData.engine.hp" />
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

    {{-- <script>
        document.getElementById('engine_type').addEventListener('change', function() {
            var fuelType = document.getElementById('fuel_type');
            fuelType.value = '';

            switch (this.value.toLowerCase()) {
                case 'internal combustion engine (ice)':
                case 'gasoline':
                    fuelType.value = 'gasoline'; 
                    break;
                case 'diesel':
                    fuelType.value = 'regular diesel';
                    break;
                case 'natural gas':
                case 'compressed natural gas (cng)':
                    fuelType.value = 'compressed natural gas (cng)';
                    break;
                case 'ethanol':
                case 'e85 (ethanol blend)':
                    fuelType.value = 'e85 (ethanol blend)';
                    break;
                case 'battery electric vehicle (bev)':
                    fuelType.value = 'battery electric vehicle (bev)';
                    break;
                case 'plug-in hybrid electric vehicle (phev)':
                case 'mild hybrid electric vehicle (mhev)':
                    fuelType.value = 'battery electric vehicle (bev)';
                    break;
                case 'hydrogen fuel cell engine':
                    fuelType.value = 'hydrogen fuel cell';
                    break;
                case 'wankel rotary engine':
                case 'gas turbine engine':
                    fuelType.value = 'other';
                    break;
                default:
                    fuelType.value = '';
                    break;
            }
        });
    </script> --}}
</div>
