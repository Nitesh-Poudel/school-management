<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Role;
use App\Models\Classroom;
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
    
    // public function getStudents(){
           
    //     $users = User::whereHas('roles', function ($query) {
    //         $query->where('role', 'student');
    //     })
    //     ->where('school_id',1)
    //     ->select('id','name')
    //     // ->with('roles')
    //     ->get();
    //     return $users;
    // }
    // public function getStudents(){
           
    //     $classes = Classroom::where('school_id',1)
    //     ->select('id','class_name')
    //     // ->with('roles')
    //     ->get();
    //     return $users;
    // }

    public function getStudents(Request $req){
        $school_id=$req->header('School_ID');
        $school_id=1;
        $classData=Classroom::where('school_id',$school_id)->with('teacher')->get();


        
        return response()->json([
         'data'=>$classData,
         'message'=>'class data of school'
        ]);

        Log::info("class data: " .$classData);
        Log::info("class data of school: " .$school_id);


    }

    public function getStudentsByClass($classId) {
        $studentsOfClass = User::with(['student']) // eager load student
            ->whereHas('student', function($query) use ($classId) {
                $query->where('class_id', $classId);
            })
            ->get();

            $classroom = Classroom::with(['teacher:id,name'])->find($classId);


            // $classTeacher = $classroom && $classroom->teacher
            //     ? [
            //         'id' => $classroom->teacher->id,
            //         'name' => $classroom->teacher->name,
            //     ]
            //     : null;
    
            return response()->json([
                'data'=>$studentsOfClass,
                'count'=>$studentsOfClass->count(),
                'class'=>$classroom,
                'message'=>'class data of school'
               ]);
    }
   
}
