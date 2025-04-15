<?php

namespace Database\Factories;

use App\Models\MarkerType;
use App\Models\MarkerTypeCategory;
use Database\Factories\Concerns\HasSequencedName;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MarkerTypeCategory>
 */
class MarkerTypeCategoryFactory extends Factory
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
            'parent_id' => null,
            'name' => 'Category ' . $this->faker->word,
            'slug' => fn(array $attributes) => \Str::slug($attributes['name']),
        ];
    }

    public function forLevel(int $level, MarkerTypeCategory $markerTypeCategory = null): static
    {
        return $this
            ->when($markerTypeCategory, function ($factory) use ($markerTypeCategory) {
                return $factory->for($markerTypeCategory, 'parent')
                    ->for($markerTypeCategory->markerType);
            })
            ->state(fn (array $attributes) => [
                'name' => $name = $attributes['name'] . ' level ' . $level,
                'slug' => MarkerTypeCategory::ancestorsAndSelf($markerTypeCategory->id)->pluck('slug')->implode('-') . '/' . str($name)->slug(),
            ]);
    }
}
