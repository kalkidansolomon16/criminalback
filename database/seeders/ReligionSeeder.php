<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $religion = Religion::exists();
        if ($religion) return;

        $religions = [
            [
                "name" => "Ethiopian Orthodox Christianity",
                "code" => 1
            ],
            [
                "name" => "Protestant Christianity",
                "code" => 2
            ],
            [
                "name" => "Catholic Christianity",
                "code" => 3
            ],
            [
                "name" => "Islam",
                "code" => 4
            ],
            [
                "name" => "Traditional African Religions",
                "code" => 5
            ],
            [
                "name" => "Judaism",
                "code" => 6
            ],
            [
                "name" => "Bahá'í Faith",
                "code" => 7
            ],
            [
                "name" => "Hinduism",
                "code" => 8
            ],
            [
                "name" => "Buddhism",
                "code" => 9
            ],
            [
                "name" => "Animism",
                "code" => 10
            ],
            [
                "name" => "Agnosticism",
                "code" => 11
            ],
            [
                "name" => "Atheism",
                "code" => 12
            ]

        ];

        Religion::insert($religions);
    }
}
