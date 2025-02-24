<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    public function index(){
        $schools=School::get();
        return response()->json([
            'status' => 'success',
            'data' => $schools
        ], 200);
    }

    public function addSchool(Request $req)
    {
        // Validate school details
        $validatedSchoolData = $req->validate([
            'school.name' => 'required|string|max:255',
            'school.address' => 'nullable|string',
            'school.phone' => 'nullable|string|max:20',
            'school.email' => 'nullable|email|unique:schools,email',
            'school.established' => 'nullable|integer|min:1900|max:' . date('Y'),
        ]);
    
        // Validate administrator details
        $validatedUserData = $req->validate([
            'administrator.principal' => 'required|string|max:255',
            'administrator.admin_email' => 'required|email|unique:users,email',
        ]);
    
        // Create a new school record
        $school = School::create($validatedSchoolData['school']);
    
        // Save administrator details (assuming you have an Administrator model)
        $administrator = Administrator::create([
            'school_id' => $school->id,
            'principal' => $validatedAdminData['administrator']['principal'],
            'admin_email' => $validatedAdminData['administrator']['admin_email'],
        ]);
    
        return response()->json([
            'status' => 'success',
            'message' => 'School added successfully!',
            'school' => $school,
            'administrator' => $administrator
        ], 201);
    }
    

    public function school(){
        $school=School::get();

    }
}
