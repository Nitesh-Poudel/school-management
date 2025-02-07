<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
}
