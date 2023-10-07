<?php

namespace App\Http\Controllers;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all(); // Mengambil semua data FAQ

        return view('faq.index', compact('faqs'));
    }

    public function getAllFAQs()
    {
        $faqs = Faq::all(); // Mengambil semua data FAQ

        return response()->json(['faqs' => $faqs]);
    }
}
