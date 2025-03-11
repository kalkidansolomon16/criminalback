<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sex_options = [
            ['gender' => 'ወንድ'],
            ['gender' => 'ሴት'],
        ];

        DB::table('sexes')->insert($sex_options);
    }
}