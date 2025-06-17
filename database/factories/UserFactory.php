<?php

namespace Database\Factories;

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
                // 'name' => 'Admin',
                // 'username' => 'admin',
                // 'phone' => '1234567890',
                // 'email' => 'admin@example.com',
                // 'role' => 'admin',
                // 'status' => 'active',
                // 'user_type' => 'real',
                // 'password' => Hash::make('password'),
                // 'created_at' => now(),
                // 'updated_at' => now(),

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'username' => fake()->unique()->userName(),
            'phone' => fake()->unique()->phoneNumber(),
            'role' => fake()->randomElement(['admin', 'user', 'agent', 'developer']),
            'status' => fake()->randomElement(['active', 'inactive', 'suspended']),
            'user_type' => fake()->randomElement(['demo', 'real']),
            'city_name' => fake()->city(),
            'street_name' => fake()->streetName(),
            'street_number' => fake()->buildingNumber(),
            'building_name' => fake()->word(),
            'apartment_number' => fake()->word(),
            'floor_number' => fake()->word(),
            'landmark' => fake()->word(),
            'state_code' => fake()->word(),
            'state_name' => fake()->word(),
            'country_code' => fake()->countryCode(),
            'country_name' => fake()->country(),
            'zip_code' => fake()->postcode(),
            'contract_number' => fake()->word(),
            'contract_start_date' => fake()->date(),
            'contract_end_date' => fake()->date(),
            'contract_status' => fake()->word(),
            'contract_type' => fake()->word(),
            'contract_value' => fake()->randomFloat(2, 1000, 10000),
            'contract_currency' => fake()->currencyCode(),
            'contract_description' => fake()->text(),
            'email_verified_at' => now(),
            'photo' => fake()->imageUrl(),
            'bio' => fake()->text(),
            'facebook' => fake()->url(),
            'twitter' => fake()->url(),
            'linkedin' => fake()->url(),
            'instagram' => fake()->url(),
            'youtube' => fake()->url(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
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
}
