<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This method seeds the database with predefined permissions.
     * It creates or updates the permissions in the 'permissions' table.
     *
     * @return void
     */
    public function run(): void
    {
        // Define the permissions with descriptions
        $permissions = [
            // Post permissions
            ['name' => 'Create Posts', 'slug' => 'create_posts', 'description' => 'Allows the user to create new posts'],
            ['name' => 'Edit Posts', 'slug' => 'edit_posts', 'description' => 'Allows the user to edit any post'],
            ['name' => 'Delete Posts', 'slug' => 'delete_posts', 'description' => 'Allows the user to delete any post'],
            ['name' => 'Publish Posts', 'slug' => 'publish_posts', 'description' => 'Allows the user to publish posts'],
            ['name' => 'Read Posts', 'slug' => 'read_posts', 'description' => 'Allows the user to read posts'],
            ['name' => 'Edit Own Posts', 'slug' => 'edit_own_posts', 'description' => 'Allows the user to edit their own posts'],
            ['name' => 'Delete Own Posts', 'slug' => 'delete_own_posts', 'description' => 'Allows the user to delete their own posts'],

            // User management
            ['name' => 'Manage Users', 'slug' => 'manage_users', 'description' => 'Allows the user to manage other users'],
            ['name' => 'Manage Admins', 'slug' => 'manage_admins', 'description' => 'Allows the user to manage admin users'],

            // Category management
            ['name' => 'Manage Categories', 'slug' => 'manage_categories', 'description' => 'Allows the user to manage categories'],

            // Settings management
            ['name' => 'Manage Settings', 'slug' => 'manage_settings', 'description' => 'Allows the user to manage application settings'],

            // Support
            ['name' => 'View Tickets', 'slug' => 'view_tickets', 'description' => 'Allows the user to view support tickets'],
            ['name' => 'Resolve Tickets', 'slug' => 'resolve_tickets', 'description' => 'Allows the user to resolve support tickets'],

            // Roles and Permissions
            ['name' => 'Manage Roles', 'slug' => 'manage_roles', 'description' => 'Allows the user to manage roles'],
            ['name' => 'Create Roles', 'slug' => 'create_roles', 'description' => 'Allows the user to create new roles'],
            ['name' => 'Delete Roles', 'slug' => 'delete_roles', 'description' => 'Allows the user to delete roles'],
            ['name' => 'Manage Permissions', 'slug' => 'manage_permissions', 'description' => 'Allows the user to manage permissions'],
            ['name' => 'Create Permissions', 'slug' => 'create_permissions', 'description' => 'Allows the user to create new permissions'],
            ['name' => 'Delete Permissions', 'slug' => 'delete_permissions', 'description' => 'Allows the user to delete permissions'],

            // Analytics
            ['name' => 'View Analytics', 'slug' => 'view_analytics', 'description' => 'Allows the user to view analytics'],

            // Routes
            ['name' => 'View Assigned Routes', 'slug' => 'view_assigned_routes', 'description' => 'Allows the user to view assigned routes'],

            // Comments
            ['name' => 'Manage Comments', 'slug' => 'manage_comments', 'description' => 'Allows the user to manage comments'],

            // Invoices
            ['name' => 'Manage Invoices', 'slug' => 'manage_invoices', 'description' => 'Allows the user to manage invoices'],

            // Financial Reports
            ['name' => 'View Financial Reports', 'slug' => 'view_financial_reports', 'description' => 'Allows the user to view financial reports'],

            // Vehicle management
            ['name' => 'Delete Vehicles', 'slug' => 'delete_vehicles', 'description' => 'Allows the user to delete vehicles'],
            ['name' => 'Edit Vehicles', 'slug' => 'edit_vehicles', 'description' => 'Allows the user to edit vehicles'],
            ['name' => 'Manage Vehicles', 'slug' => 'manage_vehicles', 'description' => 'Allows the user to manage vehicles'],
            ['name' => 'Add Vehicles', 'slug' => 'add_vehicles', 'description' => 'Allows the user to add new vehicles'],
            ['name' => 'Edit Own Vehicles', 'slug' => 'edit_own_vehicles', 'description' => 'Allows the user to edit their own vehicles'],
            ['name' => 'Delete Own Vehicles', 'slug' => 'delete_own_vehicles', 'description' => 'Allows the user to delete their own vehicles'],
            ['name' => 'Manage Own Vehicles', 'slug' => 'manage_own_vehicles', 'description' => 'Allows the user to manage their own vehicles'],
        ];

        // Iterate over each permission and create or update it in the 'permissions' table
        foreach ($permissions as $permissionData) {

            Permission::create($permissionData);
        }
    }
}