<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run():void
   {
        $regions = 
        
            [
                ["id" => 1, "name" => "አዲስ አበባ"],
                ["id" => 2, "name" => "አፋር"],
                ["id" => 3, "name" => "አምሐራ"],
                ["id" => 4, "name" => "ኦሮሚያ"],
                ["id" => 5, "name" => "ሶማሊ"],
                ["id" => 6, "name" => "ትግራይ"],
                ["id" => 7, "name" => "SNNPR"],
                ["id" => 8, "name" => "በኒሻንጉል-ጉሙዝ"],
                ["id" => 9, "name" => "ገምቤላ"],
                ["id" => 10, "name" => "ዳይሬ ዳዋ"],
                ["id" => 11, "name" => "ሐረሪ"]
            
           ];
           Region::insert($regions);
           }
        }