<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SearchHistory>
 */
class SearchHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'search_term' => fake()->regexify('[A-Z]{3}-[0-9]{3}'),
            //a date between now and a year ago
            'search_date' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
