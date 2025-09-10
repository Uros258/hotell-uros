<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naziv_role' => 'required|string|unique:roles',
        ]);

        Role::create($validated);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.show', compact('role'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $validated = $request->validate([
            'naziv_role' => 'required|string|unique:roles,naziv_role,' . $role->id,
        ]);

        $role->update($validated);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
