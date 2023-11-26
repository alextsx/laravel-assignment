<?php

namespace Database\Seeders;

use App\Models\VehicleDamageEvent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleDamageEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count= random_int(10, 30);
        VehicleDamageEvent::factory()->count($count)->create();
    }
}
