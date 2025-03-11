<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class TeacherController extends Controller
{
    public function getTeacher(Request $req) {
        \Log::info('Received Headers:', $req->headers->all());

        // Get School ID from headers
        $schoolId = $req->header('School-ID');

        // Fetch teachers along with their roles and school
        $teachers = User::with(['roles', 'school']) // Load roles and school
            ->whereHas('roles', function ($query) {
                $query->where('role', 'teacher'); // Ensure role is "teacher"
            })
            ->where('school_id', $schoolId)
            ->get();

        return response()->json([
            'school' => $schoolId,
            'teachers' => $teachers
        ]);
    }
}
