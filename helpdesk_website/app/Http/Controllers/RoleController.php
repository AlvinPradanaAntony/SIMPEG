<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function index() {
        return Inertia::render('Admin/Role/Index', [
            'roles' => Role::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|string',
        ]);

        Role::create([
            'role' => $request->input('role'),
        ]);
        return redirect()->route('admin.role')->with('success', 'Role created successfully.');
    }

    public function edit($id)
    {
        return Inertia::render('Admin/Role/Index', [
            'role' => Role::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => ['required', 'string'],
        ]);

        Role::where('id', $id)
        ->update(['role' => $request->role]);

        return redirect()->route('admin.role')->with('success', 'Role updated successfully.');
    }

    public function destroy($id) {
        $role = Role::find($id);
        $role->delete();
        return Redirect::back()->with('success', 'Role deleted successfully');
    }
    
    public function restore(Role $role) {
        $role->restore();
        return Redirect::back()->with('success', 'Role restored succesfully.');
    }
}
