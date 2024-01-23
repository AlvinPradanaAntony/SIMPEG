<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role_id' => 'required'
        ]);
        $checkUser = User::where('nip', $request->nip)->orWhere('email', $request->email)->first();

        if ($checkUser) {
            return response()->json([
                'error' => true,
                'message' => 'Akun ini sudah terdaftar'
            ]);
        }
        $user = User::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id
        ]);
        return response()->json([
            'error' => false,
            'message' => 'User Berhasil Dibuat',
            'user' => $user
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('nip', $request->nip)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => true,
                'message' => !$user ? 'NIP tidak ditemukan' : 'Password salah',
            ]);
        }

        $token = $user->createToken('auth-token')->plainTextToken;
        return response()->json([
            'error' => false,
            'message' => 'Login berhasil',
            'access_token' => $token,
            'user' => $user,
        ]);
    }
    
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'error' => false,
            'message' => 'Logout berhasil'
        ]);
    }

    public function tokenLogin(Request $request)
    {
        $user = Auth::user();
        // $ticket = Ticket::where('user_id', $user->id);
        return response()->json($user);
    }
}
