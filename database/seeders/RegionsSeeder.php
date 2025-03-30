<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Region;
use App\Models\Town;
use App\Models\User;
use App\Settings\Constants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run():void
   {

            // you can start from this
            // internetun lela mitekem sew ale ende?mebrat tefto data new eshi.

        $user = new User();
        $user->full_name = 'kal';
        $user->sex = Constants::ሴት;
        $user->age = 33;
        $user->password = Hash::make('123456789');
        $user->user_name = 'kal';
        $user->address = '';
        $user->phone_number = '0987654321';
        $user->role = Constants::አስተዳዳሪ;
        $user->photo = '';
        $user->signature = '';
        $user->save();

        $regions = 
            [
                ["id" => 1, "name" => "አዲስ አበባ"],
                ["id" => 2, "name" => "አፋር"],
                [
                    "id" => 3, 
                    "name" => "አምሐራ", 
                    'cities' => [
                        ['name' => 'ባህር ዳር'],
                        ['name' => 'ጎንደር'],
                        [
                            'name' => 'ደሴ', 
                            'towns' => [
                                ['name' => 'Buabua wha'],
                                ['name' => 'Piyasa'],
                            ] /// do the same for the others
                        ],
                    ],
                ],
                ["id" => 4, "name" => "ኦሮሚያ"],
                ["id" => 5, "name" => "ሶማሊ"],
                ["id" => 6, "name" => "ትግራይ"],
                ["id" => 7, "name" => "SNNPR"],
                ["id" => 8, "name" => "በኒሻንጉል-ጉሙዝ"],
                ["id" => 9, "name" => "ገምቤላ"],
                ["id" => 10, "name" => "ዳይሬ ዳዋ"],
                ["id" => 11, "name" => "ሐረሪ"]
            
           ];

        foreach($regions as $region) {
            $r = new Region();
            $r->name = $region['name'];
            $r->save();

            foreach($region['cities'] ?? [] as $city) {
                $c = new City();
                $c->name = $city['name'];
                $c->region_id = $r->id;
                $c->save();

                foreach($city['towns'] ?? [] as $town) {
                    $t = new Town();
                    $t->name = $town['name'] ?? '';
                    $t->city_id = $c->id;
                    $t->save(); // this seeder works
                }
            }
        }
    }
}