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
        // Define the roles that should be excluded from the user creation process
        $excludeRoles = [''];
        // Fetch roles from the Role model, which has 'guard' set to 'web' and exclude the roles listed in $excludeRoles
        $roles = Role::where('guard', 'web')->whereNotIn('name', $excludeRoles)->get();
        // Extract the slugs of the roles for random selection later
        $role = $roles->pluck('slug')->toArray();

        // Default user attributes
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'phone' => json_encode([
                'country_code' => fake()->countryCode(),
                'phone' => fake()->unique()->numberBetween(19500000, 1090000000),
                'verified_at' => now(), // Phone number is verified
                
            ]),// Phone verification timestamp
            'password' => static::$password ??= Hash::make('password'),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
            'status' => Arr::random(['active', 'inactive', 'suspended']),
            'rating' => Arr::random(['1.0', '1.5', '2.0', '2.5', '3.0', '3.5', '4.0', '4.2', '4.5', '4.6', '4.7', '4.8', '5.0']),
            'role' => Arr::random($role), // Assign a random role from the $role array
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

    /**
     * Indicate that the user should have a personal team.
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
