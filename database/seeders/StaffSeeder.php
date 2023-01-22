<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Staff;
use App\Models\Subject;
use App\Models\SubjectTeacher;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // ['name' => 'Chemistry', 'price' => '40.00', 'time' => '08:00 AM - 10:00 AM', 'day' => 'Sunday'],
        // ['name' => 'Physics', 'price' => '40.00', 'time' => '02:00 PM - 04:00 PM', 'day' => 'Sunday'],
        // ['name' => 'Mathematics', 'price' => '40.00', 'time' => '08:00 PM - 10:00 PM', 'day' => 'Monday'],
        // ['name' => 'Additional Mathematics', 'price' => '40.00', 'time' => '08:00 PM - 10:00 PM', 'day' => 'Tuesday'],
        // ['name' => 'Bahasa Melayu', 'price' => '40.00', 'time' => '08:00 PM - 10:00 PM', 'day' => 'Wednesday'],
        // ['name' => 'English', 'price' => '40.00', 'time' => '08:00 PM - 10:00 PM', 'day' => 'Thursday'],
        // ['name' => 'Science', 'price' => '40.00', 'time' => '08:00 PM - 10:00 PM', 'day' => 'Friday'],

        $staffs = [
            [
                'name' => 'Teacher Chemistry', 
                'email' => 'teacherchemistry@gmail.com', 
                'password' => Hash::make('password'),
                'is_admin' => 0 ,

            ],
            [
                'name' => 'Teacher Physics', 
                'email' => 'teacherphysics@gmail.com', 
                'password' => Hash::make('password'),
                'is_admin' => 0 ,

            ],
            [
                'name' => 'Teacher Mathematics', 
                'email' => 'teachermathematics@gmail.com', 
                'password' => Hash::make('password'),
                'is_admin' => 0 ,

            ],
            [
                'name' => 'Teacher Additional Mathematics', 
                'email' => 'teacheradditionalmathematics@gmail.com', 
                'password' => Hash::make('password'),
                'is_admin' => 0 ,

            ],
            [
                'name' => 'Teacher Bahasa Melayu', 
                'email' => 'teacherbahasamelayu@gmail.com', 
                'password' => Hash::make('password'),
                'is_admin' => 0 ,

            ],
            [
                'name' => 'Teacher English', 
                'email' => 'teacherenglish@gmail.com', 
                'password' => Hash::make('password'),
                'is_admin' => 0 ,

            ],
        ];

        $teacherid = 1;
        $subjectid = 1;
        foreach($staffs as $staff){
            Staff::create($staff);            
            SubjectTeacher::insert([
                'teacher_id' => $teacherid,
                'subject_id' => $subjectid,
            ]);

            $teacherid++ ;
            $subjectid++ ;
        }
    }
}
