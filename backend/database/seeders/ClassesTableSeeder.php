<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 
use App\Models\Classroom;


class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $schoolId = 1; 
        $classes = [
            ['class_name' => 'Nursery', 'sections' => ['A', 'B']],
            ['class_name' => 'LKG', 'sections' => ['A']],
            ['class_name' => 'UKG', 'sections' => ['A']],
            ['class_name' => '1', 'sections' => ['A']],
            ['class_name' => '2', 'sections' => ['A']],
            ['class_name' => '3', 'sections' => ['A']],
            ['class_name' => '4', 'sections' => ['A']],
            ['class_name' => '5', 'sections' => ['A']],
        ];



        $assignedTeachers = []; // Array to keep track of assigned teacher IDs

        foreach ($classes as $class) {
            foreach ($class['sections'] as $section) {
                // Randomly assign a class teacher (ensuring the teacher is not assigned to another section)
                $classTeacherId = User::where('role', 'teacher')
                    ->where('school_id', 1)
                    ->whereNotIn('id', $assignedTeachers) // Ensure the teacher hasn't already been assigned
                    ->inRandomOrder()
                    ->first()->id ?? null;
        
                // If a teacher was found, assign them and mark as assigned
                if ($classTeacherId) {
                    $assignedTeachers[] = $classTeacherId;
                }
        
             
                    Classroom::create([
                        'school_id' => $schoolId,
                        'class_name' => $class['class_name'],
                        'section' => $section,
                        'class_teacher_id' => $classTeacherId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    
            }
        }
    }


}
