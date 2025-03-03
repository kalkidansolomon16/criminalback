<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = [
                [
                    "id"=> 1,
                    "type"=> "Mobile"
                ],
                [
                    "id"=> 2,
                    "type"=> "Laptop"
                ],
                [
                    "id"=> 3,
                    "type"=> "Tablet"
                ],
                [
                    "id"=> 4,
                    "type"=> "Desktop"
                ],
                [
                    "id"=> 5,
                    "type"=> "Money"
                ],
                [
                    "id"=> 6,
                    "type"=> "Watch"
                ],
                [
                    "id"=> 7,
                    "type"=> "Camera"
                ],
                [
                    "id"=> 8,
                    "type"=> "Headphones"
                ],
                [
                    "id"=> 9,
                    "type"=> "Television"
                ],
                [
                    "id"=> 10,
                    "type"=> "Smart Speaker"
                ]
                ];
                Type::insert($type);
        
                }
                }
