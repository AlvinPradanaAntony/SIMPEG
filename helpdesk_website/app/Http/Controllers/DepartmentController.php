<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class DepartmentController extends Controller
{
    public function index() {
        return Inertia::render('Admin/Department/Index', [
            'departments' => Department::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'department' => 'required|string',
        ]);

        Department::create([
            'department' => $request->input('department'),
        ]);
        return redirect()->route('admin.department')->with('success', 'Department created successfully.');
    }

    public function edit($id)
    {
        return Inertia::render('Admin/Department/Index', [
            'department' => Department::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'department' => ['required', 'string'],
        ]);

        Department::where('id', $id)
        ->update(['department' => $request->department]);

        return redirect()->route('admin.department')->with('success', 'Department updated successfully.');
    }

    public function destroy($id) {
        $department = Department::find($id);
        $department->delete();
        return Redirect::back()->with('success', 'Department deleted successfully');
    }
    
    public function restore(Department $department) {
        $department->restore();
        return Redirect::back()->with('success', 'Department restored succesfully.');
    }
}
