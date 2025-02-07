<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Super Admins (2)
        User::insert([
            [
                'name' => 'Rajesh Sharma',
                'email' => 'superadmin1@example.com',
                'password' => Hash::make('SuperAdmin123'),
                'dob' => '1980-07-15',
                't_address' => 'New Baneshwor, Kathmandu',
                'p_address' => 'Dharan, Sunsari',
                'role' => 'super-admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Amit Khadka',
                'email' => 'superadmin2@example.com',
                'password' => Hash::make('SuperAdmin@123'),
                'dob' => '1982-05-10',
                't_address' => 'Pulchowk, Lalitpur',
                'p_address' => 'Butwal, Rupandehi',
                'role' => 'super-admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Admins (5)
        $admins = [
            ['name' => 'Sita Adhikari', 'email' => 'admin1@example.com', 'dob' => '1990-06-15', 't_address' => 'Patan, Lalitpur', 'p_address' => 'Pokhara, Kaski'],
            ['name' => 'Prakash Thapa', 'email' => 'admin2@example.com', 'dob' => '1992-09-10', 't_address' => 'Kirtipur, Kathmandu', 'p_address' => 'Gorkha'],
            ['name' => 'Mina Koirala', 'email' => 'admin3@example.com', 'dob' => '1988-04-22', 't_address' => 'Banepa, Kavre', 'p_address' => 'Damauli, Tanahun'],
            ['name' => 'Kishor Basnet', 'email' => 'admin4@example.com', 'dob' => '1991-11-05', 't_address' => 'Bhaktapur', 'p_address' => 'Chitwan'],
            ['name' => 'Rita Magar', 'email' => 'admin5@example.com', 'dob' => '1993-02-18', 't_address' => 'Dhapasi, Kathmandu', 'p_address' => 'Ilam'],
        ];

        foreach ($admins as $admin) {
            User::create([
                'name' => $admin['name'],
                'email' => $admin['email'],
                'password' => Hash::make('Admin@123'),
                'dob' => $admin['dob'],
                't_address' => $admin['t_address'],
                'p_address' => $admin['p_address'],
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Regular Users (10)
        $users = [
            ['name' => 'Sunil Bhandari', 'email' => 'user1@example.com', 'dob' => '2000-08-20', 't_address' => 'Jawalakhel, Lalitpur', 'p_address' => 'Lamjung'],
            ['name' => 'Kiran Tamang', 'email' => 'user2@example.com', 'dob' => '2001-03-12', 't_address' => 'Gongabu, Kathmandu', 'p_address' => 'Dolakha'],
            ['name' => 'Sneha Gurung', 'email' => 'user3@example.com', 'dob' => '2002-06-30', 't_address' => 'Kalanki, Kathmandu', 'p_address' => 'Syangja'],
            ['name' => 'Ram Bahadur Karki', 'email' => 'user4@example.com', 'dob' => '1999-12-10', 't_address' => 'Koteshwor, Kathmandu', 'p_address' => 'Udayapur'],
            ['name' => 'Pooja Shrestha', 'email' => 'user5@example.com', 'dob' => '2003-07-25', 't_address' => 'Lagankhel, Lalitpur', 'p_address' => 'Ramechhap'],
            ['name' => 'Manish Rai', 'email' => 'user6@example.com', 'dob' => '2001-01-05', 't_address' => 'Imadol, Lalitpur', 'p_address' => 'Jhapa'],
            ['name' => 'Sujata Lama', 'email' => 'user7@example.com', 'dob' => '2004-05-20', 't_address' => 'Chabahil, Kathmandu', 'p_address' => 'Nuwakot'],
            ['name' => 'Binod Gautam', 'email' => 'user8@example.com', 'dob' => '2000-11-15', 't_address' => 'Jorpati, Kathmandu', 'p_address' => 'Dhading'],
            ['name' => 'Alisha KC', 'email' => 'user9@example.com', 'dob' => '2002-09-07', 't_address' => 'Satdobato, Lalitpur', 'p_address' => 'Gulmi'],
            ['name' => 'Bikash Pandey', 'email' => 'user10@example.com', 'dob' => '1998-10-10', 't_address' => 'Balaju, Kathmandu', 'p_address' => 'Palpa'],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('User@123'),
                'dob' => $user['dob'],
                't_address' => $user['t_address'],
                'p_address' => $user['p_address'],
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
