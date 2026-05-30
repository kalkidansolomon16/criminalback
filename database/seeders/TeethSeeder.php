<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeethSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teeth = [
            [
                'name'=>'ነጭ',
                'name'=>'የበለዘ',
                'name'=>'የተሸረፈ',
                'name'=>'ፍንጪት',
            ],

        ];
        DB::table('teeths')->insert($teeth);
    }
}

