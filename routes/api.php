<?php

use Illuminate\Http\Request;
use App\Models\CriminalGuard;

use App\Models\EducationalLEvel;
use App\Models\EducationalLevels;
use App\Models\PrisionerApperance;
use App\Models\CriminalInformation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EarController;
use App\Http\Controllers\EyeController;
use App\Http\Controllers\LipController;

use App\Http\Controllers\SexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\NoseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TownController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\CrimeController;
use App\Http\Controllers\TeethController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CriminalController;
use App\Http\Controllers\HairTypeController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\PrisionersController;
use App\Http\Controllers\CaseHistoryController;
use App\Http\Controllers\DiseaseTypeController;
use App\Http\Controllers\EthnicGroupController;
use App\Http\Controllers\CriminalTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PrisonercellController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\PrisionHistoryController;
use App\Http\Controllers\Prisioner_crimeController;
use App\Http\Controllers\EducationalLevelController;
use App\Http\Controllers\prisioners_casheController;
use App\Http\Controllers\PrisionerPropertyController;
use App\Http\Controllers\PrisionerApperanceController;
use App\Http\Controllers\PrisionerCourtStoryController;
use App\Http\Controllers\PrisonerAttendanceController;

Route::get('/', function () {
    return 'Hello';
});
Route::middleware('auth:sanctum')->get('user', function (Request $request) {
    return $request->user();
});
// Route::middleware('auth:sanctum')->get('user', function (Request $request) {
//     $user = $request->user()->load('role'); // Load the role relationship
//     return response()->json($user);
// });

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('dashboard',[DashboardController::class,'index']);
    Route::get('users',[UserController::class,'index']);
    Route::get('sexes',[PublicController::class,'sexes']);
    Route::get('roles',[PublicController::class,'roles']);
    Route::get('cash-type',[PublicController::class,'cashTypes']);
    Route::get('status',[PublicController::class,'verdict_status']);
     Route::get('criminal-status',[PublicController::class,'criminal_status']);
     Route::get('user-role',[PublicController::class,'userRole']);
    
    //medical history
    Route::get('medical',[MedicalHistoryController::class,'index']);
    Route::post('medical',[MedicalHistoryController::class,'store']);
    Route::put('medical/{id}',[MedicalHistoryController::class,'update']);
    Route::delete('medical/{id}',[MedicalHistoryController::class,'destroy']);

    //attendance
    Route::get('attendance',[PrisonerAttendanceController::class,'index']);
    Route::post('attendance',[PrisonerAttendanceController::class,'store']);
    Route::put('attendance/{attendance}',[PrisonerAttendanceController::class,'update']);
    Route::delete('attendance/{attendance}',[PrisonerAttendanceController::class,'destroy']);
    //user
    // Route::get('user',[UserController::class,'index']);
    //DeasesTypeRoute
    Route::get('disease-type',[DiseaseTypeController::class,'index']);
    Route::post('disease-type',[DiseaseTypeController::class,'store']);
    Route::put('disease-type/{diseaseType}',[DiseaseTypeController::class,'update']);
    Route::delete('disease-type/{diseaseType}',[DiseaseTypeController::class,'destroy']);
    //criminal
    Route::get('criminal',[CriminalController::class,'index']);
    //region
    Route::get('region',[RegionController::class,'index']);
    Route::post('region',[RegionController::class,'store']);
    Route::get('region/{region}',[RegionController::class,'show']);
    Route::put('region/{region}',[RegionController::class,'update']);
    Route::delete('region/{region}',[RegionController::class,'destroy']);
    //
    Route::get('religion',[ReligionController::class,'index']);
    Route::post('religion',[ReligionController::class,'store']);
    Route::get('religion/{religion}',[ReligionController::class,'show']);
    Route::put('religion/{religion}',[ReligionController::class,'update']);
    Route::delete('religion/{religion}',[ReligionController::class,'destroy']);
    //city
    Route::get('city',[CityController::class,'index']);
    Route::post('city',[CityController::class,'store']);
    Route::get('city/{city}',[CityController::class,'show']);
    Route::put('city/{city}',[CityController::class,'update']);
    Route::delete('city/{city}',[CityController::class,'destroy']);
    //town
    Route::get('town',[TownController::class,'index']);
    Route::post('town',[TownController::class,'store']);
    Route::get('town/{town}',[TownController::class,'show']);
    Route::put('town/{town}',[TownController::class,'update']);
    Route::delete('town/{town}',[TownController::class,'destroy']);


    Route::get('Prisioner_crime',[Prisioner_crimeController::class,'index']);
    Route::post('Prisioner_crime',[Prisioner_crimeController::class,'store']);
    Route::get('Prisioner_crime/{Prisioner_crime}',[Prisioner_crimeController::class,'show']);
    Route::put('Prisioner_crime/{Prisioner_crime}',[Prisioner_crimeController::class,'update']);
    Route::delete('Prisioner_crime/{Prisioner_crime}',[Prisioner_crimeController::class,'destroy']);


    Route::get('Prisioners_cashe',[prisioners_casheController::class,'index']);
    Route::post('Prisioners_cashe',[prisioners_casheController::class,'store']);
    Route::get('Prisioners_cashe/{Prisioners_cashe}',[prisioners_casheController::class,'show']);
    Route::put('Prisioners_cashe/{Prisioners_cashe}',[prisioners_casheController::class,'update']);
    Route::delete('Prisioners_cashe/{Prisioners_cashe}',[prisioners_casheController::class,'destroy']);


    Route::get('prision-history',[PrisionHistoryController::class,'index']);
    Route::post('prision-history',[PrisionHistoryController::class,'store']);
    Route::get('prision-history/{id}',[PrisionHistoryController::class,'show']);
    Route::put('prision-history/{id}',[PrisionHistoryController::class,'update']);
    Route::delete('prision-history/{id}',[PrisionHistoryController::class,'destroy']);


    Route::get('prisonerCell',[PrisonercellController::class,'index']);
    Route::post('prisonerCell',[PrisonercellController::class,'store']);
    Route::get('prisonerCell/{prisonerCell}',[PrisonercellController::class,'show']);
    Route::put('prisonerCell/{prisonerCell}',[PrisonercellController::class,'update']);
    Route::delete('prisonerCell/{prisonerCell}',[PrisonercellController::class,'destroy']);


    Route::get('crime',[CrimeController::class,'index']);
    Route::post('crime',[CrimeController::class,'store']);
    Route::put('crime/{crime}',[CrimeController::class,'update']);
    Route::delete('crime/{crime}',[CrimeController::class,'destroy']);

    Route::post('user',[UserController::class,'store']);
    Route::put('user/{id}',[UserController::class,'update']);
    Route::delete('user/{id}',[UserController::class,'destroy']);

    Route::get('hair',[HairTypeController::class,'index']);
    Route::post('hair',[HairTypeController::class,'store']);
    Route::put('hair/{hair}',[HairTypeController::class,'update']);
    Route::delete('hair/{hair}',[HairTypeController::class,'destroy']);

    Route::get('ethnic',[EthnicGroupController::class,'index']);
    Route::post('ethnic',[EthnicGroupController::class,'store']);
    Route::put('ethnic/{ethnic}',[EthnicGroupController::class,'update']);
    Route::delete('ethnic/{ethnic}',[EthnicGroupController::class,'destroy']);

    Route::get('court',[CourtController::class,'index']);
    Route::post('court',[CourtController::class,'store']);
    Route::get('court/{court}',[CourtController::class,'show']);
    Route::put('court/{court}',[CourtController::class,'update']);
    Route::delete('court/{court}',[CourtController::class,'destroy']);

    
    Route::get('criminalType',[CriminalTypeController::class,'index']);
    Route::post('criminalType',[CriminalTypeController::class,'store']);
    Route::put('criminalType/{criminalType}',[CriminalTypeController::class,'update']);
    Route::delete('criminalType/{criminalType}',[CriminalTypeController::class,'destroy']);

    Route::get('education',[EducationalLevelController::class,'index']);
    Route::post('education',[EducationalLevelController::class,'store']);
    Route::put('education/{education}',[EducationalLevelController::class,'update']);
    Route::delete('education/{education}',[EducationalLevelController::class,'destroy']);

    Route::get('type',[TypeController::class,'index']);
    Route::post('type',[TypeController::class,'store']);
    Route::put('type/{type}',[TypeController::class,'update']);
    Route::delete('type/{type}',[TypeController::class,'destroy']);


    Route::get('teeth',[TeethController::class,'index']);
    Route::post('teeth',[TeethController::class,'store']);
    Route::put('teeth/{teeth}',[TeethController::class,'update']);
    Route::delete('teeth/{teeth}',[TeethController::class,'destroy']);


    Route::get('nose',[NoseController::class,'index']);
    Route::post('nose',[NoseController::class,'store']);
    Route::put('nose/{nose}',[NoseController::class,'update']);
    Route::delete('nose/{nose}',[NoseController::class,'destroy']);

    Route::get('lip',[LipController::class,'index']);
    Route::post('lip',[LipController::class,'store']);
    Route::put('lip/{lip}',[LipController::class,'update']);
    Route::delete('lip/{lip}',[LipController::class,'destroy']);

    Route::get('ear',[EarController::class,'index']);
    Route::post('ear',[EarController::class,'store']);
    Route::put('ear/{ear}',[EarController::class,'update']);
    Route::delete('ear/{ear}',[EarController::class,'destroy']);

    Route::get('eye',[EyeController::class,'index']);
    Route::post('eye',[EyeController::class,'store']);
    Route::put('eye/{eye}',[EyeController::class,'update']);
    Route::delete('eye/{eye}',[EyeController::class,'destroy']);

});

//educational Level

//hairType


//criminal
Route::get('criminal', [CriminalController::class, 'index']);
Route::post('criminal', [CriminalController::class, 'store']); 
Route::put('criminal/{id}', [CriminalController::class, 'update']);
Route::delete('criminal/{id}', [CriminalController::class, 'destroy']);
//crime


//criminalType

//criminalInformation
Route::get('criminalInfo',[CriminalInformation::class,'index']);
Route::post('criminalInfo',[CriminalInformation::class,'store']);
Route::put('criminalInfo/{id}',[CriminalInformation::class,'update']);
Route::delete('criminalInfo/{id}',[CriminalInformation::class,'destroy']);
//caseHistory
Route::get('case',[CaseHistoryController::class,'index']);
Route::post('case',[CaseHistoryController::class,'store']);
Route::put('case/{id}',[CaseHistoryController::class,'update']);
Route::delete('case/{id}',[CaseHistoryController::class,'destroy']);
//type




//criminalGuard
Route::get('criminalGuard',[CriminalGuard::class,'index']);
Route::post('criminalGuard',[CriminalGuard::class,'store']);
Route::put('criminalGuard/{id}',[CriminalGuard::class,'update']);
Route::delete('criminalGuard/{id}',[CriminalGuard::class,'destroy']);

//login
Route::post('login',[AuthController::class,'login']);
//prisioner
Route::get('prisoner',[PrisionersController::class,'index'])->middleware('auth:sanctum');
Route::post('prisoner/basic-information',[PrisionersController::class,'storeBasicInformation'])->middleware('auth:sanctum');
Route::post('prisoner/apperance',[PrisionersController::class,'storeApperance'])->middleware('auth:sanctum');
Route::post('prisoner/medical-history',[PrisionersController::class,'storeMedicalHistory'])->middleware('auth:sanctum');
Route::post('prisoner/court-history',[PrisionersController::class,'storeCourtHistory'])->middleware('auth:sanctum');
Route::post('prisoner/cash-history',[PrisionersController::class,'storeCashHistory'])->middleware('auth:sanctum');
Route::post('prisoner/personal-info',[PrisionersController::class,'storePersonalInfo'])->middleware('auth:sanctum');
Route::post('prisoner/property',[PrisionersController::class,'storeProperties'])->middleware('auth:sanctum');
Route::post('prisoner/crime',[PrisionersController::class,'storeCrimes'])->middleware('auth:sanctum');
Route::get('prisoner/prisoner-info/{id}',[PrisionersController::class,'showPrisonerInformation'])->middleware('auth:sanctum');
Route::post('prisoner/new-history',[PrisionersController::class,'createNewStoryOnExistingPrisoner'])->middleware('auth:sanctum');
Route::get('prisoner-history/{id}',[PrisionHistoryController::class,'show'])->middleware('auth:sanctum');
Route::get('prisioner/{id}',[PrisionersController::class,'show']);
Route::put('prisioner/{id}',[PrisionersController::class,'update']);
Route::delete('prisioner/{id}',[PrisionersController::class,'destroy']);
//prisionerApperance
Route::get('prisionerapperance',[PrisionerApperanceController::class,'index']);
Route::post('prisionerapperance',[PrisionerApperanceController::class,'store']);
Route::get('prisionerapperance/{id}',[PrisionerApperanceController::class,'show']);
Route::put('prisionerapperance/{id}',[PrisionerApperanceController::class,'update']);
Route::get('prisionerapperance/{id}',[PrisionerApperanceController::class,'destroy']);
//prisinerProperty
Route::get('prisionerProperty',[PrisionerPropertyController::class,'index']);
Route::post('prisionerProperty',[PrisionerPropertyController::class,'store']);
Route::get('prisionerProperty/{id}',[PrisionerPropertyController::class,'show']);
Route::put('prisionerProperty/{id}',[PrisionerPropertyController::class,'update']);
Route::get('prisionerProperty/{id}',[PrisionerPropertyController::class,'destroy']);
//type


Route::get('prisonerCourt',[PrisionerCourtStoryController::class,'index']);
Route::post('prisonerCourt',[PrisionerCourtStoryController::class,'store']);
Route::get('prisonerCourt/{id}',[PrisionerCourtStoryController::class,'show']);
Route::put('prisonerCourt/{id}',[PrisionerCourtStoryController::class,'update']);
Route::get('prisonerCourt/{id}',[PrisionerCourtStoryController::class,'destroy']);

//court


