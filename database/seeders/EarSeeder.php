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
                'name'=>'ትንሽ',
                "name" => 'ትልቅ',
            ],

        ];
        DB::table('ears')->insert($ear);
    }
}
