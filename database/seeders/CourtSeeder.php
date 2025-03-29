<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $court = [
            [
                'name'=>'ኮምቦልቻ ፍርድ ቤት'
            ],
            [
                'name'=>'ደሴ ፍርድ ቤት'
            ],
            [
                'name'=>' ባቲ ፍርድ ቤት'
            ],
        ];
        DB::table('courts')->insert($court);
    }
}
