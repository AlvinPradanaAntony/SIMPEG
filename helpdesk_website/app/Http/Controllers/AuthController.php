<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){
        $user = User::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
        ]);
        return response()->json([
            'message' => 'User Berhasil Dibuat',
            'user' => $user
        ], 201);
    }

    public function login(Request $request){
        $request->validate([
            'nip' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('nip', $request->nip)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'NIP atau Password Salah',
                'error' => 'Unauthorized',
            ], 401);
        }

        $token = $user->generateToken();

        return response()->json([
            'message' => 'Login berhasil',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => null, // Sesuaikan sesuai kebutuhan Anda
            'user' => $user
        ]);
    }
}
