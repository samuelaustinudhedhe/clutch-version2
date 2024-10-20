<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

/**
 * Class AdminSeeder
 * 
 * Seeder class to populate the database with admin users.
 */
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * This method retrieves all roles with 'guard' set to 'admin' and creates
     * an admin user for each role. The admin user's name, email, password, 
     * and role are set based on the role's attributes.
     * 
     * @return void
     */
    public function run(): void
    {
        // Retrieve all roles where 'guard' is 'admin'
        $roles = Role::where('guard', 'admin')->get();

        // Loop through each role and create an admin user
        foreach ($roles as $role) {
            // Check if the role is 'super-admin' and set the name to 'Webmaster'
            $name = $role->slug === 'superadmin' ? 'Webmaster' : $role->name . ' Admin';

            // Create admin users and assign roles
            Admin::create([
                'name' => $name, // Admin user's name
                'email' => strtolower($role->name) . '@clutch.africa', // Admin user's email
                'password' => Hash::make('3233ClutchWW'), // Admin user's password (hashed)
                'role' => $role->slug, // Admin user's role
            ]);
        }
        // Create 20 admin users
        Admin::factory(0)->create();
    }
}