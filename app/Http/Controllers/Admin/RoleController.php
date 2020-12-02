<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\RoleStoreRequest;
use App\Http\Requests\Admin\RoleUpdateRequest;
use App\Queries\RoleQuery;
use App\Role;
use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert;
use Spatie\Permission\Models\Permission;

class RoleController
{
    public function index()
    {
        $rolesQuery = new RoleQuery(Role::query());

        return view('admin.roles.index', [
            'roles' => $rolesQuery->paginate(request('perPage')),
        ]);
    }

    public function create()
    {
        $permissions = Permission::get();
        $groupPermissions = $permissions->groupBy(function ($permission) {
            [, $group] = explode(' ', $permission->name);

            return $group;
        });

        return view('admin.roles.create', compact('groupPermissions'));
    }

    public function store(RoleStoreRequest $request)
    {
        $role = Role::create(['name' => $request->input('name')]);

        $role->syncPermissions($request->allowPermissions());

        Alert::success(__('Role ":model" has been successfully created!', ['model' => $role->name]))->flash();

        return response()->json([
            'status' => true,
        ]);
    }

    public function edit(Role $role)
    {
        $allowPermissions = $role->getPermissionNames()->toArray();
        $permissions = Permission::get();
        $groupPermissions = $permissions->groupBy(function ($permission) {
            [, $group] = explode(' ', $permission->name);

            return $group;
        });

        return view('admin.roles.edit', compact('role', 'groupPermissions', 'allowPermissions'));
    }

    public function update(RoleUpdateRequest $request, Role $role)
    {
        $role->update(['name' => $request->input('name')]);

        $role->syncPermissions($request->allowPermissions());

        Alert::success(__('Role ":model" has been successfully updated!', ['model' => $role->name]))->flash();

        return response()->json([
            'status' => true,
        ]);
    }

    public function destroy(Role $role)
    {
        $role->delete();
        Alert::success(__('Role ":model" has been successfully deleted!', ['model' => $role->name]))->flash();

        return response()->json([
            'status' => true,
        ]);
    }
}
