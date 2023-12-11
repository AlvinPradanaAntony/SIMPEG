<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ReviewController extends Controller
{
    public function index() {
        return Inertia::render('Admin/Review/Index', [
            'reviews' => Review::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer',
            'review' => 'required|string'
        ]);

        Review::create([
            'rating' => $request->input('rating'),
            'review' => $request->input('review'),
        ]);
        return redirect()->route('admin.review')->with('success', 'Review created successfully.');
    }

    public function edit($id)
    {
        return Inertia::render('Admin/Review/Index', [
            'review' => Review::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer',
            'review' => 'required|string'
        ]);

        Review::where('id', $id)->update([
            'rating' => $request->rating,
            'review' => $request->review
        ]);
        return redirect()->route('admin.review')->with('success', 'Review updated successfully.');
    }

    public function destroy($id) {
        $review = Review::find($id);
        $review->delete();
        return Redirect::back()->with('success', 'Review deleted successfully');
    }
    
    public function restore(Review $review) {
        $review->restore();
        return Redirect::back()->with('success', 'Review restored succesfully.');
    }
}
