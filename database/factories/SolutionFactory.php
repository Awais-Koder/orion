<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Manufacturer;
use Database\Factories\Concerns\HasSequencedName;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EtaReport;
use App\Models\MarkerType;
use App\Models\MarkerTypeCategory;

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
            'name' => ['en' => 'Solution ' . $this->faker->name],
            'slug' => fn(array $attributes) => ['en' => str($attributes['name'])->slug()],
            'code' => $this->faker->optional()->postcode,
            'marker_type_id' => MarkerType::factory(),
            'marker_type_category_id' => MarkerTypeCategory::factory(),
            'eta_report_id' => EtaReport::factory(),
            'description' => ['en' => $this->faker->optional()->text],
            'fire_rating' => ['en' => $this->faker->randomElement([null, '< EI 90 U/U', '< EI 120 U/U', '< EI 180 U/U'])],
            'photos' => $this->faker->randomElement([null, [$this->faker->image, $this->faker->image]]),
            'eta_page_numbers' => $this->faker->randomElement([null, [1, 2]]),
            'bim_files' => $this->faker->randomElement([null, [$this->faker->filePath(), $this->faker->filePath()]]),
            'website_url' => $this->faker->optional()->url,
        ];        
    }
}
