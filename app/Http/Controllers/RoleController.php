<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:roles.create')->only(['create', 'store']);
        $this->middleware('can:roles.index')->only(['index']);
        $this->middleware('can:roles.edit')->only(['edit', 'update']);
        $this->middleware('can:roles.show')->only(['show']);
        $this->middleware('can:roles.destroy')->only(['destroy']);
    }

    public function index()
    {
        $roles = Role::get();
        return view('admin.role.index', compact('roles'));
    }
    public function create()
    {
        $permissions = Permission::get();
        return view('admin.role.create', compact('permissions'));
    }
    public function store(Request $request)
    {
        try {
            $role = Role::create($request->all());
            $role->permissions()->sync($request->get('permissions'));
            return redirect()->route('roles.index')->with('success', 'Nuevo rol creado con éxito');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al crear el rol');
        }
    }
    public function show(Role $role)
    {
        return view('admin.role.show', compact('role'));
    }
    public function edit(Role $role)
    {
        $permissions = Permission::get();
        return view('admin.role.edit', compact('role', 'permissions'));
    }
    public function update(Request $request, Role $role)
    {
        try {
            $role->update($request->all());
            $role->permissions()->sync($request->get('permissions'));
            return redirect()->route('roles.index')->with('success', 'Rol modificado con éxito');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al modificar el rol');
        }
    }
    public function destroy(Role $role)
    {
        try {
            $role->delete();
            return redirect()->route('role.index')->with('success', 'Rol eliminado');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al eliminar el rol');
        }
    }
}
