<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'Addis Ababa'],
            ['name' => 'Dire Dawa'],
            ['name' => 'Mekelle'],
            ['name' => 'Adama'],
            ['name' => 'Awassa'],
            ['name' => 'Bahir Dar'],
            ['name' => 'Gonder'],
            ['name' => 'Dessie'],
            ['name' => 'Jimma'],
            ['name' => 'Jijiga'],
            ['name' => 'Shashamane'],
            ['name' => 'Bishoftu'],
            ['name' => 'Sodo'],
            ['name' => 'Arba Minch'],
            ['name' => 'Hosaena'],
            ['name' => 'Harar'],
            ['name' => 'Dilla'],
            ['name' => 'Nekemte'],
            ['name' => 'Debre Birhan'],
            ['name' => 'Asella'],
            ['name' => 'Debre Mark\'os'],
            ['name' => 'Kombolcha'],
            ['name' => 'Debre Tabor'],
            ['name' => 'Adigrat'],
            ['name' => 'Areka'],
            ['name' => 'Weldiya'],
            ['name' => 'Sebeta'],
            ['name' => 'Burayu'],
            ['name' => 'Shire (Inda Selassie)'],
            ['name' => 'Ambo'],
            ['name' => 'Arsi Negele'],
            ['name' => 'Aksum'],
            ['name' => 'Gambela'],
            ['name' => 'Bale Robe'],
            ['name' => 'Butajira'],
            ['name' => 'Batu'],
            ['name' => 'Boditi'],
            ['name' => 'Adwa'],
            ['name' => 'Yirgalem'],
            ['name' => 'Waliso'],
            ['name' => 'Welkite'],
            ['name' => 'Gode'],
            ['name' => 'Meki'],
            ['name' => 'Negele Borana'],
            ['name' => 'Alaba Kulito'],
            ['name' => 'Alamata'],
            ['name' => 'Chiro'],
            ['name' => 'Tepi'],
            ['name' => 'Durame'],
            ['name' => 'Goba'],
            ['name' => 'Assosa'],
            ['name' => 'Gimbi'],
            ['name' => 'Wukro'],
            ['name' => 'Haramaya'],
            ['name' => 'Mizan Teferi'],
            ['name' => 'Sawla'],
            ['name' => 'Mojo'],
            ['name' => 'Dembi Dolo'],
            ['name' => 'Aleta Wendo'],
            ['name' => 'Metu'],
            ['name' => 'Mota'],
            ['name' => 'Fiche'],
            ['name' => 'Finote Selam'],
            ['name' => 'Bule Hora Town'],
            ['name' => 'Bonga'],
            ['name' => 'Kobo'],
            ['name' => 'Jinka'],
            ['name' => 'Dangila'],
            ['name' => 'Degehabur'],
            ['name' => 'Bedessa'],
            ['name' => 'Agaro'],
        ];

        DB::table('cities')->insert($cities);
    }
}