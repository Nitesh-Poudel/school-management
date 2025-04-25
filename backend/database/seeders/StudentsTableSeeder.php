<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\Classroom;
use App\Models\User;
use App\Models\Student;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        $students = User::whereHas('roles', function ($query) {
            $query->where('role', 'student');
        })
        ->where('school_id', 1)
        ->select('id', 'name', 'school_id')
        ->get();


        $classIds = Classroom::where('school_id', 1)->pluck('id')->toArray();



    // Insert into the students table
    foreach ($students as $user) {
        Student::create([
            'user_id' => $user->id,
              'class_id' => $faker->randomElement($classIds),  // randomly assign class_id (assuming 1–12 exist)
            'roll_number' => $faker->unique()->numberBetween(1, 100),
            'dob' => $faker->date('Y-m-d', '2015-01-01'), // birth date before 2015
            'gender' => $faker->randomElement(['male', 'female']),
            'guardian_name' => $faker->name,
            'emergency_contact' => $faker->phoneNumber,
        ]);
    }
    }
}
