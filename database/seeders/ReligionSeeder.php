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
                "name" => " የ ኢትዮጵያ ኦርቶዶክስ ክርስቲያን ",
                "code" => 1
            ],
            [
                "name" => "ፕሮቴስታንት  ክርስቲያን",
                "code" => 2
            ],
            [
                "name" => "ካቶሊክ  ክርስቲያን",
                "code" => 3
            ],
            [
                "name" => "እስላም ",
                "code" => 4
            ],
            [
                "name" => "ባህላዊ የአፍሪካ እምነቶችእምነቶች",
                "code" => 5
            ],
            [
                "name" => "ጁዲህዝም ",
                "code" => 6
            ],
            [
                "name" => "የባሂ እምነትእምነት",
                "code" => 7
            ],
            [
                "name" => "ህንዱይዝምህንዱይዝም",
                "code" => 8
            ],
            [
                "name" => "ቡድሂዝም ",
                "code" => 9
            ],
            [
                "name" => "አኒሚዝም ",
                "code" => 10
            ],
            [
                "name" => "አግኖስቲዝምኖስቲዝም",
                "code" => 11
            ],
            [
                "name" => "አቴዝምአቴዝም",
                "code" => 12
            ]

        ];

        Religion::insert($religions);
    }
}
