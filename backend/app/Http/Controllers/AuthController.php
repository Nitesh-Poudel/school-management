<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Register a new user.
     */
    public function signup(Request $req)
    {
        try {
            $validatedData = $req->validate([
                'name' => 'required|string|max:255',
                'dob' => 'required|date',
                'address' => 'nullable|string|max:255',
                'role' => 'required|in:user,admin,super_admin',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
            ]);

            // Create the user
            $user = User::create([
                'name' => $validatedData['name'],
                // 'dob' => $validatedData['dob'],
                // 'address' => $validatedData['address'] ?? null,
                'role' => $validatedData['role'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']), // Hash password
            ]);

            // Create API token
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'User registered successfully',
                'user' => $user,
                'token' => $token
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }
    }

 //logins
    public function login(Request $req)
    {
        try {
            $req->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $user = User::where('email', $req->email)->first();

            if (!$user || !Hash::check($req->password, $user->password)) {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }

            // Generate new token
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
                'token' => $token
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * User logout.
     */
    public function logout(Request $req)
    {
        $req->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
