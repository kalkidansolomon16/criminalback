<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        passthru('php artisan migrate:fresh');

        $this->call([
            RegionsSeeder::class,
            CourtSeeder::class,
            DiseaseTypeSeeder::class,
            EarSeeder::class,
            EducationalLevelsSeeder::class,
            CrimeSeeder::class,
            EthnicGroupSeeder::class,
            HairTypeSeeder::class,
            LipSeeder::class,
            EyeSeeder::class,
            NoseSeeder::class,
            prisonercellSeeder::class,
            TeethSeeder::class,
            TypeSeeder::class,
        ]);
    }
}
