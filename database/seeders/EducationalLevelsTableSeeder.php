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
                "name"=> "No Formal Education"
           ],
           [
                "id"=> 2,
                "name"=> "Primary Education"
           ],
           [
                "id"=> 3,
                "name"=> "Secondary Education"
           ],
           [
                "id"=> 4,
                "name"=> "Higher Secondary Education"
           ],
           [
                "id"=> 5,
                "name"=> "Bachelor's Degree"
           ],
           [
                "id"=> 6,
                "name"=> "Master's Degree"
           ],
           [
                "id"=> 7,
                "name"=> "Doctorate Degree"
           ]
           ];
           EducationalLevels::insert($educationLevel);
           }
}
