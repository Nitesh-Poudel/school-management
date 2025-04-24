<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Validation\ValidationException;


class StudentController extends Controller
{
    //
 
    public function create(Request $req)
    {
        $req->merge(['class_id' => $req->input('class')]);
        try {
            $validated = $req->validate([
                'class_id' => 'required|exists:classes,id', 
                'rollNumber' => 'required|numeric',
                'dob' => 'required|date',
                'gender' => 'required|in:male,female,other',
                'guardianName' => 'required|string|max:255',
                'emergencyContact' => 'required|string|max:20',
                'user_id' => 'required|exists:users,id',
            ]);
            
            $student = Student::create([
                'user_id' => $validated['user_id'],
                'class_id' => $validated['class_id'], // Store the class_id instead of class
                'roll_number' => $validated['rollNumber'],
                'dob' => $validated['dob'],
                'gender' => $validated['gender'],
                'guardian_name' => $validated['guardianName'],
                'emergency_contact' => $validated['emergencyContact'],
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Student created and saved successfully',
                'data' => $validated
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }
    }
    
    
}
