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
            'user_name'=>'Kalkidan Solomon',
            'email'=>'kalkidansol1623@gmail.com',
            'password'=>Hash::make('dengelMariyam21@'),
            'sex'=>'Female'

        ]);
  
       
    }
}
