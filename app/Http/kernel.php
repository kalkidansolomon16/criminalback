<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'user_name'=>'admin@criminal.com',
            'email'=>'admin@criminal.com',
            'password'=>Hash::make('password'),
            'sex'=>'Female'

        ]);
  
       
    }
}
