<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; // Add this line
use Illuminate\Support\Str;




class UserController extends Controller
{
    public function getSchoolUsers(Request $req)
    {
        // Validate request
        $req->validate([
            'schoolId' => 'required|exists:schools,id'
        ]);
    
        // Retrieve users belonging to the given school ID along with their roles
        $users = User::where('school_id', $req->schoolId)
        ->with('roles') // Assuming a User-Role relationship exists
        ->paginate(10);
    
        // Return response
        return response()->json([
            'success' => true,
            'users' => $users
        ]);
    }
    
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
                'role' => 'nullable|in:teacher,admin,student,parent',
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


            $user = User::where('email', $validatedData['email'])
                    ->where('school_id', $validatedData['schoolId'])
                    ->first();

            if ($user) {
                Log::info('User already exists, updating roles instead', ['user_id' => $user->id]);
    
                // Call updateRoles function to assign the role
                $this->updateRoles($user->id, $role, $validatedData['schoolId']);
    
                DB::commit();
                return response()->json([
                    'message' => 'User already exists, role updated successfully',
                    'user' => $user
                ], 200);
            }
    

            // Create user
            $user = User::create([
                'name' => $validatedData['firstName'].' '.$validatedData['lastName'],
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
    
            // Associate user with school
            // DB::table('school_user')->insert([
            //     'user_id' => $user->id,
            //     'school_id' => $validatedData['schoolId']
            // ]);
    
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



    private function updateRoles($userId, $role, $schoolId)
{
    Role::create([
        'user_id' => $userId,
        'role' => $role,
        'school_id' => $schoolId,
    ]);

    Log::info('Role updated successfully', ['user_id' => $userId, 'role' => $role]);
}
    





    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::with(['roles.school'])->paginate(10);
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
