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
                    "type"=> "ሞባይይል"
                ],
                [
                    "id"=> 2,
                    "type"=> "ላፕቶትላፕቶት"
                ],
                [
                    "id"=> 3,
                    "type"=> "ታብሌትታብሌት"
                ],
                [
                    "id"=> 4,
                    "type"=> "ዴድክቶፕዴድክቶፕ"
                ],
                [
                    "id"=> 5,
                    "type"=> "ገንዘብገንዘብ"
                ],
                [
                    "id"=> 6,
                    "type"=> "ሰአትሰአት"
                ],
                [
                    "id"=> 7,
                    "type"=> "ካሜራካሜራ"
                ],
                ];
                Type::insert($type);
        
                }
                }
