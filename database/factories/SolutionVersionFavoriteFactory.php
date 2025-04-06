<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\SolutionVersion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SolutionVersionFavorite>
 */
class SolutionVersionFavoriteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'company_id' => Company::factory(),
            'solution_version_id' => SolutionVersion::factory(),
        ];
    }
}
