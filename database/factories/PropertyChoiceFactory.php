<?php

namespace Database\Factories;

use App\Models\Property;
use Database\Factories\Concerns\HasSequence;
use Database\Factories\Concerns\HasSequencedName;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PropertyChoice>
 */
class PropertyChoiceFactory extends Factory
{
    use HasSequencedName,
        HasSequence;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'property_id' => Property::factory(),
            'name' => 'Property value ' . $this->faker->randomNumber(),
            'explanation' => $this->faker->optional()->text(),
            'sequence' => 0,
        ];
    }
}
