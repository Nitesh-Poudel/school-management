<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\User;  
use App\Models\School;

class AssignRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

        public function run(): void
        {
            // Fetch all users who have the 'user' role
            $users = User::where('role', 'user')->get();
    
            // Fetch all schools
            $schools = School::all();
    
            // Loop through all users and assign the 'administrator' role
            foreach ($users as $index => $user) {
                // Use a random school for each user
                $school = $schools->random();
    
                // Assign the 'administrator' role and associate with the random school
                Role::create([
                    'user_id' => $user->id,
                    'school_id' => $school->id,  // Assign random school
                    'role' => 'administrator',  // Role is administrator
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    
    
}
