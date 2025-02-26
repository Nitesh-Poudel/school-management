<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
