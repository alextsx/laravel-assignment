<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use App\Models\VehicleDamageEvent;
use Illuminate\Database\Seeder;

class VehicleVehicleDamageEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicles = Vehicle::all();
        $vehicleDamageEvents = VehicleDamageEvent::all();

        foreach ($vehicles as $vehicle) {
            $vehicleDamageEvent = $vehicleDamageEvents->random();

            //only attach it if the same vehicle isn't attached to the event already
            if (!$vehicle->vehicleDamageEvents()->where('vehicle_damage_event_id', $vehicleDamageEvent->id)->exists()) {
                $vehicle->vehicleDamageEvents()->attach($vehicleDamageEvent, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}