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
    
        $towns = [
            
            ["name" => "አዲስ አበባ"],
            ["name" => "አዳማ"],
            ["name" => "ድሬዳዋ"],
            ["name" => "ባህር ዳር"],
            ["name" => "ጎንደር"],
            ["name" => "መቀሌ"],
            ["name" => "ሐዋሳ"],
            ["name" => "ጅማ"],
            ["name" => "ሐረር"],
            ["name" => "ሻሸመኔ"],
            ["name" => "ደሴደሴ"],
            ["name" => "አርባምንጭ"],
            ["name" => "ዴብረማርቆስ"],
            ["name" => "ወልድያ"],
            ["name" => "ነቀምቴ"],
            ["name" => "ሆሳና"],
            ["name" => "ጋምቤላ"],
            ["name" => "አሶሳ"],
            ["name" => "ዴብረብርሃን"],
            ["name" => "ጅጅጋ"],
            ["name" => "ቢሾፍቱ"],
            ["name" => "ሶዶ"],
            ["name" => "ዲላ"],
            ["name" => "አዲግራት"],
            ["name" => "ዴብረታቦር"],
            ["name" => "ኮምቦልቻ"],
            ["name" => "አክሱም"],
            ["name" => "ቡታጅራ"],
            ["name" => "ጎዴ"],
            ["name" => "አምቦ"],
            ["name" => "ነገሌ ቦረና"],
            ["name" => "ሚዛንቴፒ"],
            ["name" => "አሶሳ"],
            ["name" => "መቱ"],
            ["name" => "ፊቼ"],
            ["name" => "ጊምባ"],
            ["name" => "ቡሌሆራ"],
            ["name" => "አጋሮ"],
            ["name" => "ፊኖተሰላም"],
            ["name" => "ሐረማያ"],
            ["name" => "ሞጆ"],
            ["name" => "ዉቅሮ"],
            ["name" => "ሞታ"],
            ["name" => "ቦንጋ"],
            ["name" => "ኮቦ"],
            ["name" => "ጅንካ"],
            ["name" => "ዳንጊላ"],
            ["name" => "በደሰ"],
            ["name" => "አለታ ወንዶ"],
            ["name" => "መታሐራ"],
            ["name" => "አላባ ኩሊቶ"],
            ["name" => "ጎዴ"],
            ["name" => "ይርጋለም"],
            ["name" => "ዋሊሶ"],
            ["name" => "ወልቂጤ"],
            ["name" => "ነጆ"],
            ["name" => "ሸር እንዳ ስላሲ"],
            ["name" => "ቦዲቲ"],
            ["name" => "ጎባ"],
            ["name" => "አላማታ"],
            ["name" => "ቺሮ"],
            ["name" => "ቴፒ"],
            ["name" => "ዱራሜ"],
            ["name" => "ጎዴ"],
            ["name" => "አሰላ"],
            ["name" => "በደሌ"],
            ["name" => "ደምቢ ዶሎ"],
            ["name" => "ጊኒር"],
            ["name" => "ጎሬ"],
            ["name" => "መንዲ"],
            ["name" => "ሻኪሶ"],
            ["name" => "ያቤሎ"],
            ["name" => "ዚዋይ"],
            ["name" => "ወላይታ ሶዶ"],
            ["name" => "ዴብረሲና"],
            ["name" => "ደብረ ወርቅ"],
            ["name" => "ደብረ ዘቢት"],
            ["name" => "ደጀን"],
            ["name" => "ደምቢዶሎ"],
            ["name" => "ዲላ"],
            ["name" => "ደሬዳዋ"],
            ["name" => "ዶዶላ"],
            ["name" => "ዶሎ ኦዶ"],
            ["name" => "ዱራሜ"],
            ["name" => "ፊኖተ ሰላም"],
            ["name" => "ገምቤላ"],
            ["name" => "ገለምሶ"],
            ["name" => "ግምቢ"],
            ["name" => "ጊኒር"],
            ["name" => "ጎባ"]

        ];
        Town::insert($towns);
    }
}
