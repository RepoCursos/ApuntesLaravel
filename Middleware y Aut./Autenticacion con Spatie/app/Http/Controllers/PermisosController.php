<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisosController extends Controller
{
    public function index()
    {
        $permisos = Permission::all();
        return view('admin.sistema.permisos.index', compact('permisos'));
    }

    public function store(Request $request)
    {
        Permission::create(['name' => $request->name]);
        return back();
    }

    public function edit(Permission $permiso)
    {
        return view('admin.sistema.permisos.edit', compact('permiso'));
    }

    public function update(Request $request, Permission $permiso)
    {
        $permiso->update(['name' => $request->name]);
        return redirect()->route('admin.sistema.permisos.index');
    }

    public function destroy(Permission $permiso)
    {
        $permiso->delete();
        return back();
    }
}
