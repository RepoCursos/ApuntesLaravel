<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.sistema.roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        $rol = Role::create(['name' => $request->name]);
        return back();
    }

    public function edit(Role $role)
    {
        return view('admin.sistema.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $role->update(['name' => $request->name]);
        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back();
    }
}
