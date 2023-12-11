<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class StatusController extends Controller
{
    public function index() {
        return Inertia::render('Admin/Status/Index', [
            'statuses' => Status::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        Status::create([
            'status' => $request->input('status'),
        ]);
        return redirect()->route('admin.status')->with('success', 'Status created successfully.');
    }

    public function edit($id)
    {
        return Inertia::render('Admin/Status/Index', [
            'status' => Status::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => ['required', 'string'],
        ]);

        Status::where('id', $id)
        ->update(['status' => $request->status]);

        return redirect()->route('admin.status')->with('success', 'Status updated successfully.');
    }

    public function destroy($id) {
        $status = Status::find($id);
        $status->delete();
        return Redirect::back()->with('success', 'Status deleted successfully');
    }
    
    public function restore(Status $status) {
        $status->restore();
        return Redirect::back()->with('success', 'Status restored succesfully.');
    }
}
