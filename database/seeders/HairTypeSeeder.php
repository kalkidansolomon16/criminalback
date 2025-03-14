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
                    "name"=>"ቀጥ ያለያለ"
                ],
                [
                    "id"=>2,
                    "name"=>"የተጠቀለለ "
                ],
                [
                    "id"=>3,
                    "name"=>"ፍሪዝ "
                ],
                [
                    "id"=>4,
                    "name"=>"ጥቁርጥቁር"
                ],
                [
                    "id"=>5,
                    "name"=>"ቡኒቡኒ"
                ],
                [
                    "id"=>6,
                    "name"=>"ነጭ "
                ],
                [
                    "id"=>7,
                    "name"=>"ቀጭን"
                ],
                [
                    "id"=>8,
                    "name"=>"ወፍራም "
                ]
                ];
                HairType::insert($haiirType);
                }
                }
