<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EtaReport>
 */
class EtaReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'manufacturer_id' => Manufacturer::factory(),
            'file' => $this->faker->filePath(),
            'main_pages' => $this->faker->randomElement([
                null,
                [1, 2, 3]
            ])
        ];
    }
}
