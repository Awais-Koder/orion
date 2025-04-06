<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Manufacturer;
use Database\Factories\Concerns\HasSequencedName;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Solution>
 */
class SolutionFactory extends Factory
{
    use HasSequencedName;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand_id' => Brand::factory(),
            'name' => 'Solution ' . $this->faker->name,
            'slug' => fn(array $attributes) => str($attributes['name'])->slug(),
            'code' => $this->faker->optional()->postcode,
        ];
    }
}
