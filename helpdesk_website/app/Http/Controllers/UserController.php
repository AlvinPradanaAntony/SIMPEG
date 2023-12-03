<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index(){
        $users = User::with(['departments', 'positions', 'levels'])->get();
        return UserResource::collection($users);
    }

    // public function create(Request $request)
    // {
    //     $request->validate([
    //         'question' => 'required|string',
    //         'answer' => 'required|string',
    //     ]);

    //     $faq = Faq::create([
    //         'question' => $request->input('question'),
    //         'answer' => $request->input('answer'),
    //     ]);

    //     return response()->json(['message' => 'FAQ created successfully', 'faq' => $faq], 201);
    // }
}
