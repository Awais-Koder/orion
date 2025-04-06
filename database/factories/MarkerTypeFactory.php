<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MarkerType>
 */
class MarkerTypeFactory extends Factory
{
    const NAMES = [
        'Penetration',
        'Joints/gaps',
        'Ceilings',
        'Walls',
        'Frames/doors',
        'Fire screens',
        'Steel protection',
        'Fire resistance partitions',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement(static::NAMES),
            'slug' => fn(array $attributes) => \Str::slug($attributes['name']),
        ];
    }

    public function sequencedName(bool $forAll = false): static
    {
        return $this->sequence(
            ...collect(static::NAMES)
                ->map(fn(string $name) => ['name' => $name])
        )
            ->when($forAll, fn(self $factory) => $factory->count(count(static::NAMES)));
    }
}
