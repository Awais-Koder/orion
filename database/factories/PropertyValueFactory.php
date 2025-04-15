<?php

namespace Database\Factories;

use App\Models\Enums\PropertyTypeEnum;
use App\Models\Property;
use App\Models\PropertyChoice;
use App\Models\PropertyValue;
use App\Models\SolutionVersion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PropertyValue>
 */
class PropertyValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'property_id' => Property::factory(),
            'solution_version_id' => SolutionVersion::factory(),
            'property_choice_id' => $propertyChoiceId = $this->faker->randomElement([null, PropertyChoice::factory()]),
            'value' => $propertyChoiceId ? null : $this->faker->randomNumber(),
        ];
    }

    public function relatedValue(): self
    {
        return $this->state(function (array $attributes)
        {
            return [
                'property_choice_id' => function(array $attributes)
                {
                    $property = Property::findOrFail($attributes['property_id']);

                    return $property->type === PropertyTypeEnum::Choice ? $property->propertyChoices()->inRandomOrder()->firstOrFail()->id : null;
                },
                'value' => function(array $attributes)
                {
                    $property = Property::findOrFail($attributes['property_id']);

                    return match($property->type)
                    {
                        PropertyTypeEnum::Choice => null,
                        PropertyTypeEnum::Option => $this->faker->randomElement([null, true, false]), // TODO High: Review if we allow null, or we only support a missing row acting as null.
                        PropertyTypeEnum::Slider => $this->faker->numberBetween(0, 100),
                        PropertyTypeEnum::Number => $this->faker->numberBetween(0, 100),
                        PropertyTypeEnum::Text => $this->faker->word(),
                    };
                }
            ];
        });
    }
}
