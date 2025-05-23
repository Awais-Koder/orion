<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Country;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),

            'preferred_country_id' => $this->faker->randomElement([null, Country::factory()]),
            'company_id' => null,
            'manufacturer_id' => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function forCompany(): static
    {
        return $this->state(function (array $attributes, Company $company) {
            return [
                'manufacturer_id' => null,
                'company_id' => $company->id,
            ];
        });
    }

    public function forManufacturer(): static
    {
        return $this->state(function (array $attributes, Manufacturer $manufacturer) {
            return [
                'manufacturer_id' => $manufacturer->id,
                'company_id' => null,
            ];
        });
    }
}
