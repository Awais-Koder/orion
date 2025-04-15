<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Manufacturer;
use Database\Factories\Concerns\HasSequencedName;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'name' => 'Product ' . $this->faker->word,
        ];
    }
}
