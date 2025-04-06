<?php

namespace Database\Factories;

use App\Models\MarkerType;
use App\Models\MarkerTypeCategory;
use Database\Factories\Concerns\HasSequencedName;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PropertyGroup>
 */
class PropertyGroupFactory extends Factory
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
            'marker_type_id' => MarkerType::factory(),
            'marker_type_category_id' => MarkerTypeCategory::factory(),
            'name' => 'Property group ' . $this->faker->name,
            'is_filter_collapsed_by_default' => $this->faker->optional()->boolean,
            'sequence' => 0,
        ];
    }
}
