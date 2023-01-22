<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Staff;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [
                'name' => 'Admin', 
                'email' => 'admin@gmail.com', 
                'password' => Hash::make('password'),
                'is_admin' => 0 ,
            ],

        ];

        Staff::insert($admin);      



    }
}
