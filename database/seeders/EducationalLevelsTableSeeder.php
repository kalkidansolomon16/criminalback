<?php

namespace Database\Seeders;

use App\Models\EducationalLevels;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationalLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run():void
   {
        $educationLevel = [
           [
                "id"=> 1,
                "name"=> "የመጀመሪያ ደረጃ ትምህርት"
           ],
           [
                "id"=> 2,
                "name"=> ""
           ],
           [
                "id"=> 3,
                "name"=> "ሁለተኛ ደረጃ ትምህርት"
           ], 
           [
                "id"=> 4,
                "name"=> "ከፍተኛ ሁለተኛ ደረጃ ትምህርት"
           ],
           [
                "id"=> 5,
                "name"=> "የባችለር ዲግሪ"
           ],
           [
                "id"=> 6,
                "name"=> "የማስተርስ ዲግሪ"
           ],
           [
                "id"=> 7,
                "name"=> "የዶክትሬትትሬት ዲግሪ"
           ]
           ];
           EducationalLevels::insert($educationLevel);
           }
}
