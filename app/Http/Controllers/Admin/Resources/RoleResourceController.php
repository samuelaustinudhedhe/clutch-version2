<?php

namespace App\Http\Controllers\Admin\Resources;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleResourceController extends Controller
{

    public function index(Request $request)
    {
        $roles = Role::all();
        return view('admin.resources.roles.index', [
            'roles' => $roles,
            'request' => $request,
            'admin' => $request->user('admin'),
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.resources.roles.create',[
            'permissions' => Permission::all(),
            'request' => $request,
            'admin' => $request->user('admin'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
            'slug' => 'required|unique:roles',
        ]);

        Role::create($request->all());

        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(Role $role)
    {
        return view('admin.resources.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'slug' => 'required|unique:roles,slug,' . $role->id,
        ]);

        $role->update($request->all());

        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully.');
    }
}
