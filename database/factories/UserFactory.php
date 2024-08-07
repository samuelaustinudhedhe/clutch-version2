<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

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
            'password' => static::$password ??= Hash::make('password'),
            'status' => Arr::random(['active', 'inactive', 'suspended', 'onboarding']),
            'rating' => Arr::random(['1.0', '1.5', '2.0', '2.5', '3.0', '3.5', '4.0', '4.2', '4.5', '4.6', '4.7', '4.8', '5.0']),
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
        $roles = Role::where('guard', 'web')->whereNotIn('name', $excludeRoles)->pluck('slug')->toArray();
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
            ],
            'work' => [
                'street' => fake()->streetAddress,
                'unit' => fake()->buildingNumber,
                'city' => fake()->city,
                'state' => fake()->state,
                'country' => fake()->country,
                'postal_code' => fake()->postcode,
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

    /**
     * Indicate that the user should have a personal team.
     *
     * @param callable|null $callback
     * @return static
     */
    public function withPersonalTeam(callable $callback = null): static
    {
        if (!Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn (array $attributes, User $user) => [
                    'name' => $user->name . '\'s Team',
                    'user_id' => $user->id,
                    'personal_team' => true,
                ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
    }
}
