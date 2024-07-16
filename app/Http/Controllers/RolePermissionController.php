<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function assignPermission(Request $request, Role $role)
    {
        $permission = Permission::find($request->permission_id);

        if ($permission) {
            $role->permissions()->attach($permission);
            return redirect()->back()->with('success', 'Permission assigned successfully.');
        }

        return redirect()->back()->with('error', 'Permission not found.');
    }

    public function removePermission(Request $request, Role $role)
    {
        $permission = Permission::find($request->permission_id);

        if ($permission) {
            $role->permissions()->detach($permission);
            return redirect()->back()->with('success', 'Permission removed successfully.');
        }

        return redirect()->back()->with('error', 'Permission not found.');
    }
}
