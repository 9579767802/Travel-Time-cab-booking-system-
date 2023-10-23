<?php

namespace Database\Seeders;
use Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
 
    public function run()
    {
         // Create a regular user
         DB::table('users')->insert([
            'name' => 'Test User',
            'email' => 'user1@example.com',
            'password' => Hash::make('123456'),
        ]);

        // Create an admin user
        DB::table('users')->insert([
            'name' => 'Admin User',
            'role'=>'1',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
