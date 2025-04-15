<?php

namespace Database\Factories;

use App\Models\SolutionVersion;
use Database\Factories\Concerns\HasSequence;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SolutionVersionDocument>
 */
class SolutionVersionDocumentFactory extends Factory
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
            'file' => $this->faker->filePath(),
            'name' => 'Solution Version Document ' . $this->faker->name . '.pdf',
            'sequence' => 0,
        ];
    }
}
