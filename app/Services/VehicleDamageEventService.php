<?php

namespace App\Services;

use App\Models\Vehicle;


class VehicleDamageEventService
{
    public function getAttachableVehicles($damageEvent)
    {
        //sort this by license plate in ascending order
        return Vehicle::all()->sortBy('license_plate');
    }

    public function getAttachedVehicles($damageEvent)
    {
        return $damageEvent->vehicles;
    }
}