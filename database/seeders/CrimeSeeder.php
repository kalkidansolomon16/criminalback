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
    ['name' => 'መደብደብ'],           // Assault
    ['name' => 'ስኬት መግዛት'],        // Bribery
    ['name' => 'የሕፃናት ብዝበዛ'], // Child Abuse
    ['name' => 'የድህረገፅ ወንጀል'],     // Cybercrime
    ['name' => 'የሀሺሽ ንግድ'],     // Drug Offenses
    ['name' => 'ጉቦ'],          // Embezzlement
    ['name' => 'ማጭበርበር'],     // Fraud
    ['name' => 'የሰው ንግድ'],        // Human Trafficking
    ['name' => 'ማፈናቀል'],          // Kidnapping
    ['name' => 'ግድያ'],             // Murder
    ['name' => 'አስገድዶ መድፈር'],       // Rape
    ['name' => 'የጾታ ጥቃት'],        // Sexual Assault
    ['name' => 'ስርቆት'],            // Theft

];


        DB::table('crimes')->insert($crimes);
    }
}