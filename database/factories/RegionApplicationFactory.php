<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Enums\ApplicationType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegionApplication>
 */
class RegionApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'country_id' => Country::factory(),
            'type' => $this->faker->randomElement(ApplicationType::values()),
        ];
    }
}
