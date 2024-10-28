<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'permissions', 'description', 'guard'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'permissions' => 'array',
    ];

    /**
     * The default role for administrators.
     *
     * @var string
     */
    const DEFAULT_ADMIN_ROLE = 'admin';

    /**
     * The default role for regular users.
     *
     * @var string
     */
    const DEFAULT_USER_ROLE = 'subscriber';

    /**
     * Roles that cannot be deleted from the system.
     *
     * These roles are considered essential for the system's operation
     * and should not be removed under any circumstances.
     *
     * @var array
     */
    const INDELIBLE = ['administrator', 'superadmin'];

    /**
     * Check if the role has a specific permission.
     *
     * @param string $permissionSlug The slug of the permission to check.
     * @return bool True if the role has the specified permission, false otherwise.
     */
    public static function hasPermission($roleSlug, $permissionSlug)
    {
        $role = self::where('slug', $roleSlug)->first();

        if (!$role) {
            return false;
        }

        // If permissions is a JSON string, decode it
        $permissions = is_string($role->permissions) ? json_decode($role->permissions, true) : $role->permissions;

        // Check if the permission slug exists in the role's permissions array
        return in_array($permissionSlug, $permissions ?? []);
    }

    /**
     * Check if the role has specific permission(s).
     *
     * @param string $roleSlug The slug of the role to check.
     * @param string|array $permissionSlugs The slug(s) of the permission(s) to check.
     * @return bool True if the role has all the specified permission(s), false otherwise.
     */
    public static function hasPermissions($roleSlug, $permissionSlugs)
    {
        $role = self::where('slug', $roleSlug)->first();

        if (!$role) {
            return false;
        }

        // If permissions is a JSON string, decode it
        $rolePermissions = is_string($role->permissions) ? json_decode($role->permissions, true) : $role->permissions;

        // Ensure $permissionSlugs is an array
        $permissionSlugs = (array)$permissionSlugs;

        // Check if all the permission slugs exist in the role's permissions array
        return count(array_intersect($permissionSlugs, $rolePermissions ?? [])) === count($permissionSlugs);
    }

    /**
     * Get roles that have certain permission(s).
     *
     * @param string|array $permissions Single permission slug or array of permission slugs.
     * @return \Illuminate\Database\Eloquent\Collection Collection of roles that have the specified permission(s).
     */
    public static function withPermissions($permissions)
    {
        // Convert single permission to array if necessary
        $permissions = (array)$permissions;

        return self::whereHas('permissions', function ($query) use ($permissions) {
            $query->whereIn('slug', $permissions);
        })->get();
    }

    /**
     * Get the permissions that belong to the role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permissions');
    }

    /**
     * Get the admins that belong to the role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function admins()
    {
        return $this->hasMany(Admin::class, 'role');
    }

    /**
     * Get the users that belong to the role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'role');
    }
}
