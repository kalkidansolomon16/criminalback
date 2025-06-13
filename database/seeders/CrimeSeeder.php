<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CrimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Optional: Clear the table before seeding
        // DB::table('crimes')->truncate();
        
$crimes = [
    ['name' => 'እሳት ማቃጠል'],         // Arson
    ['name' => 'መደበደብ'],           // Assault
    ['name' => 'ስኬት መግዛት'],        // Bribery
    ['name' => 'ሌብነት በመስኮት'],      // Burglary
    ['name' => 'የሕፃናት ተጨማሪ ተግፎ'], // Child Abuse
    ['name' => 'የድህረገፅ ወንጀል'],     // Cybercrime
    ['name' => 'የቤተሰብ ጥቃት'],      // Domestic Violence
    ['name' => 'የአሻችሽ ወንጀሎች'],     // Drug Offenses
    ['name' => 'ማበዛበዝ'],          // Embezzlement
    ['name' => 'ተታማኝነት ማሳበት'],     // Fraud
    ['name' => 'ማግደል'],            // Homicide
    ['name' => 'የሰው ንግድ'],        // Human Trafficking
    ['name' => 'መፈናቀል'],          // Kidnapping
    ['name' => 'የገንዘብ ማጠራቀሚያ'],   // Money Laundering
    ['name' => 'ግድያ'],             // Murder
    ['name' => 'በግፍ አሳደድ'],       // Rape
    ['name' => 'መስረቅ'],            // Robbery
    ['name' => 'የጾታ ጥቃት'],        // Sexual Assault
    ['name' => 'ስርቆት'],            // Theft
    ['name' => 'የንብረት ፈናቃቂ'],     // Vandalism
    ['name' => 'የኃይል ወንጀሎች'],     // Violent Crimes
    ['name' => 'የቢሮ ወንጀሎች'],      // White Collar Crimes
];


        DB::table('crimes')->insert($crimes);
    }
}