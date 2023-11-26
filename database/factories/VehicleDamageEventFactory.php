<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VehicleDamageEvent>
 */
class VehicleDamageEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'location' => fake()->address(),
            'date' => fake()->dateTimeBetween('-1 year', 'now'),
            'description' => fake()->sentence(),
        ];
    }
}
