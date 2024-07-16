<?php

namespace App\Http\Controllers\Admin\Resources;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionResourceController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::all();
        return view('admin.resources.permissions.index', [
            'permissions' => $permissions,
            'request' => $request,
            'admin' => $request->user('admin'),
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.resources.permissions.create',[
            'roles' => Role::all(),
            'request' => $request,
            'admin' => $request->user('admin'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions',
            'slug' => 'required|unique:permissions',
        ]);

        Permission::create($request->all());

        return redirect()->route('admin.permissions.index')->with('success', 'Permission created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(Permission $permission)
    {
        return view('admin.resources.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
            'slug' => 'required|unique:permissions,slug,' . $permission->id,
        ]);

        $permission->update($request->all());

        return redirect()->route('admin.permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('admin.permissions.index')->with('success', 'Permission deleted successfully.');
    }
}
