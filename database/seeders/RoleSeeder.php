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
        // Define the roles and their associated permissions
        $roles = [
            [
                'name' => 'Administrator',
                'slug' => 'administrator',
                'guard' => 'admin',
                'permissions' => ['create_posts', 'edit_posts', 'delete_posts', 'publish_posts', 'manage_users', 'manage_categories', 'view_analytics'],
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
                'permissions' => ['create_posts', 'edit_own_posts', 'delete_own_posts', 'publish_posts'],
            ],
            [
                'name' => 'Moderator',
                'slug' => 'moderator',
                'guard' => 'admin',
                'permissions' => ['edit_posts', 'delete_posts', 'manage_comments'],
            ],
            [
                'name' => 'Editor',
                'slug' => 'editor',
                'guard' => 'admin',
                'permissions' => ['edit_posts', 'publish_posts', 'delete_posts'],
            ],
            [
                'name' => 'Accountant',
                'slug' => 'accountant',
                'guard' => 'admin',
                'permissions' => ['manage_invoices', 'view_financial_reports'],
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
                'permissions' => ['create_posts', 'edit_own_posts', 'delete_own_posts'],
            ],
            [
                'name' => 'Driver',
                'slug' => 'driver',
                'guard' => 'web',
                'permissions' => ['view_assigned_routes'],
            ],
        ];

        // Iterate over each role and create it in the database
        foreach ($roles as $roleData) {
            $rolePermissions = $roleData['permissions'];

            // Create the role
            Role::create([
                'name' => $roleData['name'],
                'slug' => $roleData['slug'],
                'permissions' => $rolePermissions,
                'guard' => $roleData['guard'],
            ]);

            // Update each permission's roles column
            foreach ($rolePermissions as $permissionSlug) {
                $permission = DB::table('permissions')->where('slug', $permissionSlug)->first();
                if ($permission) {
                    $permissionRoles = json_decode($permission->roles, true) ?: [];
                    if (!in_array($roleData['slug'], $permissionRoles)) {
                        $permissionRoles[] = $roleData['slug'];
                        DB::table('permissions')->where('id', $permission->id)->update(['roles' => json_encode($permissionRoles)]);
                    }
                }
            }
        }
    }
}
