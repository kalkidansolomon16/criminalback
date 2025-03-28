<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Prision_cell;
class prisonercellSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //DB::table('prisonercells')->truncate();
        $prisonercells = Prision_cell::exists();
        if($prisonercells) return;
        $prisonercells =[
            [
                'name' => 'አንድ'
            ],
            [
                'name' => 'ሁለት'
            ],
            [
                'name' => 'ሶስት'
            ],
            [
                'name' => 'አራት'
            ],

        ];

        Prision_cell::insert($prisonercells);

    }
}
