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
    ];

    public function definition(): array
{
    return [
        'name' => $this->faker->randomElement(static::NAMES) . ' ' . $this->faker->numerify('#'),
        'slug' => fn(array $attributes) => str($attributes['name'])->slug(),
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
