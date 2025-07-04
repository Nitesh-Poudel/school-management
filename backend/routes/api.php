<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\teacher\teacherController;
use App\Http\Controllers\Admin\ClassSectionController;

use App\Http\Controllers\StudentController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/signin', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);

Route::prefix('admin')->middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'index']); // Get all users
    Route::get('/users/{id}', [UserController::class, 'show']); // Get user by ID
    Route::get('/create/school',[UserController::class,'createSchoolProfile']);
   

     // School Management
     Route::get('/schools', [SchoolController::class, 'index']); // Get all schools
     Route::post('/schools/add', [SchoolController::class, 'addSchool']); // Add a school
});

Route::prefix('administrator')->middleware('auth:sanctum')->group(function(){
    Route::post('/create/users', [UserController::class, 'createUser']); 
    Route::get('/users', [UserController::class, 'getSchoolUsers']);
    Route::get('/schools',[SchoolController::class,'index']);

    Route::post('/class', [ClassSectionController::class, 'createClass']);
    Route::get('/class', [ClassSectionController::class, 'getClassData']);
    Route::delete('/class/{schoolId}', [ClassSectionController::class, 'deleteClassData']);
    
    Route::post('/admin/section', [ClassSectionController::class, 'createSection']);

    Route::post('/student',[StudentController::class,'create'] );
    
});

// student controller
Route::get('class/{classId}/students',[StudentController::class,'getStudentsByClass']);

Route::prefix('teachers')->middleware('auth:sanctum')->group(function(){
    Route::get('/', [teacherController::class, 'getTeacher']); 
    
});


Route::get('user/{userId}/role', [UserController::class, 'userRoles'])->middleware('auth:sanctum');


