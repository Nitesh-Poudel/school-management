<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function createUser(Request $req){
        $validatedData = $req->validate([
            'firstName' => 'nullable|string|max:255',
            'lastName' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email',
            'contactNumber' => 'nullable|string|min:10|max:15',
            'address' => 'nullable|string|max:255',
            'role' => 'nullable|string|in:user,admin,super_admin',
            'schoolId'=> 'required|exists:schools,id', 
        ]);
    
        // Extract role separately
        $role = $validatedData['role'] ?? 'user'; // Default to 'user' if null
        $hashedPassword = Hash::make($role . '@123');
    
        DB::beginTransaction(); // Start transaction
    
        try {
            // Create user
            $user = User::create([
                'first_name' => $validatedData['firstName'] ?? null,
                'last_name' => $validatedData['lastName'] ?? null,
                'email' => $validatedData['email'] ?? null,
                'contact_number' => $validatedData['contactNumber'] ?? null,
                'address' => $validatedData['address'] ?? null,
                'password' => $hashedPassword,
            ]);
    
            // Store role separately in roles table
            if (!is_null($role)) {
                Role::create([
                    'user_id' => $user->id,
                    'role' => $role
                ]);
            }
    
            DB::commit(); // Commit transaction
    
            return response()->json([
                'message' => 'User created successfully',
                'user' => $user
            ], 201);
    
        } catch (\Exception $e) {
            DB::rollback(); // Rollback transaction on failure
    
            return response()->json([
                'message' => 'User creation failed',
                'error' => $e->getMessage()
            ], 500);
        }

    }


    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::with(['roles.school'])->get();
        return response()->json($users);
    }

    //  Create school
    public function createSchoolProfile(Request $req){
        return response()->json($req);
    }

    /**
     * Show the specific user.
     */
    public function show($id)
    {
        $user = User::with(['roles.school'])->find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }


    public function userRoles($userId) {
        $user = User::with(['roles', 'school'])->find($userId);
    
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
    
        return response()->json([
            'school_id' => $user->school ? $user->school->id : null,    
            'school_name' => $user->school ? $user->school->name : null,  // Get school name or null if no school
            'roles' => $user->roles->pluck('role') // Extract only role names
        ]);
    }
    
}
