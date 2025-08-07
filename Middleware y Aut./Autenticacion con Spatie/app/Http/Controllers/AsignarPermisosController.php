<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AsignarPermisosController extends Controller
{
    public function edit(Role $role)
    {
//Para Asignar permisos a los roles
        $permisos = Permission::all();
        return view('admin.sistema.rolePermiso', compact('role', 'permisos'));
    }

    public function update(Request $request, Role $role)
    {
       //Para Asignar permisos a los roles
        $role->permissions()->sync($request->permisos);
        return redirect()->route('admin.sistema.roles.index', $role);
    }
}
