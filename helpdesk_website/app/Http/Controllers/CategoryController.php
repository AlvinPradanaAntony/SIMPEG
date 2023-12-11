<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::with('department')->get();
        return Inertia::render('Admin/Category/Index', [
            'categories' => $categories,
            'departments' => Department::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'department_id' => 'required|integer'
        ]);

        Category::create([
            'category' => $request->input('category'),
            'department_id' => $request->input('department_id'),
        ]);
        return redirect()->route('admin.category')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        return Inertia::render('Admin/Category/Index', [
            'category' => Category::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string',
            'department_id' => 'required|integer'
        ]);

        Category::where('id', $id)->update([
            'category' => $request->category,
            'department_id' => $request->department_id
        ]);
        return redirect()->route('admin.category')->with('success', 'Category updated successfully.');
    }

    public function destroy($id) {
        $category = Category::find($id);
        $category->delete();
        return Redirect::back()->with('success', 'Category deleted successfully');
    }
    
    public function restore(Category $category) {
        $category->restore();
        return Redirect::back()->with('success', 'Category restored succesfully.');
    }
}
