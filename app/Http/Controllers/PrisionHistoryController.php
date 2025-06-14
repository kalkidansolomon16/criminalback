<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrisionHistory;


class PrisionHistoryController extends Controller
{
    
    public function index() {
    
        $prisionHistory = PrisionHistory::with([
            'prisoner',
            'birthRegion',
            'birthTown',  
            'birthCity',  
            'currentRegion', 
            'currentTown',  
            'currentCity',  
            'educationalLevel',
            'ethnicGroup',
            'religion',
            'closestRespondentRegion',
            'closestRespondentTown',
            'closestRespondentCity',
            'crime',
            'criminalType', 
            'arrestCourt',  
            'verdictCourt', 
            'updatedVerdictCourt', 
            'user'
        ])->get();
    
        return response()->json([
            'data' => $prisionHistory
        ]);
    }
    
    public function store(Request $request) {
    
        $request->validate([
            'prisioner_id' =>'required',
            //'photo' => 'required',
            'prision_cell_id' => 'required',
            'criminal_type_id' => 'required',
            'current_city_id' => 'required',
            'educational_level_id' => 'required',
            'religion_id' => 'required',
            'closest_respondent' => 'required',
            'closest_respondent_town_id' => 'required',
            'current_district' => 'required',
            'closest_respondent_district' => 'required',
            'job' => 'required',
            'phone_number' => 'required',
            'mobile_number' => 'required',
            'date_time_entered' => 'required',
            'end_date_of_arrest' => 'required',
            'date_of_release' => 'required',
            //'release_reason' => 'required',
            'date_of_mercy_release' => 'required',
            'user_id' => 'required'
        ],
    [
            'prisioner_id.required' => 'የእስረኛ መረጃ ያስገቡ',
            //'photo.required' => 'ፎቶ ያስገቡ',
            'prision_cell_id.required' => 'የእስረኛ ክፍል ይምረጡ',
            'criminal_type_id.required' => 'የወንጀል አይነት ይምረጡ',
            'current_city_id.required' => 'የአሁኑ ከተማ ይምረጡ',
            'educational_level_id.required' => 'የትምህርት ደረጃ ይምረጡ',
            'religion_id.required' => 'እምነት ይምረጡ',
            'closest_respondent.required' => 'የቅርብ ተጠሪ ያስገቡ',
            'closest_respondent_town_id.required' => 'የቅርብ ተጠሪ ከተማ ይምረጡ',
            'current_district.required' => 'የአሁኑ ክፍል ይምረጡ',
            'closest_respondent_district.required' => 'የቅርብ ተጠሪ ክፍል ይምረጡ',
            'job.required' => 'ስራ ያስገቡ',
            'phone_number.required' => 'ስራ መጠን ያስገቡ',
            'mobile_number.required' => 'ስልክ ቁጥር ያስገቡ',
            'date_time_entered.required' => 'የገባበት ቀን ያስገቡ',
            'end_date_of_arrest.required' => 'ፍርድ የሚያልቅበት ቀን ያስገቡ',
            'date_of_release.required' => 'የሚፈታበት ቀን ያስገቡ',
            //'release_reason.required' => 'Release Reason is required',
            'date_of_mercy_release.required' => 'በምህረት ምክንያት የሚፈታበት ቀን ያስገቡ',
            'user_id.required' => 'የተጠቃሚ መረጃ ያስገቡ'
    ]);
    
        $prisionHistory = new PrisionHistory();
        $prisionHistory->prisioner_id = $request->prisioner_id;
        // $prisionHistory->photo = $request->photo;
        $prisionHistory->prision_cell_id = $request->prision_cell_id;
        $prisionHistory->criminal_type_id = $request->criminal_type_id;
        $prisionHistory->current_city_id = $request->current_city_id;
        $prisionHistory->educational_level_id = $request->educational_level_id;
        $prisionHistory->religion_id = $request->religion_id;
        $prisionHistory->closest_respondent = $request->closest_respondent;
        $prisionHistory->closest_respondent_town_id = $request->closest_respondent_town_id;
        $prisionHistory->current_district = $request->current_district;
        $prisionHistory->closest_respondent_district = $request->closest_respondent_district;
        $prisionHistory->job = $request->job;
        $prisionHistory->phone_number = $request->phone_number;
        $prisionHistory->mobile_number = $request->mobile_number;
        $prisionHistory->date_time_entered = $request->date_time_entered;
        $prisionHistory->end_date_of_arrest = $request->end_date_of_arrest;
        $prisionHistory->date_of_release = $request->date_of_release;
        $prisionHistory->release_reason = $request->release_reason;
        $prisionHistory->date_of_mercy_release = $request->date_of_mercy_release;
        $prisionHistory->user_id = $request->user_id;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = 'ka_l' . time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('img'), $photoName);
            $prisionHistory->photo = 'img/' . $photoName;
        }
        $prisionHistory->save();
    
        return response()->json([
            'data' =>$prisionHistory,
            'message' => 'PrisionHistory Successfully Created',
        ], 201);
    }
    
    public function show(string $id){
        $prisionHistory = PrisionHistory::with([
            'prisonerApperance',
            'birthRegion',
            'birthTown',  
            'birthCity',  
            'currentRegion', 
            'currentTown',  
            'currentCity',  
            'educationalLevel',
            'ethnicGroup',
            'religion',
            'closestRespondentRegion',
            'closestRespondentTown',
            'closestRespondentCity',
            // 'crime',
            // 'criminalType', 
            'arrestCourt',  
            'verdictCourt', 
            'updatedVerdictCourt', 
            'user',
            'prisonerCell',
            'prisoner',
            'prisonerProperties',
            'prisioner_crimes',
            
        ])->find($id);
        return response()->json([
            'data' => $prisionHistory
        ]); 
    }
    
    public function update(Request $request,string $id) {
    
        $request->validate([
              'prisoner_id' => 'required|exists:prisoners,id',
    // 'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Uncomment if needed
    'prison_cell_id' => 'required|exists:prison_cells,id',
    'criminal_type_id' => 'required|exists:criminal_types,id',
    'current_city_id' => 'required|exists:cities,id',
    'educational_level_id' => 'required|exists:educational_levels,id',
    'religion_id' => 'required|exists:religions,id',
    'closest_respondent' => 'required|string|max:255',
    'closest_respondent_town_id' => 'required|exists:towns,id',
    'current_district' => 'required|string|max:255',
    'closest_respondent_district' => 'required|string|max:255',
    'job' => 'required|string|max:255',
    'phone_number' => 'required|string|max:20',
    'mobile_number' => 'required|string|max:20',
    'date_time_entered' => 'required|date',
    'end_date_of_arrest' => 'required|date|after_or_equal:date_time_entered',
    'date_of_release' => 'required|date|after_or_equal:end_date_of_arrest',
    'release_reason' => 'required|string|max:255',
    'date_of_mercy_release' => 'nullable|date|after_or_equal:date_of_release',
    'user_id' => 'required|exists:users,id',
        ],
    [
        'prisioner_id.required' => 'የእስረኛ ስም ይምረጡ',
        'prision_cell_id.required' => 'የእስረኛ ክፍል ይምረጡ',
        'criminal_type_id.required' => 'የእስረኛ አይነት ይምረጡ',
        'current_city_id.required' => 'የአሁኑ ከተማ ይምረጡ',
        'educational_level_id.required' => 'የትምህርት ደረጃ ይምረጡ',
        'religion_id.required' => 'እምነት ይምረጡ',
        'closest_respondent.required' => 'የቅርብ ተጠሪ ያስገቡ',
        'closest_respondent_town_id.required' => 'የቅርብ ተጠሪ ከተማ ይምረጡ',
        'current_district.required' => 'የአሁኑ ክፍል ይምረጡ',
        'closest_respondent_district.required' => 'የቅርብ ተጠሪ ክፍል ይምረጡ',
        'job.required' => 'ስራ ያስገቡ',
        'phone_number.required' => 'ስልክ ቁጥር ያስገቡ',
        'mobile_number.required' => 'ስልክ ቁጥር ያስገቡ',
        'date_time_entered.required' => 'የገባበት ቀን ያስገቡ',
        'end_date_of_arrest.required' => 'ፍርድ የሚያልቅበት ቀን ያስገቡ',
        'date_of_release.required' => 'የሚፈታበት ቀን ያስገቡ',
        'release_reason.required' => 'የማስፈን ምክንያት ያስገቡ',
        'date_of_mercy_release.required' => 'በምህረት ምክንያት የሚፈታበት ቀን ያስገቡ',
        'user_id.required' => 'የተጠቃሚ መረጃ ያስገቡ'
    ]);
        $prisionHistory = PrisionHistory::findOrFail($id);
        $prisionHistory->prisioner_id = $request->prisioner_id;
       // $prisionHistory->photo = $request->photo;
        $prisionHistory->prision_cell_id = $request->prision_cell_id;
        $prisionHistory->criminal_type_id = $request->criminal_type_id;
        $prisionHistory->current_city_id = $request->current_city_id;
        $prisionHistory->educational_level_id = $request->educational_level_id;
        $prisionHistory->religion_id = $request->religion_id;
        $prisionHistory->closest_respondent = $request->closest_respondent;
        $prisionHistory->closest_respondent_town_id = $request->closest_respondent_town_id;
        $prisionHistory->current_district = $request->current_district;
        $prisionHistory->closest_respondent_district = $request->closest_respondent_district;
        $prisionHistory->job = $request->job;
        $prisionHistory->phone_number = $request->phone_number;
        $prisionHistory->mobile_number = $request->mobile_number;
        $prisionHistory->date_time_entered = $request->date_time_entered;
        $prisionHistory->end_date_of_arrest = $request->end_date_of_arrest;
        $prisionHistory->date_of_release = $request->date_of_release;
        $prisionHistory->release_reason = $request->release_reason;
        $prisionHistory->date_of_mercy_release = $request->date_of_mercy_release;
        $prisionHistory->user_id = $request->user_id;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = 'ka_l' . time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('img'), $photoName);
            $prisionHistory->photo = 'img/' . $photoName;
        }
        $prisionHistory->save();
    
        return response()->json([
            'message' => 'PrisionHistory Updated Successfully',
        ]);
    }
    
    public function destroy(PrisionHistory $prisionHistory) {
        $prisionHistory->delete();
        return response()->json(['message' => 'PrisionHistory deleted successfully!']);
    }
    }

