<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schools = [
            [
                'name' => 'Kathmandu Valley School',
                'address' => 'Jawalakhel, Lalitpur',
                'phone' => '01-5541234',
                'email' => 'info@kvschool.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Everest International School',
                'address' => 'Baneshwor, Kathmandu',
                'phone' => '01-4786543',
                'email' => 'contact@everest.edu.np',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sagarmatha Secondary School',
                'address' => 'Bhaktapur Durbar Square, Bhaktapur',
                'phone' => '01-6612345',
                'email' => 'admin@sagarmathaschool.edu.np',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lumbini Boarding School',
                'address' => 'Butwal, Rupandehi',
                'phone' => '071-540123',
                'email' => 'info@lumbinischool.edu.np',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pokhara International Academy',
                'address' => 'Lakeside, Pokhara',
                'phone' => '061-466789',
                'email' => 'info@pokharaacademy.edu.np',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert multiple school records
        School::insert($schools);
    }
}
