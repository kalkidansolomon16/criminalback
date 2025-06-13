<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Crime;
use App\Models\DiseaseType;
use App\Models\Ear;
use App\Models\EducationalLevel;
use App\Models\EthnicGroup;
use App\Models\Eye;
use App\Models\HairType;
use App\Models\Lip;
use App\Models\MedicalHistory;
use App\Models\Nose;
use App\Models\Prisioner;
use App\Models\Prisioner_crime;
use App\Models\Prisioner_property;
use App\Models\Prisioners_cashe;
use App\Models\PrisionHistory;
use App\Models\PrisonerApperance;
use App\Models\Religion;
use App\Models\Teeth;
use App\Models\Town;
use App\Models\Type;
use App\Settings\Constants;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrisonerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        $towns = Town::select('id')->get()->pluck('id');
        $ethnicGroups = EthnicGroup::select('id')->get()->pluck('id');
        $religions = Religion::select('id')->get()->pluck('id');
        $cities = City::select('id')->get()->pluck('id');
        $educationalLevel = EducationalLevel::select('id')->get()->pluck('id');

        $hairTypes = HairType::select('id')->get()->pluck('id');
        $noses = Nose::select('id')->get()->pluck('id');
        $eyes = Eye::select('id')->get()->pluck('id');
        $tooths = Teeth::select('id')->get()->pluck('id');
        $lips = Lip::select('id')->get()->pluck('id');
        $ears = Ear::select('id')->get()->pluck('id');

        $diseaseTypes = DiseaseType::select('id')->get()->pluck('id');
        $types = Type::select('id')->get()->pluck('id');
        $crimes = Crime::select('id')->get()->pluck('id');

        try {
            // DB::beginTransaction();
            for ($i = 0; $i < 115; $i++) {
                
                $p = new Prisioner();
                
                $p->prisioner_unique_number = mt_rand(1111, 9999); // the System can assign a unique number
                $p->prision_unique_number = mt_rand(1111, 9999);
                
                $p->first_name = $i % 5 == 0 ? $this->randomName('female') : $this->randomName();
                $p->middle_name = $this->randomName();
                $p->last_name = $this->randomName();
                $p->date_of_birth = now()->subYear(collect([10, 4, 3, 7, 8, 12, 8])->random());
                $p->mother_name = $this->randomName('female') . ' ' . $this->randomName() . ' ' . $this->randomName();
                $p->sex = $i % 5 == 0 ? Constants::ሴት : Constants::ወንድ;
                $p->birth_district = $this->randomPlace();
                $p->birth_town_id = $towns->random();
                $p->ethnic_group_id = $ethnicGroups->random();

                $p->save();

                for ($k=0; $k < 2; $k++) { 
                
                    $his = new PrisionHistory();
                    $his->prisioner_id = $p->id;
                    $his->user_id = 1;
                    
                    $his->phone_number = '09' . mt_rand(11111111, 99999999);
                    $his->closest_respondent = $this->randomName() . ' ' . $this->randomName() . ' ' . $this->randomName();
                    $his->closest_respondent_district = $this->randomPlace();
                    $his->religion_id = $religions->random();
                    $his->mobile_number = '09' . mt_rand(11111111, 99999999);
                    $his->closest_respondent_town_id = $towns->random();
                    $his->current_district = $this->randomPlace();
                    $his->job = $this->randomJob();
                    $his->current_city_id = $cities->random();
                    $his->educational_level_id = $educationalLevel->random();
                    $his->date_time_entered = now()->subMonth(collect([10, 4, 3, 7, 8, 12, 8, 1, 0])->random());
                    $his->save();
                    
                    
                    $prisonAppearance = new PrisonerApperance();
                    $prisonAppearance->hair_type_id = $hairTypes->random();
                    $prisonAppearance->nose_id = $noses->random();
                    $prisonAppearance->eye_id = $eyes->random();
                    $prisonAppearance->teeth_id = $tooths->random();
                    $prisonAppearance->lip_id = $lips->random();
                    $prisonAppearance->ear_id = $ears->random();
                    $prisonAppearance->height = collect(['1.81', '1.56', '1.91', '1.55', '1.35', '1.45'])->random();
                    $prisonAppearance->face = collect(['rounded', 'big'])->random();
                    $prisonAppearance->forehead = collect(['big', 'small'])->random();
                    $prisonAppearance->unique_appearance = collect(['no unique appearnace', 'tatoo on forhead', 'tatoo on nose', 'tatoo on body'])->random();
                    $prisonAppearance->extra_description = 'NO EXTRA DESCRIPTION';
                    $prisonAppearance->citizenship = 'ETHIOPIAN';
                    $prisonAppearance->prision_history_id = $his->id;
                    $prisonAppearance->save();
                    
                    $medicalHistory = new MedicalHistory();
                    $medicalHistory->disease_type_id = $diseaseTypes->random();
                    $medicalHistory->hospital_name = collect(['Yerer Hospita', 'Prison Clinic', 'Dessie Hospital'])->random();
                    $medicalHistory->doctor_name = $this->randomName('female') . ' ' . $this->randomName() . ' ' . $this->randomName();
                    $medicalHistory->date = now()->subDays(collect([10, 4, 3, 7, 8, 12, 8, 1, 0])->random());
                    $medicalHistory->doctor_address = $this->randomPlace();
                    $medicalHistory->medical_expense = collect([10, 4, 3, 7, 8, 12, 8, 1, 0])->random() * 100;
                    $medicalHistory->prision_history_id = $his->id;
                    $medicalHistory->user_id = 1;
                    $medicalHistory->save();
                    
                    
                    for ($j = 0; $j < 2; $j++) {
                        $t = $types->random();
                        $property = Prisioner_property::where('prision_history_id', $his->id)->where('type_id', $t)->first() ?? new Prisioner_property();
                        $property->prision_history_id = $his->id;
                        $property->type_id = $t;
                        $property->amount = mt_rand(1, 4);
                        $property->description = collect(['brand new', 'used'])->random();
                        $property->date_received = now();
                        $property->save();
                    }
                    
                    for ($j = 0; $j < 3; $j++) {
                        $prisonerCash = new Prisioners_cashe();
                        $prisonerCash->type = collect([Constants::ገቢ, Constants::ወጪ])->random();
                        $prisonerCash->date = now()->subDays(collect([10, 4, 3, 7, 8, 12, 8, 1, 0])->random());
                        $prisonerCash->amount = $prisonerCash->type == Constants::ገቢ ? mt_rand(5000, 9999) : mt_rand(50, 1000);
                        $prisonerCash->prision_history_id = $his->id;
                        $prisonerCash->save();
                    }

                    for ($j = 0; $j < 2; $j++) {
                        $c = $crimes->random();
                        $crime = Prisioner_crime::where('prision_history_id', $his->id)->where('crime_id', $c)->first() ?? new Prisioner_crime();
                        $crime->prision_history_id = $his->id;
                        $crime->crime_id = $c;
                        $crime->crime_description = '';
                        $crime->status = Constants::ACCUSED;
                        $crime->save();
                    }
                }
            }
            // DB::commit();
        } catch (Exception $e) {
            // DB::rollBack();
        }
    }

    public function randomName($gender = 'male')
    {
$maleNames = collect([
    'ናትናኤል', 'ቅዱስ', 'መንግስቱ', 'አበበ', 'ኪሩቤል', 'ግርማ', 'ተስፋዬ', 'ታደሰ', 'አለማየሁ', 'ብሩክ',
    'ያሬድ', 'ዮሐንስ', 'ሙሉጌታ', 'ፀጋዬ', 'ሰይፉ', 'ከበደ', 'ሰላምነህ', 'ማርኮን', 'ወልደማርያም', 'ዘአማኑኤል',
    'ኤርሚያስ', 'መባ', 'ሎኡል', 'ሙሀመድ', 'በለጠ', 'ሳሙኤል', 'ታምራት', 'ደስታ', 'ከበደ', 'ሄኖክ',
    'ማርሄር', 'አሀመድ', 'በዛብህ', 'አረጋዊ', 'ሐቅሉ', 'ደበበ', 'ሀብታሙ', 'ሙሉነህ', 'ሃሰን', 'ሐናኤል',
    'ሰላምና', 'ሙባረክ', 'እንድሪስ', 'ግዛው', 'ዮናስ', 'ሙሉሃብ', 'እምባዬ', 'ሁሴን', 'መሳይ'
]);

$femaleNames = collect([
    'ትዕግስት', 'ቃልኪዳን', 'ሰብለ', 'ሜሮን', 'ሳባ', 'ሀና', 'ማርታ', 'ገነት', 'ሳሮን', 'ሰላም', 
     'ኤልሳቤጥ', 'ህሊና', 'ደስታ', 'ምህረት', 'መልካም', 'ጸጋ', 'ማህሌት'
]);

        return $gender == 'male' ? $maleNames->random() : $femaleNames->random();
    }

    public function randomPlace()
    {
        $places = collect(['saris', 'piyasa', 'addis ababa', 'jimma', 'dessie', 'kombolcha']);
        return $places->random();
    }

    public function randomJob()
    {
        $jobs = collect(['Driver', 'Police Man', 'Accountant', 'Teacher', 'Programmer', 'Secretary']);
        return $jobs->random();
    }
}
