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
        // Exclude specific roles from the list of available roles for the AdminFactory
        $excludeRoles = ['SuperAdmin', 'Administrator', 'Accountant'];

        // Fetch roles from the Role model, authorized for admin section, excluding the roles in $excludeRoles
        $roles = Role::where('guard', 'admin')->whereNotIn('name', $excludeRoles)->get();

        // Convert the roles to an array of slugs
        $role = $roles->pluck('slug')->toArray();

        // The default attributes for the generated Admin model
        return [
            'name' => fake()->name(), // Generate a random name
            'email' => fake()->unique()->safeEmail(), // Generate a unique, random email
            'email_verified_at' => now(), // Email verification timestamp
            'password' => static::$password ?? Hash::make('password'), // Password (use static password or hash a default one)
            'status' => Arr::random(['active', 'inactive', 'suspended']), // Random status
            'role' => Arr::random($role), // Assign a random role from the available roles
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
