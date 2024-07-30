<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
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
            'phone' => $this->generatePhone(),
            'password' => static::$password ?? Hash::make('password'),
            'status' => Arr::random(['active', 'inactive', 'suspended']),
            'role' => $this->getRandomRole(),
        ];
    }

    /**
     * Generate a random phone number.
     *
     * @return string
     */
    protected function generatePhone(): string
    {
        return json_encode([
            'country_code' => fake()->countryCode(),
            'phone' => fake()->unique()->numberBetween(19500000, 1090000000),
            'verified_at' => now(),
        ]);
    }

    /**
     * Get a random role excluding specific roles.
     *
     * @return string
     */
    protected function getRandomRole(): string
    {
        $excludeRoles = ['SuperAdmin', 'Administrator', 'Accountant'];
        $roles = Role::where('guard', 'admin')->whereNotIn('name', $excludeRoles)->pluck('slug')->toArray();
        return Arr::random($roles);
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