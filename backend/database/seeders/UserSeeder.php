<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Super Admins (2)
        // User::insert([
        //     [
        //         'name' => 'Rajesh Sharma',
        //         'email' => 'superadmin1@example.com',
        //         'password' => Hash::make('SuperAdmin123'),
        //         'dob' => '1980-07-15',
        //         't_address' => 'New Baneshwor, Kathmandu',
        //         'p_address' => 'Dharan, Sunsari',
        //         'role' => 'super-admin',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'name' => 'Amit Khadka',
        //         'email' => 'superadmin2@example.com',
        //         'password' => Hash::make('SuperAdmin@123'),
        //         'dob' => '1982-05-10',
        //         't_address' => 'Pulchowk, Lalitpur',
        //         'p_address' => 'Butwal, Rupandehi',
        //         'role' => 'super-admin',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);

        // // Admins (5)
        // $admins = [
        //     ['name' => 'Sita Adhikari', 'email' => 'admin1@example.com', 'dob' => '1990-06-15', 't_address' => 'Patan, Lalitpur', 'p_address' => 'Pokhara, Kaski'],
        //     ['name' => 'Prakash Thapa', 'email' => 'admin2@example.com', 'dob' => '1992-09-10', 't_address' => 'Kirtipur, Kathmandu', 'p_address' => 'Gorkha'],
        //     ['name' => 'Mina Koirala', 'email' => 'admin3@example.com', 'dob' => '1988-04-22', 't_address' => 'Banepa, Kavre', 'p_address' => 'Damauli, Tanahun'],
        //     ['name' => 'Kishor Basnet', 'email' => 'admin4@example.com', 'dob' => '1991-11-05', 't_address' => 'Bhaktapur', 'p_address' => 'Chitwan'],
        //     ['name' => 'Rita Magar', 'email' => 'admin5@example.com', 'dob' => '1993-02-18', 't_address' => 'Dhapasi, Kathmandu', 'p_address' => 'Ilam'],
        // ];

        // foreach ($admins as $admin) {
        //     User::create([
        //         'name' => $admin['name'],
        //         'email' => $admin['email'],
        //         'password' => Hash::make('Admin@123'),
        //         'dob' => $admin['dob'],
        //         't_address' => $admin['t_address'],
        //         'p_address' => $admin['p_address'],
        //         'role' => 'admin',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        // Regular Users (10)
        $users = [
            ['name' => 'Sunil Bhandari', 'email' => 'schooladmin1@gmail.com', 'phone' => '9801234001', 'dob' => '1985-08-20', 't_address' => 'Jawalakhel, Lalitpur', 'p_address' => 'Lamjung', 'user_role' =>[ 'administrator','teacher','parent'], 'school_id' => 1],
            ['name' => 'Alisha KC', 'email' => 'schooladmin2@gmail.com', 'phone' => '9801234002', 'dob' => '1982-09-07', 't_address' => 'Satdobato, Lalitpur', 'p_address' => 'Gulmi', 'user_role' =>[ 'administrator','teacher'], 'school_id' => 1],
            ['name' => 'Nabin Rai', 'email' => 'schooladmin3@gmail.com', 'phone' => '9801234003', 'dob' => '1980-05-15', 't_address' => 'Kupondole, Lalitpur', 'p_address' => 'Taplejung', 'user_role' =>[ 'administrator'], 'school_id' => 1],
            
            // Teachers for School 1
            ['name' => 'Ram Bahadur Karki', 'email' => 'teacher1@gmail.com', 'phone' => '9801234004', 'dob' => '1989-12-10', 't_address' => 'Koteshwor, Kathmandu', 'p_address' => 'Udayapur', 'user_role' => ['teacher'], 'school_id' => 1],
            ['name' => 'Subash Regmi', 'email' => 'teacher2@gmail.com', 'phone' => '9801234005', 'dob' => '1985-03-10', 't_address' => 'Patan, Lalitpur', 'p_address' => 'Jhapa', 'user_role' => ['teacher'], 'school_id' => 1],
            ['name' => 'Rajesh Limbu', 'email' => 'teacher3@gmail.com', 'phone' => '9801234006', 'dob' => '1986-06-18', 't_address' => 'Dallu, Kathmandu', 'p_address' => 'Taplejung', 'user_role' => ['teacher'], 'school_id' => 1],
            ['name' => 'Sarita Maharjan', 'email' => 'teacher4@gmail.com', 'phone' => '9801234007', 'dob' => '1990-04-22', 't_address' => 'Kirtipur, Kathmandu', 'p_address' => 'Kathmandu', 'user_role' => ['teacher'], 'school_id' => 1],
            ['name' => 'Nisha Thapa', 'email' => 'teacher5@gmail.com', 'phone' => '9801234008', 'dob' => '1988-08-15', 't_address' => 'Balaju, Kathmandu', 'p_address' => 'Kaski', 'user_role' => ['teacher'], 'school_id' => 1],
            ['name' => 'Suman Adhikari', 'email' => 'teacher6@gmail.com', 'phone' => '9801234009', 'dob' => '1987-01-30', 't_address' => 'Lagankhel, Lalitpur', 'p_address' => 'Morang', 'user_role' => ['teacher'], 'school_id' => 1],
            ['name' => 'Prabha Sharma', 'email' => 'teacher7@gmail.com', 'phone' => '9801234010', 'dob' => '1991-11-20', 't_address' => 'Baneshwor, Kathmandu', 'p_address' => 'Kavre', 'user_role' => ['teacher'], 'school_id' => 1],
            ['name' => 'Gopal Shrestha', 'email' => 'teacher8@gmail.com', 'phone' => '9801234011', 'dob' => '1989-05-27', 't_address' => 'Chabahil, Kathmandu', 'p_address' => 'Lalitpur', 'user_role' => ['teacher'], 'school_id' => 1],
            ['name' => 'Meena Tamang', 'email' => 'teacher9@gmail.com', 'phone' => '9801234012', 'dob' => '1984-12-12', 't_address' => 'Gongabu, Kathmandu', 'p_address' => 'Sindhupalchok', 'user_role' => ['teacher'], 'school_id' => 1],
            ['name' => 'Kiran Gurung', 'email' => 'teacher10@gmail.com', 'phone' => '9801234013', 'dob' => '1983-09-25', 't_address' => 'Kalanki, Kathmandu', 'p_address' => 'Gorkha', 'user_role' => ['teacher'], 'school_id' => 1],
            ['name' => 'Deepa Lama', 'email' => 'teacher11@gmail.com', 'phone' => '9801234014', 'dob' => '1987-02-05', 't_address' => 'Samakhusi, Kathmandu', 'p_address' => 'Ramechhap', 'user_role' => ['teacher'], 'school_id' => 1],
            ['name' => 'Manoj Dahal', 'email' => 'teacher12@gmail.com', 'phone' => '9801234015', 'dob' => '1985-07-18', 't_address' => 'New Baneshwor, Kathmandu', 'p_address' => 'Sunsari', 'user_role' => ['teacher'], 'school_id' => 1],
            ['name' => 'Sabina Khadka', 'email' => 'teacher13@gmail.com', 'phone' => '9801234016', 'dob' => '1990-01-11', 't_address' => 'Satdobato, Lalitpur', 'p_address' => 'Dolakha', 'user_role' => ['teacher'], 'school_id' => 1],
            ['name' => 'Anil Shrestha', 'email' => 'teacher14@gmail.com', 'phone' => '9801234017', 'dob' => '1988-10-29', 't_address' => 'Gwarko, Lalitpur', 'p_address' => 'Bhaktapur', 'user_role' => ['teacher'], 'school_id' => 1],
            ['name' => 'Bindu Poudel', 'email' => 'teacher15@gmail.com', 'phone' => '9801234018', 'dob' => '1986-05-13', 't_address' => 'Maharajgunj, Kathmandu', 'p_address' => 'Tanahun', 'user_role' => ['teacher'], 'school_id' => 1],
            ['name' => 'Dipesh Basnet', 'email' => 'teacher16@gmail.com', 'phone' => '9801234019', 'dob' => '1989-03-03', 't_address' => 'Sukedhara, Kathmandu', 'p_address' => 'Nuwakot', 'user_role' => ['teacher'], 'school_id' => 1],
            ['name' => 'Rita Magar', 'email' => 'teacher17@gmail.com', 'phone' => '9801234020', 'dob' => '1987-11-23', 't_address' => 'Kuleshwor, Kathmandu', 'p_address' => 'Makwanpur', 'user_role' => ['teacher'], 'school_id' => 1],
            ['name' => 'Hari Roka', 'email' => 'teacher18@gmail.com', 'phone' => '9801234021', 'dob' => '1984-04-17', 't_address' => 'Baluwatar, Kathmandu', 'p_address' => 'Syangja', 'user_role' => ['teacher'], 'school_id' => 1],
            ['name' => 'Puja Bista', 'email' => 'teacher19@gmail.com', 'phone' => '9801234022', 'dob' => '1992-06-20', 't_address' => 'Gyaneshwor, Kathmandu', 'p_address' => 'Banke', 'user_role' => ['teacher'], 'school_id' => 1],
            ['name' => 'Santosh Thapa', 'email' => 'teacher20@gmail.com', 'phone' => '9801234023', 'dob' => '1985-12-07', 't_address' => 'Putalisadak, Kathmandu', 'p_address' => 'Parbat', 'user_role' => ['teacher'], 'school_id' => 1],
              
            // Students for School 1 (30 students)
            ['name' => 'Bikram Gurung', 'email' => 'student1@gmail.com', 'phone' => '9801234013', 'dob' => '1986-07-08', 't_address' => 'Thamel, Kathmandu', 'p_address' => 'Gorkha', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Asha Khadka', 'email' => 'student2@gmail.com', 'phone' => '9801234014', 'dob' => '1992-09-15', 't_address' => 'Pulchowk, Lalitpur', 'p_address' => 'Bhaktapur', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Deepak Pun', 'email' => 'student3@gmail.com', 'phone' => '9801234015', 'dob' => '1990-04-03', 't_address' => 'Swayambhu, Kathmandu', 'p_address' => 'Myagdi', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Kamala Koirala', 'email' => 'student4@gmail.com', 'phone' => '9801234016', 'dob' => '1987-02-18', 't_address' => 'Kalimati, Kathmandu', 'p_address' => 'Ilam', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Ramesh Thakuri', 'email' => 'student5@gmail.com', 'phone' => '9801234017', 'dob' => '1985-10-05', 't_address' => 'Lazimpat, Kathmandu', 'p_address' => 'Sunsari', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Deepa Khatiwada', 'email' => 'student6@gmail.com', 'phone' => '9801234018', 'dob' => '1991-12-22', 't_address' => 'Tripureshwor, Kathmandu', 'p_address' => 'Dolakha', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Arun Poudel', 'email' => 'student7@gmail.com', 'phone' => '9801234019', 'dob' => '1989-06-30', 't_address' => 'Jorpati, Kathmandu', 'p_address' => 'Nuwakot', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Binita Karki', 'email' => 'student8@gmail.com', 'phone' => '9801234020', 'dob' => '1988-09-14', 't_address' => 'Budhanilkantha, Kathmandu', 'p_address' => 'Dhading', 'user_role' => ['student'], 'school_id' => 1],
            
            ['name' => 'Manish Rai', 'email' => 'student21@gmail.com', 'phone' => '9801234021', 'dob' => '2001-01-05', 't_address' => 'Imadol, Lalitpur', 'p_address' => 'Jhapa', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Nabin Magar', 'email' => 'student22@gmail.com', 'phone' => '9801234022', 'dob' => '2002-05-15', 't_address' => 'Kirtipur, Kathmandu', 'p_address' => 'Ilam', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Amrita Bista', 'email' => 'student23@gmail.com', 'phone' => '9801234023', 'dob' => '2003-03-12', 't_address' => 'Hattiban, Lalitpur', 'p_address' => 'Saptari', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Bikas Thakuri', 'email' => 'student24@gmail.com', 'phone' => '9801234024', 'dob' => '1999-01-23', 't_address' => 'Pokhara, Kaski', 'p_address' => 'Humla', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Saraswati Adhikari', 'email' => 'student25@gmail.com', 'phone' => '9801234025', 'dob' => '2001-09-29', 't_address' => 'Damak, Jhapa', 'p_address' => 'Rolpa', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Mohan Karki', 'email' => 'student26@gmail.com', 'phone' => '9801234026', 'dob' => '1999-12-10', 't_address' => 'Okhaldhunga, Okhaldhunga', 'p_address' => 'Salyan', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Ashish Thapa', 'email' => 'student27@gmail.com', 'phone' => '9801234027', 'dob' => '2000-12-03', 't_address' => 'Trishuli, Nuwakot', 'p_address' => 'Rupandehi', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Priya Sharma', 'email' => 'student28@gmail.com', 'phone' => '9801234028', 'dob' => '2002-07-18', 't_address' => 'Dhapasi, Kathmandu', 'p_address' => 'Kaski', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Roshan Shrestha', 'email' => 'student29@gmail.com', 'phone' => '9801234029', 'dob' => '2001-11-05', 't_address' => 'Thankot, Kathmandu', 'p_address' => 'Syangja', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Anita Poudel', 'email' => 'student30@gmail.com', 'phone' => '9801234030', 'dob' => '2003-04-12', 't_address' => 'Kapan, Kathmandu', 'p_address' => 'Gulmi', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Suraj Tamang', 'email' => 'student31@gmail.com', 'phone' => '9801234031', 'dob' => '2000-08-30', 't_address' => 'Sundhara, Kathmandu', 'p_address' => 'Sindhupalchok', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Sapana Lama', 'email' => 'student32@gmail.com', 'phone' => '9801234032', 'dob' => '2002-01-25', 't_address' => 'Lokanthali, Bhaktapur', 'p_address' => 'Dolakha', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Prakash Thapa', 'email' => 'student33@gmail.com', 'phone' => '9801234033', 'dob' => '2001-06-17', 't_address' => 'Sitapaila, Kathmandu', 'p_address' => 'Dhading', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Jyoti Khatri', 'email' => 'student34@gmail.com', 'phone' => '9801234034', 'dob' => '2003-02-08', 't_address' => 'Gwarko, Lalitpur', 'p_address' => 'Nuwakot', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Binod Rai', 'email' => 'student35@gmail.com', 'phone' => '9801234035', 'dob' => '2000-09-19', 't_address' => 'Dhobighat, Lalitpur', 'p_address' => 'Taplejung', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Sangita Gurung', 'email' => 'student36@gmail.com', 'phone' => '9801234036', 'dob' => '2002-11-22', 't_address' => 'Balambu, Kathmandu', 'p_address' => 'Gorkha', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Dipak Magar', 'email' => 'student37@gmail.com', 'phone' => '9801234037', 'dob' => '2001-04-30', 't_address' => 'Naikap, Kathmandu', 'p_address' => 'Lamjung', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Shristi Neupane', 'email' => 'student38@gmail.com', 'phone' => '9801234038', 'dob' => '2003-08-15', 't_address' => 'Kritipur, Kathmandu', 'p_address' => 'Tanahu', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Nirmal Limbu', 'email' => 'student39@gmail.com', 'phone' => '9801234039', 'dob' => '2000-05-03', 't_address' => 'Baluwatar, Kathmandu', 'p_address' => 'Panchthar', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Anju Thapa', 'email' => 'student40@gmail.com', 'phone' => '9801234040', 'dob' => '2002-03-28', 't_address' => 'Bhaisepati, Lalitpur', 'p_address' => 'Kaski', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Sudeep Tamang', 'email' => 'student41@gmail.com', 'phone' => '9801234041', 'dob' => '2001-10-14', 't_address' => 'Nagarkot, Bhaktapur', 'p_address' => 'Ramechhap', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Puja Shrestha', 'email' => 'student42@gmail.com', 'phone' => '9801234042', 'dob' => '2003-01-07', 't_address' => 'Dillibazar, Kathmandu', 'p_address' => 'Chitwan', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Rajan Khatiwada', 'email' => 'student43@gmail.com', 'phone' => '9801234043', 'dob' => '2000-07-23', 't_address' => 'Bagbazar, Kathmandu', 'p_address' => 'Makwanpur', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Kriti Rana', 'email' => 'student44@gmail.com', 'phone' => '9801234044', 'dob' => '2002-12-11', 't_address' => 'Thapathali, Kathmandu', 'p_address' => 'Palpa', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Abishek Karki', 'email' => 'student45@gmail.com', 'phone' => '9801234045', 'dob' => '2001-02-18', 't_address' => 'Godavari, Lalitpur', 'p_address' => 'Arghakhanchi', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Sabina Koirala', 'email' => 'student46@gmail.com', 'phone' => '9801234046', 'dob' => '2003-05-29', 't_address' => 'Budhanilkantha, Kathmandu', 'p_address' => 'Baglung', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Santosh Basnet', 'email' => 'student47@gmail.com', 'phone' => '9801234047', 'dob' => '2000-11-16', 't_address' => 'Chapagaun, Lalitpur', 'p_address' => 'Myagdi', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Muna Tiwari', 'email' => 'student48@gmail.com', 'phone' => '9801234048', 'dob' => '2002-09-02', 't_address' => 'Samakhusi, Kathmandu', 'p_address' => 'Parbat', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Shyam Thakuri', 'email' => 'student49@gmail.com', 'phone' => '9801234049', 'dob' => '2001-08-07', 't_address' => 'Tokha, Kathmandu', 'p_address' => 'Mustang', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Rojina Gurung', 'email' => 'student50@gmail.com', 'phone' => '9801234050', 'dob' => '2003-03-21', 't_address' => 'Dakshinkali, Kathmandu', 'p_address' => 'Manang', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Bikram Gurung', 'email' => 'student51@gmail.com', 'phone' => '9801234051', 'dob' => '1986-07-08', 't_address' => 'Thamel, Kathmandu', 'p_address' => 'Gorkha', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Asha Khadka', 'email' => 'student52@gmail.com', 'phone' => '9801234052', 'dob' => '1992-09-15', 't_address' => 'Pulchowk, Lalitpur', 'p_address' => 'Bhaktapur', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Deepak Pun', 'email' => 'student53@gmail.com', 'phone' => '9801234053', 'dob' => '1990-04-03', 't_address' => 'Swayambhu, Kathmandu', 'p_address' => 'Myagdi', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Kamala Koirala', 'email' => 'student54@gmail.com', 'phone' => '9801234054', 'dob' => '1987-02-18', 't_address' => 'Kalimati, Kathmandu', 'p_address' => 'Ilam', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Ramesh Thakuri', 'email' => 'student55@gmail.com', 'phone' => '9801234055', 'dob' => '1985-10-05', 't_address' => 'Lazimpat, Kathmandu', 'p_address' => 'Sunsari', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Deepa Khatiwada', 'email' => 'student56@gmail.com', 'phone' => '9801234056', 'dob' => '1991-12-22', 't_address' => 'Tripureshwor, Kathmandu', 'p_address' => 'Dolakha', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Arun Poudel', 'email' => 'student57@gmail.com', 'phone' => '9801234057', 'dob' => '1989-06-30', 't_address' => 'Jorpati, Kathmandu', 'p_address' => 'Nuwakot', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Binita Karki', 'email' => 'student58@gmail.com', 'phone' => '9801234058', 'dob' => '1988-09-14', 't_address' => 'Budhanilkantha, Kathmandu', 'p_address' => 'Dhading', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Manoj Rana', 'email' => 'student59@gmail.com', 'phone' => '9801234059', 'dob' => '1993-01-25', 't_address' => 'Kapan, Kathmandu', 'p_address' => 'Dolpa', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Sita Tamang', 'email' => 'student60@gmail.com', 'phone' => '9801234060', 'dob' => '1992-04-19', 't_address' => 'Banepa, Kavre', 'p_address' => 'Kavre', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Rajendra Rai', 'email' => 'student61@gmail.com', 'phone' => '9801234061', 'dob' => '1989-05-15', 't_address' => 'Chitwan', 'p_address' => 'Ilam', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Laxmi Pandey', 'email' => 'student62@gmail.com', 'phone' => '9801234062', 'dob' => '1991-07-09', 't_address' => 'Bharatpur, Chitwan', 'p_address' => 'Palpa', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Ganesh Adhikari', 'email' => 'student63@gmail.com', 'phone' => '9801234063', 'dob' => '1988-10-31', 't_address' => 'Itahari', 'p_address' => 'Saptari', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Sarita Bhattarai', 'email' => 'student64@gmail.com', 'phone' => '9801234064', 'dob' => '1990-06-11', 't_address' => 'Pokhara', 'p_address' => 'Lamjung', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Dinesh Magar', 'email' => 'student65@gmail.com', 'phone' => '9801234065', 'dob' => '1993-02-20', 't_address' => 'Hetauda', 'p_address' => 'Makwanpur', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Asmita Lama', 'email' => 'student66@gmail.com', 'phone' => '9801234066', 'dob' => '1987-08-12', 't_address' => 'Boudha, Kathmandu', 'p_address' => 'Sindhuli', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Rohit Sharma', 'email' => 'student67@gmail.com', 'phone' => '9801234067', 'dob' => '1985-09-17', 't_address' => 'Gausala, Kathmandu', 'p_address' => 'Rasuwa', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Sabina Rimal', 'email' => 'student68@gmail.com', 'phone' => '9801234068', 'dob' => '1991-11-28', 't_address' => 'Dang', 'p_address' => 'Dang', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Suman Khatri', 'email' => 'student69@gmail.com', 'phone' => '9801234069', 'dob' => '1992-05-24', 't_address' => 'Tulsipur, Dang', 'p_address' => 'Rupandehi', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Pooja Sharma', 'email' => 'student70@gmail.com', 'phone' => '9801234070', 'dob' => '1986-12-14', 't_address' => 'Birtamod, Jhapa', 'p_address' => 'Jhapa', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Prakash Shrestha', 'email' => 'student71@gmail.com', 'phone' => '9801234071', 'dob' => '2006-01-05', 't_address' => 'Kalanki, Kathmandu', 'p_address' => 'Palpa', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Manisha Basnet', 'email' => 'student72@gmail.com', 'phone' => '9801234072', 'dob' => '2005-11-12', 't_address' => 'Sankhamul, Kathmandu', 'p_address' => 'Bara', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Roshan Tamang', 'email' => 'student73@gmail.com', 'phone' => '9801234073', 'dob' => '2007-08-24', 't_address' => 'New Baneshwor, Kathmandu', 'p_address' => 'Sindhuli', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Sarala KC', 'email' => 'student74@gmail.com', 'phone' => '9801234074', 'dob' => '2006-06-17', 't_address' => 'Koteshwor, Kathmandu', 'p_address' => 'Khotang', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Anil Bista', 'email' => 'student75@gmail.com', 'phone' => '9801234075', 'dob' => '2005-03-30', 't_address' => 'Kuleshwor, Kathmandu', 'p_address' => 'Rukum', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Sabina Rana', 'email' => 'student76@gmail.com', 'phone' => '9801234076', 'dob' => '2007-07-14', 't_address' => 'Gausala, Kathmandu', 'p_address' => 'Tanahun', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Nirajan Bhattarai', 'email' => 'student77@gmail.com', 'phone' => '9801234077', 'dob' => '2006-12-19', 't_address' => 'Balkhu, Kathmandu', 'p_address' => 'Syangja', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Muna Shrestha', 'email' => 'student78@gmail.com', 'phone' => '9801234078', 'dob' => '2005-05-26', 't_address' => 'Sundhara, Kathmandu', 'p_address' => 'Dhanusha', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Dipesh Maharjan', 'email' => 'student79@gmail.com', 'phone' => '9801234079', 'dob' => '2007-02-08', 't_address' => 'Samakhusi, Kathmandu', 'p_address' => 'Baglung', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Priyanka Lama', 'email' => 'student80@gmail.com', 'phone' => '9801234080', 'dob' => '2006-04-13', 't_address' => 'Tokha, Kathmandu', 'p_address' => 'Okhaldhunga', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Amit Shrestha', 'email' => 'student81@gmail.com', 'phone' => '9801234081', 'dob' => '2004-12-04', 't_address' => 'Boudha, Kathmandu', 'p_address' => 'Chitwan', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Rekha Thapa', 'email' => 'student82@gmail.com', 'phone' => '9801234082', 'dob' => '2005-09-20', 't_address' => 'Chabahil, Kathmandu', 'p_address' => 'Parsa', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Sanjay Rai', 'email' => 'student83@gmail.com', 'phone' => '9801234083', 'dob' => '2003-05-17', 't_address' => 'Lazimpat, Kathmandu', 'p_address' => 'Jhapa', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Suman Bhandari', 'email' => 'student84@gmail.com', 'phone' => '9801234084', 'dob' => '2004-07-28', 't_address' => 'Maitidevi, Kathmandu', 'p_address' => 'Ramechhap', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Nirmala Kumari', 'email' => 'student85@gmail.com', 'phone' => '9801234085', 'dob' => '2006-11-22', 't_address' => 'Kalanki, Kathmandu', 'p_address' => 'Nuwakot', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Binod Rijal', 'email' => 'student86@gmail.com', 'phone' => '9801234086', 'dob' => '2003-08-10', 't_address' => 'Chhetrapati, Kathmandu', 'p_address' => 'Sindhupalchok', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Usha Adhikari', 'email' => 'student87@gmail.com', 'phone' => '9801234087', 'dob' => '2005-06-03', 't_address' => 'Baneshwor, Kathmandu', 'p_address' => 'Kathmandu', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Prativa Bhatt', 'email' => 'student88@gmail.com', 'phone' => '9801234088', 'dob' => '2004-09-25', 't_address' => 'Gausala, Kathmandu', 'p_address' => 'Sankhuwasabha', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Sushma Koirala', 'email' => 'student89@gmail.com', 'phone' => '9801234089', 'dob' => '2006-05-18', 't_address' => 'Maharajgunj, Kathmandu', 'p_address' => 'Morang', 'user_role' => ['student'], 'school_id' => 1],
            ['name' => 'Suraj Gurung', 'email' => 'student90@gmail.com', 'phone' => '9801234090', 'dob' => '2004-03-06', 't_address' => 'Swayambhu, Kathmandu', 'p_address' => 'Makwanpur', 'user_role' => ['student'], 'school_id' => 1],
        
        
            // Parents for School 1 (20 parents)
            ['name' => 'Sanjay Bhatta', 'email' => 'parent1@gmail.com', 'phone' => '9801234051', 'dob' => '1975-06-20', 't_address' => 'Boudha, Kathmandu', 'p_address' => 'Kaski', 'user_role' => ['parent'], 'school_id' => 1],
            ['name' => 'Reeta Thapa', 'email' => 'parent2@gmail.com', 'phone' => '9801234052', 'dob' => '1977-09-15', 't_address' => 'Balaju, Kathmandu', 'p_address' => 'Syangja', 'user_role' => ['parent'], 'school_id' => 1],
            ['name' => 'Dinesh Sharma', 'email' => 'parent3@gmail.com', 'phone' => '9801234053', 'dob' => '1970-11-28', 't_address' => 'Chabahil, Kathmandu', 'p_address' => 'Tanahu', 'user_role' => ['parent'], 'school_id' => 1],
            ['name' => 'Sabitri Poudel', 'email' => 'parent4@gmail.com', 'phone' => '9801234054', 'dob' => '1974-03-07', 't_address' => 'Gongabu, Kathmandu', 'p_address' => 'Gorkha', 'user_role' => ['parent'], 'school_id' => 1],
            ['name' => 'Bharat Gurung', 'email' => 'parent5@gmail.com', 'phone' => '9801234055', 'dob' => '1972-07-12', 't_address' => 'Kapan, Kathmandu', 'p_address' => 'Lamjung', 'user_role' => ['parent'], 'school_id' => 1],
            ['name' => 'Anju KC', 'email' => 'parent6@gmail.com', 'phone' => '9801234056', 'dob' => '1978-02-25', 't_address' => 'Patan, Lalitpur', 'p_address' => 'Baglung', 'user_role' => ['parent'], 'school_id' => 1],
            ['name' => 'Shiva Karki', 'email' => 'parent7@gmail.com', 'phone' => '9801234057', 'dob' => '1971-10-30', 't_address' => 'Lagankhel, Lalitpur', 'p_address' => 'Myagdi', 'user_role' => ['parent'], 'school_id' => 1],
            ['name' => 'Laxmi Rai', 'email' => 'parent8@gmail.com', 'phone' => '9801234058', 'dob' => '1976-05-08', 't_address' => 'Imadol, Lalitpur', 'p_address' => 'Taplejung', 'user_role' => ['parent'], 'school_id' => 1],
            ['name' => 'Mukunda Adhikari', 'email' => 'parent9@gmail.com', 'phone' => '9801234059', 'dob' => '1973-12-19', 't_address' => 'Sanepa, Lalitpur', 'p_address' => 'Jhapa', 'user_role' => ['parent'], 'school_id' => 1],
            ['name' => 'Januka Shrestha', 'email' => 'parent10@gmail.com', 'phone' => '9801234060', 'dob' => '1979-08-03', 't_address' => 'Kupondole, Lalitpur', 'p_address' => 'Morang', 'user_role' => ['parent'], 'school_id' => 1],
          

        ];

        foreach ($users as $user) {
            $createdUser=User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('User@123'),
                'dob' => $user['dob'],
                't_address' => $user['t_address'],
                'p_address' => $user['p_address'],
                'role' => 'user',
                'school_id'=> $user['school_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($user['user_role'] as $role) {
                Role::create([
                    'user_id' => $createdUser->id,
                    'school_id' => $user['school_id'],
                    'role' => $role,
                ]);
            }

        }
    }
}
