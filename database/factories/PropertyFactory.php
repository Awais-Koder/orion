<?php

namespace Database\Factories;

use App\Models\Enums\PropertyTypeEnum;
use App\Models\MarkerType;
use App\Models\MarkerTypeCategory;
use Database\Factories\Concerns\HasSequence;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    use HasSequence;

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
            'name' => 'Property ' . $this->faker->name,
            'type' => $this->faker->randomElement(PropertyTypeEnum::values()),
            'unit' => $this->faker->randomElement([null, 'cm', 'kg']),
            'is_primary' => $this->faker->boolean,
            'is_filterable' => $this->faker->boolean,
            'is_filter_collapsed_by_default' => $this->faker->optional()->boolean,
            'explanation' => $this->faker->optional()->sentence,
            'explanation_images' => $this->faker->randomElement([null, [$this->faker->imageUrl, $this->faker->imageUrl]]),
            'sequence' => 0,
            'sequence_filter' => 0,
        ];
    }
}
