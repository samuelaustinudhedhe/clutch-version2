<div>
    <!-- Safety Features -->
    <p class="test-xl mt-6 mb-2 mx-2">Safety Features</p>
    <x-div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

        <!-- ABS (Anti-lock Braking System) -->
        <div class="col-span-1">
            <x-label for="abs">Anti-lock Braking System</x-label>
            <x-select id="abs" wire:model="storeData.safety.abs">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </x-select>
            <x-input-error for="storeData.safety.abs" />
        </div>

        <!-- Traction Control -->
        <div class="col-span-1">
            <x-label for="traction_control">Traction Control</x-label>
            <x-select id="traction_control" wire:model="storeData.safety.traction_control">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </x-select>
            <x-input-error for="storeData.safety.traction_control" />
        </div>

        <!-- Electronic Stability Control (ESC) -->
        <div class="col-span-1">
            <x-label for="stability_control">Electronic Stability Control</x-label>
            <x-select id="stability_control" wire:model="storeData.safety.stability_control">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </x-select>
            <x-input-error for="storeData.safety.stability_control" />
        </div>
        <!-- Lane Departure Warning -->
        <div class="col-span-1">
            <x-label for="lane_departure_warning">Lane Departure Warning</x-label>
            <x-select id="lane_departure_warning" wire:model="storeData.safety.lane_departure_warning">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </x-select>
            <x-input-error for="storeData.safety.lane_departure_warning" />
        </div>

        <!-- Lane Keeping Assist -->
        <div class="col-span-1">
            <x-label for="lane_keeping_assist">Lane Keeping Assist</x-label>
            <x-select id="lane_keeping_assist" wire:model="storeData.safety.lane_keeping_assist">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </x-select>
            <x-input-error for="storeData.safety.lane_keeping_assist" />
        </div>

        <!-- Adaptive Cruise Control -->
        <div class="col-span-1">
            <x-label for="adaptive_cruise_control">Adaptive Cruise Control</x-label>
            <x-select id="adaptive_cruise_control" wire:model="storeData.safety.adaptive_cruise_control">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </x-select>
            <x-input-error for="storeData.safety.adaptive_cruise_control" />
        </div>

        <!-- Blind Spot Monitoring -->
        <div class="col-span-1">
            <x-label for="blind_spot_monitoring">Blind Spot Monitoring</x-label>
            <x-select id="blind_spot_monitoring" wire:model="storeData.safety.blind_spot_monitoring">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </x-select>
            <x-input-error for="storeData.safety.blind_spot_monitoring" />
        </div>

        <!-- Forward Collision Warning -->
        <div class="col-span-1">
            <x-label for="forward_collision_warning">Forward Collision Warning</x-label>
            <x-select id="forward_collision_warning" wire:model="storeData.safety.forward_collision_warning">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </x-select>
            <x-input-error for="storeData.safety.forward_collision_warning" />
        </div>

        <!-- Automatic Emergency Braking -->
        <div class="col-span-1">
            <x-label for="automatic_emergency_braking">Automatic Emergency Braking</x-label>
            <x-select id="automatic_emergency_braking" wire:model="storeData.safety.automatic_emergency_braking">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </x-select>
            <x-input-error for="storeData.safety.automatic_emergency_braking" />
        </div>
        <!-- Rear Cross Traffic Alert -->
        <div class="col-span-1">
            <x-label for="rear_cross_traffic_alert">Rear Cross Traffic Alert</x-label>
            <x-select id="rear_cross_traffic_alert" wire:model="storeData.safety.rear_cross_traffic_alert">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </x-select>
            <x-input-error for="storeData.safety.rear_cross_traffic_alert" />
        </div>

        <!-- Parking Sensors -->
        <div class="col-span-1">
            <x-label for="parking_sensors">Parking Sensors</x-label>
            <x-select id="parking_sensors" wire:model="storeData.safety.parking_sensors">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </x-select>
            <x-input-error for="storeData.safety.parking_sensors" />
        </div>

        <!-- 360-Degree Camera -->
        <div class="col-span-1">
            <x-label for="camera_360">360-Degree Camera</x-label>
            <x-select id="camera_360" wire:model="storeData.safety.camera_360">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </x-select>
            <x-input-error for="storeData.safety.camera_360" />
        </div>

        <!-- Driver Attention Monitor -->
        <div class="col-span-1">
            <x-label for="driver_attention_monitor">Driver Attention Monitor</x-label>
            <x-select id="driver_attention_monitor" wire:model="storeData.safety.driver_attention_monitor">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </x-select>
            <x-input-error for="storeData.safety.driver_attention_monitor" />
        </div>

        <!-- Tire Pressure Monitoring System (TPMS) -->
        <div class="col-span-1">
            <x-label for="tire_pressure_monitor">Tire Pressure Monitoring</x-label>
            <x-select id="tire_pressure_monitor" wire:model="storeData.safety.tire_pressure_monitor">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </x-select>
            <x-input-error for="storeData.safety.tire_pressure_monitor" />
        </div>

        <!-- Airbags -->
        <div class="col-span-1">
            <x-label for="airbags">Airbags</x-label>
            <x-select id="airbags" wire:model="storeData.safety.airbags">
                <option value="front">Front</option>
                <option value="front & sides">Front & Sides</option>
                <option value="front, sides & curtain">Front, Sides & Curtain</option>
            </x-select>
            <x-input-error for="storeData.safety.airbags" />
        </div>


        <!-- Seat Belt Pretensioners -->
        <div class="col-span-1">
            <x-label for="seat_belt_pretensioners">Seat Belt Pretensioners</x-label>
            <x-select id="seat_belt_pretensioners" wire:model="storeData.safety.seat_belt_pretensioners">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </x-select>
            <x-input-error for="storeData.safety.seat_belt_pretensioners" />
        </div>

        <!-- Crumple Zones -->
        <div class="col-span-1">
            <x-label for="crumple_zones">Crumple Zones</x-label>
            <x-select id="crumple_zones" wire:model="storeData.safety.crumple_zones">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </x-select>
            <x-input-error for="storeData.safety.crumple_zones" />
        </div>

        <!-- ISOFIX Child Seat Mounts -->
        <div class="col-span-1">
            <x-label for="isofix_mounts">ISOFIX Child Seat Mounts</x-label>
            <x-select id="isofix_mounts" wire:model="storeData.safety.isofix_mounts">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </x-select>
            <x-input-error for="storeData.safety.isofix_mounts" />
        </div>
    </x-div>

    <!-- Security Features -->
    <p class="test-xl mt-6 mb-2 mx-2">Security Features</p>
    <x-div class="grid gap-4 sm:grid-cols-2">
        <div class="col-span-1">
            <!-- Alarm System -->
            <div class="w-full">
                <x-label for="alarm_system">Alarm System</x-label>
                <x-select id="alarm_system" wire:model="storeData.security.alarm_system">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </x-select>
                <x-input-error for="storeData.security.alarm_system" />
            </div>
        </div>

        <div class="col-span-1">
            <!-- Engine Immobilizer -->
            <div class="w-full">
                <x-label for="immobilizer">Engine Immobilizer</x-label>
                <x-select id="immobilizer" wire:model="storeData.security.immobilizer">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </x-select>
                <x-input-error for="storeData.security.immobilizer" />
            </div>
        </div>

        <div class="col-span-1">
            <!-- Remote Central Locking -->
            <div class="w-full">
                <x-label for="remote_central_locking">Remote Central Locking</x-label>
                <x-select id="remote_central_locking" wire:model="storeData.security.remote_central_locking">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </x-select>
                <x-input-error for="storeData.security.remote_central_locking" />
            </div>
        </div>

        <div class="col-span-1">
            <!-- GPS Tracking System -->
            <div class="w-full">
                <x-label for="gps_tracking">GPS Tracking System</x-label>
                <x-select id="gps_tracking" wire:model="storeData.security.gps_tracking">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </x-select>
                <x-input-error for="storeData.security.gps_tracking" />
            </div>
        </div>
    </x-div>

</div>
