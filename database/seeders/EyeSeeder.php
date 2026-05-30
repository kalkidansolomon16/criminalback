<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EyeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eye = [
            [
                'name'=>'ሰማያዊ',
                'name' => 'ቡኒ',
                'name' => 'ጥቁር',
            ],

        ];
        DB::table('eyes')->insert($eye);
    }
}
