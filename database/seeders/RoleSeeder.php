<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //DB::table('roles')->truncate();
        $roles = Role::exists();
        if($roles) return;
        $roles =[
            [
                'name'=>'አስተዳዳሪ ',
                'type' => 1
            ],
            [
                'name'=>'ፖሊስ',
                'type' => 2
            ],
            [
                'name'=>'ጥበቃ ',
                'type' => 3
            ],
            [
                'name'=>'ዶክተር',
                'type' => 4
            ],

        ];

        Role::insert($roles);

    }
}
