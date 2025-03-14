<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriminalTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criminal_types = 
            [
                ['name' => 'ጊዜ ቀጠጠሮ'], // gize qetero
                ['name' => 'መደበኛ ቀጠሮ'], // medebegna qetero
                ['name' => 'ፍርደኛኛ'], // firdegna
            
        ];

        DB::table('criminal_types')->insert($criminal_types);
    }
}