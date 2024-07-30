<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This method is responsible for seeding the users table with data.
     * It retrieves all roles with 'guard' set to 'web' and creates a user
     * for each role. The user's name, email, and role are set based on the
     * role's properties.
     *
     * @return void
     */
    public function run(): void
    {
        // Retrieve all roles where 'guard' is 'web'
        $roles = Role::where('guard', 'web')->get();

        // Loop through each role and create a user
        foreach ($roles as $role) {
            User::factory()->create([
                'name' => $role->name,
                'email' => strtolower($role->name) . '@example.com',
                'role' => $role->slug,
            ]);
        }
        // Create 1432 users
        User::factory(30)->create();
    }
}
