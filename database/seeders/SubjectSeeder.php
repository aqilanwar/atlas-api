<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $subjects = [
            ['name' => 'Chemistry', 'price' => '40.00', 'time' => '08:00 AM - 10:00 AM', 'day' => 'Sunday'],
            ['name' => 'Physics', 'price' => '40.00', 'time' => '02:00 PM - 04:00 PM', 'day' => 'Sunday'],
            ['name' => 'Mathematics', 'price' => '40.00', 'time' => '08:00 PM - 10:00 PM', 'day' => 'Monday'],
            ['name' => 'Additional Mathematics', 'price' => '40.00', 'time' => '08:00 PM - 10:00 PM', 'day' => 'Tuesday'],
            ['name' => 'Bahasa Melayu', 'price' => '40.00', 'time' => '08:00 PM - 10:00 PM', 'day' => 'Wednesday'],
            ['name' => 'English', 'price' => '40.00', 'time' => '08:00 PM - 10:00 PM', 'day' => 'Thursday'],
            ['name' => 'Science', 'price' => '40.00', 'time' => '08:00 PM - 10:00 PM', 'day' => 'Friday'],
        ];

        foreach($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
