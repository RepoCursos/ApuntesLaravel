<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        //$this->middleware();
    }
    
    public function index()
    {
        $usuarios = User::with('roles')->get();
        return view('admin.usuario.index', compact('usuarios'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.usuario.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->assignRole($request->role);
        return redirect()->route('admin.usuario.index');
    }

    public function show(User $usuario)
    {
        //
    }

    public function edit(User $usuario)
    {
        //
    }

    public function update(Request $request, User $usuario)
    {
        //
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('admin.usuario.index');
    }
}
