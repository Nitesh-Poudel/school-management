<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    public function index(){
        $schools=School::get();
        return response()->json($schools);
    }

    public function addSchool(Request $req){
        {
            // Validate the incoming request data
            $validatedData = $req->validate([
                'name' => 'required|string|max:255',
                'address' => 'nullable|string',
                'phone' => 'nullable|string|max:20',
                'email' => 'nullable|email|unique:schools,email',
            ]);
    
            // Create a new school record
            $school = School::create($validatedData);
    
            return response()->json([
                'status' => 'success',
                'message' => 'School added successfully!',
                'school' => $school
            ], 201);
        }
    }
}
