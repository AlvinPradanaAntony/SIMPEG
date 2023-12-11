<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class FaqController extends Controller
{
    public function index() {
        return Inertia::render('Admin/Faq/Index', [
            'faqs' => Faq::all(),
        ]);
    }

    public function create() {
        return Inertia::render('Admin/Faq/Create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string'
        ]);

        Faq::create([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
        ]);
        return redirect()->route('admin.faq')->with('success', 'Faq created successfully.');
    }

    public function edit($id)
    {
        return Inertia::render('Admin/Faq/Edit', [
            'faq' => Faq::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string'
        ]);

        Faq::where('id', $id)->update([
            'question' => $request->question,
            'answer' => $request->answer
        ]);
        return redirect()->route('admin.faq')->with('success', 'Faq updated successfully.');
    }

    public function destroy($id) {
        $faq = Faq::find($id);
        $faq->delete();
        return Redirect::back()->with('success', 'Faq deleted successfully');
    }
    
    public function restore(Faq $faq) {
        $faq->restore();
        return Redirect::back()->with('success', 'Faq restored succesfully.');
    }
}
