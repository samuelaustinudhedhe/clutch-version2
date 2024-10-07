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
            'password' => static::$password ?? Hash::make('password'),
            'role' => $this->getRandomRole(),            
            'details' => $this->generateDetails(),
        ];
    }

    /**
     * Get a random role excluding specific roles.
     *
     * @return string
     */
    protected function getRandomRole(): string
    {
        $excludeRoles = [''];
        $roles = Role::where('guard', 'admin')->whereNotIn('name', $excludeRoles)->pluck('slug')->toArray();
        return Arr::random($roles);
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Generate user details.
     *
     * @return string
     */
    public function generateDetails()
    {
        return json_encode([
            'phone' => [
                'work' => $this->generatePhone(),
                'home' => $this->generatePhone(),
            ],
            'status' => Arr::random(['active', 'inactive', 'suspended']),
            'date_of_birth' => fake()->date(max: '2006-12-31'),
            'gender' => Arr::random(['Male', 'Female', 'Prefer not to say']),
            'address' => $this->generateAddress(),
            'social' => $this->generateSocialLinks(),
        ]);
    }

    /**
     * Generate a random phone number.
     *
     * @return array
     */
    protected function generatePhone()
    {
        return [
            'country_code' => fake()->countryCode(),
            'number' => fake()->unique()->numberBetween(19500000, 1090000000),
            'verified_at' => now(),
        ];
    }

    /**
     * Generate a random address.
     *
     * @return array
     */
    public function generateAddress()
    {
        return [
            'home' => [
                'street' => fake()->streetAddress,
                'unit' => fake()->buildingNumber,
                'city' => fake()->city,
                'state' => fake()->state,
                'country' => fake()->country,
                'postal_code' => fake()->postcode,
                'latitude' => fake()->latitude,
                'longitude' => fake()->longitude,
                'full' => fake()->address,
            ],
            'work' => [
                'street' => fake()->streetAddress,
                'unit' => fake()->buildingNumber,
                'city' => fake()->city,
                'state' => fake()->state,
                'country' => fake()->country,
                'postal_code' => fake()->postcode,
                'latitude' => fake()->latitude,
                'longitude' => fake()->longitude,
                'full' => fake()->address,
            ],
            // Add others as needed
        ];
    }

    /**
     * Generate social media links.
     *
     * @return array
     */
    public function generateSocialLinks()
    {
        return [
            'facebook' => 'https://facebook.com/' . fake()->userName,
            'instagram' => 'https://instagram.com/' . fake()->userName,
            'x' => 'https://x.com/' . fake()->userName,
            'linkedin' => 'https://linkedin.com/' . fake()->userName,
        ];
    }
}