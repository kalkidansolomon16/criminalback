<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nose = [
            [
                'name'=>'ቀጥ ያለ',
                'name' =>'ጎራዳ',
                'name' => 'ሰልካካ'
            ],

        ];
        DB::table('noses')->insert($nose);
    }
}
