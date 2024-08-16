<?php

namespace App\Traits;

use App\Models\Vehicle;

trait HasVehicles
{
    /**
     * Get all of the vehicles for the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function vehicles()
    {
        $owner = $this->morphMany(Vehicle::class, 'owner');
        $ownerable =   $this->morphMany(Vehicle::class, 'ownerable');
        return $owner ?? $ownerable;
    }

    /**
     * Add a vehicle to the model.
     *
     * @param \App\Models\Vehicle $vehicle
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function addVehicle(Vehicle $vehicle)
    {
        return $this->vehicles()->save($vehicle);
    }
}