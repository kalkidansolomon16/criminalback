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
                'name'=>'admin',
                'type' => 1
            ],
            [
                'name'=>'police',
                'type' => 2
            ],
            [
                'name'=>'guard',
                'type' => 2
            ],
            [
                'name'=>'Doctor',
                'type' => 2
            ],

        ];

        Role::insert($roles);

    }
}
