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
            
                ['name' => 'አዲስ አበባ'], // Addis Ababa
                ['name' => 'ዳይረ ዳዋ'], // Dire Dawa
                ['name' => 'መቐሌ'], // Mekelle
                ['name' => 'አዳማ'], // Adama
                ['name' => 'አዋሳ'], // Awassa
                ['name' => 'ባህር ዳር'], // Bahir Dar
                ['name' => 'ጎንደር'], // Gonder
                ['name' => 'ደሴ'], // Dessie
                ['name' => 'ጅምማ'], // Jimma
                ['name' => 'ጅጅጋ'], // Jijiga
                ['name' => 'ሻሻማኔ'], // Shashamane
                ['name' => 'ቢሾፍቱ'], // Bishoftu
                ['name' => 'ሶዶ'], // Sodo
                ['name' => 'አርባ ምንጭ'], // Arba Minch
                ['name' => 'ሆሳይና'], // Hosaena
                ['name' => 'ሐረር'], // Harar
                ['name' => 'ዲላ'], // Dilla
                ['name' => 'ነቀምቲ'], // Nekemte
                ['name' => 'ደብረ ብርሃን'], // Debre Birhan
                ['name' => 'አሰላ'], // Asella
                ['name' => 'ደብረ ማርቆስ'], // Debre Mark'os
                ['name' => 'ኮምቦልቻ'], // Kombolcha
                ['name' => 'ደብረ ታቦር'], // Debre Tabor
                ['name' => 'አዲግራት'], // Adigrat
                ['name' => 'አረካ'], // Areka
                ['name' => 'ወልድያ'], // Weldiya
                ['name' => 'ሴበታ'], // Sebeta
                ['name' => 'ቡራዩ'], // Burayu
                ['name' => 'ሺረ (እንደ ሰላሴ)'], // Shire (Inda Selassie)
                ['name' => 'አምቦ'], // Ambo
                ['name' => 'አርሲ ነገሌ'], // Arsi Negele
                ['name' => 'አክሱም'], // Aksum
                ['name' => 'ገምበላ'], // Gambela
                ['name' => 'ባሌ ሮበ'], // Bale Robe
                ['name' => 'ቡታጅራ'], // Butajira
                ['name' => 'ባቱ'], // Batu
                ['name' => 'ቦዲቲ'], // Boditi
                ['name' => 'አድዋ'], // Adwa
                ['name' => 'ይርጋለም'], // Yirgalem
                ['name' => 'ወሊሶ'], // Waliso
                ['name' => 'ወልቅቲ'], // Welkite
                ['name' => 'ጎዴ'], // Gode
                ['name' => 'መኪ'], // Meki
                ['name' => 'ነገሌ ቦራና'], // Negele Borana
                ['name' => 'አላባ ኩሊቶ'], // Alaba Kulito
                ['name' => 'አላማታ'], // Alamata
                ['name' => 'ቺሮ'], // Chiro
                ['name' => 'ቴፒ'], // Tepi
                ['name' => 'ዱራሜ'], // Durame
                ['name' => 'ጎባ'], // Goba
                ['name' => 'አሶሳ'], // Assosa
                ['name' => 'ግምቢ'], // Gimbi
                ['name' => 'ውቁሮ'], // Wukro
                ['name' => 'ሐረማይ'], // Haramaya
                ['name' => 'ምዛን ተፈሪ'], // Mizan Teferi
                ['name' => 'ሳውላ'], // Sawla
                ['name' => 'ሞጆ'], // Mojo
                ['name' => 'ደምቢ ዶሎ'], // Dembi Dolo
                ['name' => 'አለታ ወንዶ'], // Aleta Wendo
                ['name' => 'መቱ'], // Metu
                ['name' => 'ሞታ'], // Mota
                ['name' => 'ፊቼ'], // Fiche
                ['name' => 'ፍኖተ ሰላም'], // Finote Selam
                ['name' => 'ቡሌ ሆራ ታውን'], // Bule Hora Town
                ['name' => 'ቦንጋ'], // Bonga
                ['name' => 'ኮቦ'], // Kobo
                ['name' => 'ጅንካ'], // Jinka
                ['name' => 'ዳንጊላ'], // Dangila
                ['name' => 'ደገሐቡር'], // Degehabur
                ['name' => 'በደሰ'], // Bedessa
                ['name' => 'አጋሮ'], // Agaro
            
        ];

        DB::table('cities')->insert($cities);
    }
}