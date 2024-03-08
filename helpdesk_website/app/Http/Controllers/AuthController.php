<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers;
use App\Http\Resources\ProfileResources;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'nip' => 'required',
            'password' => 'required|min:6'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => $validator->errors()
            ],422);
        }


        $user = User::firstWhere('nip', $request->nip);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => true,
                'message' => !$user ? 'NIP tidak ditemukan' : 'Password salah',
            ],401);
        }

        $token = $user->createToken('auth-token')->plainTextToken;
        return response()->json([
            'error' => false,
            'message' => 'Login berhasil',
            'access_token' => $token,
            'user' => UserResource::make($user),
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

    public function profile()
    {
        $currentUser = Auth::user();
        // $ticket = Ticket::where('user_id', $user->id);
        $user = User::firstWhere('id', $currentUser->id);
        
        return response()->json([
            'error' => false,
            'message' => 'Berhasil memuat informasi personal',
            // 'user' => $user->loadMissing('departments:id,department','positions:id,position')
            'user' => ProfileResources::make($user),
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nip' => 'required|string',
            'name' => 'required|string',
        ]);
        $user = User::findOrFail($id);
        $user->update(request()->all());
        return response()->json([
            'error' => false,
            'message' => 'User Berhasil Diupdate',
            // 'user' => $user->loadMissing('departments:id,department','positions:id,position')
        ]);
    }
}
