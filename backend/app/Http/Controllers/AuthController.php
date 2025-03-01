<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    \Log::info('Login Attempt:', $req->all()); // Log the received data

    try {
        // Validate input
        $credentials = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    } catch (ValidationException $e) {
        return response()->json([
            'message' => 'Validation failed',
            'errors' => $e->errors()
        ], 422);
    }

    if (!Auth::attempt($credentials)) {
        \Log::info('Login Attempt:', $req->all()); // Log the attempt
        return response()->json([
            'message' => 'Invalid email or password'
        ], 401);
    }
    
    $user = Auth::user();
    $token = $user->createToken('auth_token')->plainTextToken;
    \Log::info('Validated:', ['user' => $user->toArray()]); // Convert to array before logging
    
    if ($user) {
        $user = User::with('roles','school')->find($user->id);
        // $user->load('roles'); // Ensure roles are loaded

    // dd($user->toArray()); 
        \Log::info('login user', ['user' => $user->toArray()]); // Fix logging issue
    
        return response()->json([
            'message' => 'Login successful',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'roles' => $user->roles, // Ensure roles are explicitly included
            ],
            'token' => $token
        ], 200);
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
