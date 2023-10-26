<?php

namespace App\Http\Controllers;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all(); // Mengambil semua data FAQ

        return response()->json($faqs, 200); // Mengirim data FAQ dalam bentuk JSON
    }
}
