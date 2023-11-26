<?php

namespace Database\Factories;

use App\Services\VehicleService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'license_plate' => fake()->unique()->regexify('[A-Z]{3}-[0-9]{3}'),
            'brand' => fake()->word(),
            'model' => fake()->word(),
            'year' => fake()->year(),
            'img_url' => fake()->imageUrl(),
        ];
    }
}
