<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This method seeds the database with predefined roles and their associated permissions.
     * It creates roles and updates the permissions to include the roles that have them.
     *
     * @return void
     */
    public function run(): void
    {
        // Define the basic permissions that all users should have
        $basicPermissions = [
            'create_posts',
            'edit_own_posts',
            'delete_own_posts',
            'read_posts',
            'edit_own_posts',
            'delete_own_posts',
            'edit_own_vehicles',
            'delete_own_vehicles',
            'manage_own_invoices',
            'view_own_financial_reports'
        ];

        // Fetch the basic permissions from the database
        $user_basic_permissions = Permission::whereIn('slug', $basicPermissions)->pluck('slug')->toArray();

        // Define the roles and their associated permissions
        $roles = [
            [
                'name' => 'Administrator',
                'slug' => 'administrator',
                'guard' => 'admin',
                'permissions' => array_merge($user_basic_permissions, ['publish_posts', 'manage_users', 'manage_categories', 'view_analytics', 'view_tickets', 'resolve_tickets']),
            ],
            [
                'name' => 'SuperAdmin',
                'slug' => 'superadmin',
                'guard' => 'admin',
                'permissions' => Permission::all()->pluck('slug')->toArray(), // All permissions
            ],
            [
                'name' => 'Support',
                'slug' => 'support',
                'guard' => 'admin',
                'permissions' => ['view_tickets', 'resolve_tickets'],
            ],
            [
                'name' => 'Author',
                'slug' => 'author',
                'guard' => 'admin',
                'permissions' => array_merge($user_basic_permissions, ['publish_posts']),
            ],
            [
                'name' => 'Moderator',
                'slug' => 'moderator',
                'guard' => 'admin',
                'permissions' => array_merge($user_basic_permissions, ['manage_comments']),
            ],
            [
                'name' => 'Editor',
                'slug' => 'editor',
                'guard' => 'admin',
                'permissions' => array_merge($user_basic_permissions, ['publish_posts']),
            ],
            [
                'name' => 'Accountant',
                'slug' => 'accountant',
                'guard' => 'admin',
                'permissions' => ['manage_invoices', 'view_financial_reports'],
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'guard' => 'admin',
                'permissions' => [],
            ],
            [
                'name' => 'Subscriber',
                'slug' => 'subscriber',
                'guard' => 'web',
                'permissions' => ['read_posts'],
            ],
            [
                'name' => 'Owner',
                'slug' => 'owner',
                'guard' => 'web',
                'permissions' => array_merge($user_basic_permissions, ['assign_routes', 'add_vehicles']),
            ],
            [
                'name' => 'Driver',
                'slug' => 'driver',
                'guard' => 'web',
                'permissions' => array_merge($user_basic_permissions, ['view_assigned_routes']),
            ],
        ];

        // Iterate over each role and create it in the database
        foreach ($roles as $role) {

            // Create the role
            Role::create($role);

            // Update each permission's roles column
            foreach ($role['permissions'] as $permissionSlug) {
                $permission = Permission::where('slug', $permissionSlug)->first();
                if ($permission) {
                    $permissionRoles = $permission['roles'] ?: [];
                    if (!in_array($role['slug'], $permissionRoles)) {
                        $permissionRoles[] = $role['slug'];
                        Permission::where('id', $permission['id'])->update(['roles' => $permissionRoles]);
                    }
                }
            }
        }
    }
}
