<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lip = [
            [
                'name'=>'ቀጥ ያለ'
            ],

        ];
        DB::table('lips')->insert($lip);
    }
}
