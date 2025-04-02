<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ear = [
            [
                'name'=>'ቀጥ ያለ'
            ],

        ];
        DB::table('ears')->insert($ear);
    }
}
