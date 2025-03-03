<?php

namespace App\Http\Controllers\user\administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function createUser(Request $req)
    {
        Log::info('Received request to create user', ['request' => $req->all()]);
      
        
     
        try {
            Log::info('Going to validate');
    
            $validatedData = $req->validate([
                'firstName' => 'required|string|max:255',
                'lastName' => 'nullable|string|max:255',
                'email' => 'nullable|email|unique:users,email',
                'address' => 'nullable|string',
                'role' => 'nullable|in:teacher,admin,student',
                'schoolId' => 'required'
            ]);
    
            Log::info('Validation successful', ['validatedData' => $validatedData]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed', ['errors' => $e->errors()]);
    
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }
        Log::info('Before User Creation', [
            'school_id' => $validatedData['schoolId'],
            'school_id_type' => gettype($validatedData['schoolId'])
        ]);
    
        Log::info('Validation successful', ['validatedData' => $validatedData]);
    
        $role = $validatedData['role'] ?? 'user';
        $hashedPassword =Hash::make($validatedData['role'].'@123');
 

    
        DB::beginTransaction();
        Log::info('Database transaction started');
        Log::info('Before User Creation', [
            'school_id' => $validatedData['schoolId'],
            'school_id_type' => gettype($validatedData['schoolId'])
        ]);
        
    
        try {
            // Create user
            $user = User::create([
                'name' => $validatedData['firstName'].$validatedData['lastName'],
                'email' => $validatedData['email'] ?? null,
                // 'contact_number' => $validatedData['contactNumber'] ?? null,
                't_address' => $validatedData['address'] ?? null,
                'p_address'=> $validatedData['address'] ?? null,
                'password' => $hashedPassword,
                'school_id' => $validatedData['schoolId'],
            ]);
    
            Log::info('User created successfully', ['user_id' => $user->id]);
    
            // Assign role
            Role::create([
                'user_id' => $user->id,
                'role' => $role,
                'school_id' => $validatedData['schoolId'],
            ]);
    
            Log::info('Role assigned', ['user_id' => $user->id, 'role' => $role]);
    
           
    
            Log::info('User associated with school', ['user_id' => $user->id, 'school_id' => $validatedData['schoolId']]);
    
            DB::commit();
            Log::info('Database transaction committed successfully');
    
            return response()->json([
                'message' => 'User created successfully',
                'user' => $user
            ], 201);
    
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('User creation failed', ['error' => $e->getMessage()]);
    
            return response()->json([
                'message' => 'User creation failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
