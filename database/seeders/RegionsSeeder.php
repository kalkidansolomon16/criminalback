<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Region;
use App\Models\Town;
use App\Models\User;
use App\Settings\Constants;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->seedUsers();
        $this->seedRegions();
    }

    private function seedUsers(): void
    {
        $adminAttributes = [
            'full_name' => 'Administrator',
            'sex' => Constants::ሴት,
            'age' => 33,
            'password' => Hash::make('password'),
            'address' => '',
            'phone_number' => '0987654321',
            'role' => Constants::አስተዳዳሪ,
            'photo' => '',
            'signature' => '',
        ];

        $admin = User::where('user_name', 'admin@criminal.com')->first();
        $legacyAdmin = User::where('user_name', 'kal')->first();

        if ($legacyAdmin && $admin && $legacyAdmin->id !== $admin->id) {
            $legacyAdmin->delete();
        } elseif ($legacyAdmin && ! $admin) {
            $legacyAdmin->update(array_merge($adminAttributes, ['user_name' => 'admin@criminal.com']));
            $admin = $legacyAdmin->fresh();
        }

        User::updateOrCreate(
            ['user_name' => 'admin@criminal.com'],
            $adminAttributes
        );

        User::updateOrCreate(
            ['user_name' => 'tg'],
            [
                'full_name' => 'Tigist Girma',
                'sex' => Constants::ሴት,
                'age' => 23,
                'password' => Hash::make('123456789'),
                'address' => '',
                'phone_number' => '0987654322',
                'role' => Constants::ሀኪም,
                'photo' => '',
                'signature' => '',
            ]
        );

        User::updateOrCreate(
            ['user_name' => 'seble'],
            [
                'full_name' => 'Seble Wongel',
                'sex' => Constants::ሴት,
                'age' => 24,
                'password' => Hash::make('123456789'),
                'address' => '',
                'phone_number' => '0987654324',
                'role' => Constants::ፖሊስ,
                'photo' => '',
                'signature' => '',
            ]
        );

        User::updateOrCreate(
            ['user_name' => 'girma'],
            [
                'full_name' => 'Tamrat Abebe',
                'sex' => Constants::ወንድ,
                'age' => 24,
                'password' => Hash::make('123456789'),
                'address' => '',
                'phone_number' => '0987654323',
                'role' => Constants::ጥበቃ,
                'photo' => '',
                'signature' => '',
            ]
        );
    }

    private function seedRegions(): void
    {
        $regions = [
            ['name' => 'አዲስ አበባ'],
            ['name' => 'አፋር'],
            [
                'name' => 'አምሐራ',
                'cities' => [
                    ['name' => 'ባህር ዳር'],
                    ['name' => 'ጎንደር'],
                    [
                        'name' => 'ደሴ',
                        'towns' => [
                            ['name' => 'Buabua wha'],
                            ['name' => 'Piyasa'],
                        ],
                    ],
                ],
            ],
            ['name' => 'ኦሮሚያ'],
            ['name' => 'ሶማሊ'],
            ['name' => 'ትግራይ'],
            ['name' => 'SNNPR'],
            ['name' => 'በኒሻንጉል-ጉሙዝ'],
            ['name' => 'ገምቤላ'],
            ['name' => 'ዳይሬ ዳዋ'],
            ['name' => 'ሐረሪ'],
        ];

        foreach ($regions as $region) {
            $r = Region::firstOrCreate(['name' => $region['name']]);

            foreach ($region['cities'] ?? [] as $city) {
                $c = City::firstOrCreate(
                    ['name' => $city['name'], 'region_id' => $r->id]
                );

                foreach ($city['towns'] ?? [] as $town) {
                    Town::firstOrCreate(
                        ['name' => $town['name'] ?? '', 'city_id' => $c->id]
                    );
                }
            }
        }
    }
}
