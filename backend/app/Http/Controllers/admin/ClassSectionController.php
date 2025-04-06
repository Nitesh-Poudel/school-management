<?php
namespace App\Http\Controllers\admin;
use App\Models\Classroom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Import Log facade

class ClassSectionController extends Controller
{
    public function createClass(Request $request)
    {
        // Extract actual request data
        $classData = $request->input('classData'); // Get request body data
        $school_id= $request->header('School_ID');


        

        $savedClasses = [];
        foreach($classData as $class){
            Log::info("Processing class: " . $class['name'], [
                'class_data' => $class
            ]);
            foreach ($class['selectedSections'] as $section) {
                // Check if the class has a teacher assigned for this section
                $teacherId = isset($class['classTeachers'][$section]) ? $class['classTeachers'][$section] : null;

                // Create a new class record
                Classroom::create([
                    'school_id' => $school_id, // School ID
                    'class_name' => $class['name'], // Class name (e.g. Playgroup)
                    'section' => $section, // Section (e.g. A, B)
                    'class_teacher_id' => $teacherId, // Teacher ID for the section
                ]);
            }

        }
       



        return response()->json([
            'class' => $classData, // Return actual class data
            'school_id' => $request->header('School-ID'), // Retrieve the School-ID header
            'message' => 'Class created successfully!',
        ], 200);
    }

    public function createSection()
    {
        // You can implement this method later
    }
}
