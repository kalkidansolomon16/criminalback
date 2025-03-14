<?php

namespace Database\Seeders;

use App\Models\EducationalLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationalLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run():void
   {
        $educationLevel = [
          [
               "name" => "የመጀመሪያ ደረጃ ትምህርት"
           ],
           [
               "name" => "ሁለተኛ ደረጃ ትምህርት"
           ],
           [
               "name" => "ከፍተኛ ሁለተኛ ደረጃ ትምህርት"
           ],
           [
               "name" => "የባችለር ዲግሪ"
           ],
           [
               "name" => "የማስተርስ ዲግሪ"
           ],
           [
               "name" => "የዶክትሬት ዲግሪ"
           ]
           ];
           EducationalLevel::insert($educationLevel);
           }
}
