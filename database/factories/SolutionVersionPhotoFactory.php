<?php

namespace Database\Factories;

use App\Models\SolutionVersion;
use Database\Factories\Concerns\HasSequence;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SolutionVersionPhoto>
 */
class SolutionVersionPhotoFactory extends Factory
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
            'solution_version_id' => SolutionVersion::factory(),
            'external_link' => $this->faker->optional()->url,
            'file' => $this->faker->filePath(),
            'sequence' => 0,
        ];
    }
}
