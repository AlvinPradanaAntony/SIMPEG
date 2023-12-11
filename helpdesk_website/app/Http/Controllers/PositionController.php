<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
class PositionController extends Controller
{
    public function index() {
        return Inertia::render('Admin/Position/Index', [
            'positions' => Position::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'position' => 'required|string',
        ]);

        Position::create([
            'position' => $request->input('position'),
        ]);
        return redirect()->route('admin.position')->with('success', 'Position created successfully.');
    }

    public function edit($id)
    {
        return Inertia::render('Admin/Position/Index', [
            'position' => Position::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'position' => ['required', 'string'],
        ]);

        Position::where('id', $id)
        ->update(['position' => $request->position]);

        return redirect()->route('admin.position')->with('success', 'Position updated successfully.');
    }

    public function destroy($id) {
        $position = Position::find($id);
        $position->delete();
        return Redirect::back()->with('success', 'Position deleted successfully');
    }
    
    public function restore(Position $position) {
        $position->restore();
        return Redirect::back()->with('success', 'Position restored succesfully.');
    }
}