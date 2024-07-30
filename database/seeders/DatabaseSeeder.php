<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Authors;
use App\Models\Books;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        # Call the SettingsSeeder to seed the settings table
        $this->call(SettingSeeder::class);
        
        # Call the RoleSeeder to seed the roles table
        $this->call(RoleSeeder::class);
        
        # Call the PermissionSeeder to seed the permissions table
        $this->call(PermissionSeeder::class);
        
        # Call the AdminSeeder to seed the admin users table
        $this->call(AdminSeeder::class);
        
        # Call the UserSeeder to seed the users table
        $this->call(UserSeeder::class);

        # Call the VehiclesSeeder to seed the vehicles table
        $this->call(VehicleSeeder::class);
        
        # Call the AttachmentSeeder to seed the authors table
        $this->call(AttachmentSeeder::class);
        
        # Call the NotificationSeeder to seed the authors table
        $this->call(NotificationSeeder::class);
    }
}
