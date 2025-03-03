<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Town;

class TownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $town = Town::exists();
        if ($town) return;

        $towns = [
            
                ["name" => "Addis Ababa"],
                ["name" => "Adama"],
                ["name" => "Dire Dawa"],
                ["name" => "Bahir Dar"],
                ["name" => "Gondar"],
                ["name" => "Mekelle"],
                ["name" => "Hawassa"],
                ["name" => "Jimma"],
                ["name" => "Harar"],
                ["name" => "Shashamane"],
                ["name" => "Dessie"],
                ["name" => "Arba Minch"],
                ["name" => "Debre Markos"],
                ["name" => "Weldiya"],
                ["name" => "Nekemte"],
                ["name" => "Hosaena"],
                ["name" => "Gambela"],
                ["name" => "Asosa"],
                ["name" => "Debre Birhan"],
                ["name" => "Jijiga"],
                ["name" => "Bishoftu"],
                ["name" => "Sodo"],
                ["name" => "Dilla"],
                ["name" => "Adigrat"],
                ["name" => "Debre Tabor"],
                ["name" => "Kombolcha"],
                ["name" => "Aksum"],
                ["name" => "Butajira"],
                ["name" => "Gode"],
                ["name" => "Ambo"],
                ["name" => "Negele Borana"],
                ["name" => "Mizan Teferi"],
                ["name" => "Assosa"],
                ["name" => "Metu"],
                ["name" => "Fiche"],
                ["name" => "Gimbi"],
                ["name" => "Bule Hora"],
                ["name" => "Agaro"],
                ["name" => "Finote Selam"],
                ["name" => "Haramaya"],
                ["name" => "Mojo"],
                ["name" => "Wukro"],
                ["name" => "Mota"],
                ["name" => "Bonga"],
                ["name" => "Kobo"],
                ["name" => "Jinka"],
                ["name" => "Dangila"],
                ["name" => "Bedessa"],
                ["name" => "Aleta Wendo"],
                ["name" => "Metahara"],
                ["name" => "Alaba Kulito"],
                ["name" => "Gode"],
                ["name" => "Yirgalem"],
                ["name" => "Waliso"],
                ["name" => "Welkite"],
                ["name" => "Nejo"],
                ["name" => "Shire Inda Selassie"],
                ["name" => "Boditi"],
                ["name" => "Goba"],
                ["name" => "Alamata"],
                ["name" => "Chiro"],
                ["name" => "Tepi"],
                ["name" => "Durame"],
                ["name" => "Gode"],
                ["name" => "Assela"],
                ["name" => "Bedele"],
                ["name" => "Dembi Dolo"],
                ["name" => "Ginir"],
                ["name" => "Gore"],
                ["name" => "Mendi"],
                ["name" => "Shakiso"],
                ["name" => "Yabelo"],
                ["name" => "Ziway"],
                ["name" => "Wolaita Sodo"],
                ["name" => "Debre Sina"],
                ["name" => "Debre Werq"],
                ["name" => "Debre Zebit"],
                ["name" => "Dejen"],
                ["name" => "Dembidolo"],
                ["name" => "Dila"],
                ["name" => "Dire Dawa"],
                ["name" => "Dodola"],
                ["name" => "Dolo Odo"],
                ["name" => "Durame"],
                ["name" => "Finote Selam"],
                ["name" => "Gambela"],
                ["name" => "Gelemso"],
                ["name" => "Ghimbi"],
                ["name" => "Ginir"],
                ["name" => "Goba"]

        ];
        Town::insert($towns);
    }
}
