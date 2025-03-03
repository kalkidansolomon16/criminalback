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
           [
                "id"=> 1,
                "name"=> "Addis Ababa"
            ],
           [
                "id"=> 2,
                "name"=> "Afar"
            ],
           [
                "id"=> 3,
                "name"=> "Amhara"
            ],
           [
                "id"=> 4,
                "name"=> "Oromia"
            ],
           [
                "id"=> 5,
                "name"=> "Somali"
            ],
           [
                "id"=> 6,
                "name"=> "Tigray"
            ],
           [
                "id"=> 7,
                "name"=> "SNNPR"
            ],
           [
                "id"=> 8,
                "name"=> "Benishangul-Gumuz"
            ],
           [
                "id"=> 9,
                "name"=> "Gambela"
            ],
           [
                "id"=> 10,
                "name"=> "Dire Dawa"
            ],
           [
                "id"=> 11,
                "name"=> "Harari"
            ]
           ];
           Region::insert($regions);
           }
        }