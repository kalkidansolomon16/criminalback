<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EthnicGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ethnic_groups = [
            ['name' => 'አፋር'],
    ['name' => 'አጋው-አዊ'],
    ['name' => 'አጋው-ሃምይራ'],
    ['name' => 'አላባ'],
    ['name' => 'አምሐራ'],
    ['name' => 'አኑዋክ'],
    ['name' => 'አርቦሬ'],
    ['name' => 'አርጎባ'],
    ['name' => 'ባቻ (ኩጎ)'],
    ['name' => 'ባስኬቶ'],
    ['name' => 'ቤንች'],
    ['name' => 'በርታ'],
    ['name' => 'ቦዲ'],
    ['name' => 'ብራይል'],
    ['name' => 'ቡርጂ'],
    ['name' => 'በና'],
    ['name' => 'ቤታ እንደ ይረድ'],
    ['name' => 'ጫራ'],
    ['name' => 'ዳአሳንች'],
    ['name' => 'ዳውሮ'],
    ['name' => 'ዴባሴ/ጋዋዳ'],
    ['name' => 'ዲራሸ'],
    ['name' => 'ዲሜ'],
    ['name' => 'ዲዚ'],
    ['name' => 'ዶንጋ'],
    ['name' => 'ፌዳሽ'],
    ['name' => 'ጋሞ'],
    ['name' => 'ገባቶ'],
    ['name' => 'ገዴዎ'],
    ['name' => 'ገዲቾ'],
    ['name' => 'ግዶሌ'],
    ['name' => 'ጎፋ'],
    ['name' => 'ጉሙዝ'],
    ['name' => 'ጉራጌ'],
    ['name' => 'ሀዲያ'],
    ['name' => 'ሐማር'],
    ['name' => 'ሐረሪ'],
    ['name' => 'ኢሮብ'],
    ['name' => 'ካፊቾ'],
    ['name' => 'ካምባታ'],
    ['name' => 'ኬበና'],
    ['name' => 'ኮንታ'],
    ['name' => 'ኮሞ'],
    ['name' => 'ኮንሶ'],
    ['name' => 'ኮረ'],
    ['name' => 'ኮንቶማ'],
    ['name' => 'ኩናማ'],
    ['name' => 'ካሮ'],
    ['name' => 'ኩሱሚ'],
    ['name' => 'ኩዌጉ'],
    ['name' => 'ማሌ'],
    ['name' => 'ማኦ'],
    ['name' => 'ማሬቆ'],
    ['name' => 'ማሾላ'],
    ['name' => 'መረ ሕዝብ'],
    ['name' => 'መን'],
    ['name' => 'መስንጎ'],
    ['name' => 'ማጃንጊር'],
    ['name' => 'ሞሲዬ'],
    ['name' => 'ሙርሌ'],
    ['name' => 'ሙርሲ'],
    ['name' => 'ናኦ'],
    ['name' => 'ኑይር'],
    ['name' => 'ንያንጋቶም'],
    ['name' => 'ኦሮሞ'],
    ['name' => 'ኦይዳ'],
    ['name' => 'ቅየት'],
    ['name' => 'ቅዋማ'],
    ['name' => 'ሸ'],
    ['name' => 'ሸኬቾ'],
    ['name' => 'ሸኮ'],
    ['name' => 'ሺናሻ'],
    ['name' => 'ሺታ/ኡፖ'],
    ['name' => 'ሲዳማ'],
    ['name' => 'ሶማሊ'],
    ['name' => 'ሱርማ'],
    ['name' => 'ትግራይ'],
    ['name' => 'ተምባሮ'],
    ['name' => 'ትሳማይ'],
    ['name' => 'ወላይታ'],
    ['name' => 'ወርጂ'],
    ['name' => 'የም'],
    ['name' => 'ዘይሴ'],
    ['name' => 'ዘልማም'],
    ['name' => 'ሌላ/ወለዱ'],
    ['name' => 'ሶማሊ'],
    ['name' => 'ሱዳን'],
    ['name' => 'ኤርትራዊ'],
    ['name' => 'ኬንያዊ'],
    ['name' => 'ድጃቡቲያዊ'],
        ];

        DB::table('ethnic_groups')->insert($ethnic_groups);
    }
}