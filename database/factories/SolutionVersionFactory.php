<?php

namespace Database\Factories;

use App\Models\EtaReport;
use App\Models\MarkerType;
use App\Models\MarkerTypeCategory;
use App\Models\Solution;
use App\Models\SolutionVersion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use PHPUnit\Util\VersionComparisonOperator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SolutionVersion>
 */
class SolutionVersionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'solution_id' => Solution::factory(),
            'marker_type_id' => MarkerType::factory(),
            'marker_type_category_id' => MarkerTypeCategory::factory(),
            'eta_report_id' => EtaReport::factory(),
            'name' => 'Solution ' . $this->faker->randomLetter,
            'slug' => fn(array $attributes) => str($attributes['name'])->slug(),
            'description' => $this->faker->optional()->text,
            'fire_rating' => $this->faker->randomElement([null, '< EI 90 U/U', '< EI 120 U/U', '< EI 180 U/U']),
            'photos' => $this->faker->randomElement([null, [$this->faker->image, $this->faker->image]]),
            'eta_page_numbers' => $this->faker->randomElement([null, [1, 2]]),
            'bim_files' => $this->faker->randomElement([null, [$this->faker->filePath(), $this->faker->filePath()]]),
            'website_url' => $this->faker->optional()->url,
            'version_code' => $this->faker->numberBetween(1, 100),
            'version_explanation' => $this->faker->optional()->text,
            'is_visible' => true,
        ];
    }

    public function sequencedVersionCode(): self
    {
        return $this->sequence(fn(Sequence $sequence) => [
            'version_code' => 100000 + $sequence->index
        ])
            ->afterCreating(function(SolutionVersion $solutionVersion)
            {
                $solutionVersion->version_code = $solutionVersion->solution->refresh()->solutionVersions()->where('version_code', '<', 100000)->count() + 1;
                $solutionVersion->save();
            });
    }
}
