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
            ['name' => 'Arson'],
            ['name' => 'Assault'],
            ['name' => 'Bribery'],
            ['name' => 'Burglary'],
            ['name' => 'Child Abuse'],
            ['name' => 'Cybercrime'],
            ['name' => 'Domestic Violence'],
            ['name' => 'Drug Offenses'],
            ['name' => 'Embezzlement'],
            ['name' => 'Fraud'],
            ['name' => 'Homicide'],
            ['name' => 'Human Trafficking'],
            ['name' => 'Kidnapping'],
            ['name' => 'Money Laundering'],
            ['name' => 'Murder'],
            ['name' => 'Rape'],
            ['name' => 'Robbery'],
            ['name' => 'Sexual Assault'],
            ['name' => 'Theft'],
            ['name' => 'Vandalism'],
            ['name' => 'Violent Crimes'],
            ['name' => 'White Collar Crimes'],
        ];

        DB::table('crimes')->insert($crimes);
    }
}