<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This method seeds the database with predefined permissions and assigns them to the appropriate roles.
     * It first creates or updates the permissions in the 'permissions' table, then updates each role's permissions
     * in the 'roles' table.
     *
     * @return void
     */
    public function run(): void
    {
        // Define the permissions and their associated roles
        $permissions = [
            ['name' => 'Create Posts', 'slug' => 'create_posts', 'roles' => ['administrator', 'superadmin', 'author', 'owner']],
            ['name' => 'Edit Posts', 'slug' => 'edit_posts', 'roles' => ['administrator', 'superadmin', 'author', 'moderator', 'editor']],
            ['name' => 'Delete Posts', 'slug' => 'delete_posts', 'roles' => ['administrator', 'superadmin', 'moderator']],
            ['name' => 'Publish Posts', 'slug' => 'publish_posts', 'roles' => ['administrator', 'superadmin', 'author', 'editor']],
            ['name' => 'Manage Users', 'slug' => 'manage_users', 'roles' => ['administrator', 'superadmin']],
            ['name' => 'Manage Admins', 'slug' => 'manage_admins', 'roles' => ['administrator', 'superadmin']],
            ['name' => 'Manage Categories', 'slug' => 'manage_categories', 'roles' => ['administrator', 'superadmin']],
            ['name' => 'Manage Settings', 'slug' => 'manage_settings', 'roles' => ['superadmin']],
            ['name' => 'Manage Roles', 'slug' => 'manage_roles', 'roles' => ['superadmin']],
            ['name' => 'Create Roles', 'slug' => 'create_roles', 'roles' => ['superadmin']],
            ['name' => 'Delete Roles', 'slug' => 'delete_roles', 'roles' => ['superadmin']],
            ['name' => 'Manage Permissions', 'slug' => 'manage_permissions', 'roles' => ['superadmin']],
            ['name' => 'Create Permissions', 'slug' => 'create_permissions', 'roles' => ['superadmin']],
            ['name' => 'Delete Permissions', 'slug' => 'delete_permissions', 'roles' => ['superadmin']],
            ['name' => 'View Analytics', 'slug' => 'view_analytics', 'roles' => ['administrator', 'superadmin']],
            ['name' => 'Read Posts', 'slug' => 'read_posts', 'roles' => ['subscriber', 'administrator', 'author', 'owner', 'moderator', 'support', 'accountant', 'driver', 'superadmin']],
            ['name' => 'Edit Own Posts', 'slug' => 'edit_own_posts', 'roles' => ['author', 'owner', 'driver', 'administrator', 'superadmin']],
            ['name' => 'Delete Own Posts', 'slug' => 'delete_own_posts', 'roles' => ['author', 'owner', 'driver', 'administrator', 'superadmin']],
            ['name' => 'View Assigned Routes', 'slug' => 'view_assigned_routes', 'roles' => ['driver', 'administrator', 'superadmin']],
            ['name' => 'View Tickets', 'slug' => 'view_tickets', 'roles' => ['support', 'administrator', 'superadmin']],
            ['name' => 'Resolve Tickets', 'slug' => 'resolve_tickets', 'roles' => ['support', 'administrator', 'superadmin']],
            ['name' => 'Manage Comments', 'slug' => 'manage_comments', 'roles' => ['moderator', 'editor', 'administrator', 'superadmin']],
            ['name' => 'Manage Invoices', 'slug' => 'manage_invoices', 'roles' => ['accountant', 'administrator', 'superadmin']],
            ['name' => 'View Financial Reports', 'slug' => 'view_financial_reports', 'roles' => ['accountant', 'administrator', 'superadmin']],
            //Vehicles and related permissions
            ['name' => 'Add Vehicles', 'slug' => 'add_vehicles', 'roles' => ['administrator', 'superadmin', 'owner', 'driver']],
            ['name' => 'Delete Vehicles', 'slug' => 'delete_vehicles', 'roles' => ['administrator', 'superadmin', 'owner', 'driver']],
            ['name' => 'Edit Vehicles', 'slug' => 'edit_vehicles', 'roles' => ['administrator', 'superadmin', 'owner', 'driver']],
            ['name' => 'Manage Vehicles', 'slug' => 'manage_vehicles', 'roles' => ['administrator', 'superadmin', 'owner', 'driver']],
            ['name' => 'Read Posts', 'slug' => 'read_posts', 'roles' => ['subscriber', 'administrator', 'author', 'owner', 'moderator', 'support', 'accountant', 'driver', 'superadmin']],
            ['name' => 'Edit Own Posts', 'slug' => 'edit_own_posts', 'roles' => ['author', 'owner', 'driver', 'administrator', 'superadmin']],
            ['name' => 'Delete Own Posts', 'slug' => 'delete_own_posts', 'roles' => ['author', 'owner', 'driver', 'administrator', 'superadmin']],
        ];

        // Iterate over each permission and process it
        foreach ($permissions as $permissionData) {
            $roles = $permissionData['roles'];

            // Create or update the permission record in the 'permissions' table
            DB::table('permissions')->updateOrInsert(
                ['slug' => $permissionData['slug']],
                [
                    'name' => $permissionData['name'],
                    'slug' => $permissionData['slug'],
                    'roles' => json_encode($roles), // Store roles as JSON array in the roles column
                ]
            );

            // Update each role's permissions column in the 'roles' table
            foreach ($roles as $roleSlug) {
                $role = DB::table('roles')->where('slug', $roleSlug)->first();
                if ($role) {
                    $rolePermissions = json_decode($role->permissions, true) ?: [];
                    if (!in_array($permissionData['slug'], $rolePermissions)) {
                        $rolePermissions[] = $permissionData['slug'];
                        DB::table('roles')->where('id', $role->id)->update(['permissions' => json_encode($rolePermissions)]);
                    }
                }
            }
        }
    }
}