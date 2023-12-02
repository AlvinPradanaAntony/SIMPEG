<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function create(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'department_id' => 'required|string',
        ]);

        $category = Category::create([
            'category' => $request->input('category'),
            'department_id' => $request->input('department_id'),
        ]);

        return response()->json(['message' => 'Category created successfully', 'category' => $category], 201);
    }
}
