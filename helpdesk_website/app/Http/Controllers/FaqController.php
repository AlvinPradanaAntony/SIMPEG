<?php

namespace App\Http\Controllers;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Resources\FaqResource;

class FaqController extends Controller
{
    public function index(){
        $faqs = Faq::all();
        return FaqResource::collection($faqs);
    }

    public function create(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $faq = Faq::create([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
        ]);

        return response()->json(['message' => 'FAQ created successfully', 'faq' => $faq], 201);
    }
}
