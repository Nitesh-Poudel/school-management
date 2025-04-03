<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassSectionController extends Controller
{
    
    public function createClass(Request $request)
    {
        // Extract actual request data
        $classData = $request->all(); // Get request body data

        return response()->json([
            'class' => $classData, // Return actual class data
            'school_id' => $request->header('School-ID'), // Retrieve the School-ID header
            'message' => 'Class created successfully!',
        ], 200);
    }

    public function createSection(){

    }
}
