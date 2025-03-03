<?php

namespace Database\Seeders;

use App\Models\HairType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HairTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $haiirType = [
                [
                    "id"=>1,
                    "name"=>"Straight"
                ],
                [
                    "id"=>2,
                    "name"=>"Wavy"
                ],
                [
                    "id"=>3,
                    "name"=>"Curly"
                ],
                [
                    "id"=>4,
                    "name"=>"Coily"
                ],
                [
                    "id"=>5,
                    "name"=>"Kinky"
                ],
                [
                    "id"=>6,
                    "name"=>"Textured"
                ],
                [
                    "id"=>7,
                    "name"=>"Fine"
                ],
                [
                    "id"=>8,
                    "name"=>"Thick"
                ]
                ];
                HairType::insert($haiirType);
                }
                }
