<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserController extends Controller
{
    public function indexEmployee() {
        return Inertia::render('Admin/Employee/Index', [
            'users' => User::with('departments', 'positions', 'roles')->where('role_id', 1)->get(),
        ]);
    }

    public function indexAdmin() {
        return Inertia::render('Admin/Admin/Index', [
            'users' => User::with('departments', 'positions', 'roles')->where('role_id', 2)->get(),
        ]);
    }

    public function createEmployee() {
        return Inertia::render('Admin/Employee/Create', [
            'departments' => Department::all(),
            'positions' => Position::all(),
        ]);
    }

    public function createAdmin() {
        return Inertia::render('Admin/Admin/Create', [
            'departments' => Department::all(),
            'positions' => Position::all(),
        ]);
    }
    public function storeEmployee(Request $request)
    {
        $request->validate([
            'nip' => 'required|string',
            'name' => 'required|string',
            'gender' => 'required|string',
            'birth_place' => 'required|string',
            'birth_date' => 'required|date',
            'religion' => 'required|string',
            'marital_status' => 'required|string',
            'department_id' => 'required|integer',
            'position_id' => 'required|integer',
            'role_id' => 'required|integer',
            'phone' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'nip' => $request->input('nip'),
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'birth_place' => $request->input('birth_place'),
            'birth_date' => $request->input('birth_date'),
            'religion' => $request->input('religion'),
            'marital_status' => $request->input('marital_status'),
            'department_id' => $request->input('department_id'),
            'position_id' => $request->input('position_id'),
            'role_id' => $request->input('role_id'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect()->route('admin.pegawai')->with('success', 'User created successfully.');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'nip' => 'required|string',
            'name' => 'required|string',
            'gender' => 'required|string',
            'birth_place' => 'required|string',
            'birth_date' => 'required|date',
            'religion' => 'required|string',
            'marital_status' => 'required|string',
            'department_id' => 'required|integer',
            'position_id' => 'required|integer',
            'role_id' => 'required|integer',
            'phone' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'nip' => $request->input('nip'),
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'birth_place' => $request->input('birth_place'),
            'birth_date' => $request->input('birth_date'),
            'religion' => $request->input('religion'),
            'marital_status' => $request->input('marital_status'),
            'department_id' => $request->input('department_id'),
            'position_id' => $request->input('position_id'),
            'role_id' => $request->input('role_id'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect()->route('admin.petugas')->with('success', 'User created successfully.');
    }
    public function editEmployee($id)
    {
        return Inertia::render('Admin/Employee/Edit', [
            'user' => User::find($id),
            'departments' => Department::all(),
            'positions' => Position::all(),
        ]);
    }

    public function editAdmin($id)
    {
        return Inertia::render('Admin/Admin/Edit', [
            'user' => User::find($id),
            'departments' => Department::all(),
            'positions' => Position::all(),
        ]);
    }
    public function updateEmployee(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required|string',
            'name' => 'required|string',
            'gender' => 'required|string',
            'birth_place' => 'required|string',
            'birth_date' => 'required|date',
            'religion' => 'required|string',
            'marital_status' => 'required|string',
            'department_id' => 'required|integer',
            'position_id' => 'required|integer',
            'role_id' => 'required|integer',
            'phone' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::where('id', $id)->update([
            'nip' => $request->input('nip'),
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'birth_place' => $request->input('birth_place'),
            'birth_date' => $request->input('birth_date'),
            'religion' => $request->input('religion'),
            'marital_status' => $request->input('marital_status'),
            'department_id' => $request->input('department_id'),
            'position_id' => $request->input('position_id'),
            'role_id' => $request->input('role_id'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect()->route('admin.pegawai')->with('success', 'User updated successfully.');
    }

    public function updateAdmin(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required|string',
            'name' => 'required|string',
            'gender' => 'required|string',
            'birth_place' => 'required|string',
            'birth_date' => 'required|date',
            'religion' => 'required|string',
            'marital_status' => 'required|string',
            'department_id' => 'required|integer',
            'position_id' => 'required|integer',
            'role_id' => 'required|integer',
            'phone' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::where('id', $id)->update([
            'nip' => $request->input('nip'),
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'birth_place' => $request->input('birth_place'),
            'birth_date' => $request->input('birth_date'),
            'religion' => $request->input('religion'),
            'marital_status' => $request->input('marital_status'),
            'department_id' => $request->input('department_id'),
            'position_id' => $request->input('position_id'),
            'role_id' => $request->input('role_id'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect()->route('admin.petugas')->with('success', 'User updated successfully.');
    }

    public function destroyEmployee($id) {
        $user = User::find($id);
        $user->delete();
        return Redirect::back()->with('success', 'User deleted successfully');
    }

    public function destroyAdmin($id) {
        $user = User::find($id);
        $user->delete();
        return Redirect::back()->with('success', 'User deleted successfully');
    }
    
    public function restoreEmployee(User $user) {
        $user->restore();
        return Redirect::back()->with('success', 'User restored succesfully.');
    }
    public function restoreAdmin(User $user) {
        $user->restore();
        return Redirect::back()->with('success', 'User restored succesfully.');
    }
}
