<?php

use Illuminate\Http\Request;
use App\Models\CriminalGuard;

use App\Models\EducationalLEvel;
use App\Models\EducationalLevels;
use App\Models\CriminalInformation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\RoleController;

use App\Http\Controllers\TownController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CrimeController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CriminalController;
use App\Http\Controllers\HairTypeController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\CaseHistoryController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\DiseaseTypeController;
use App\Http\Controllers\EthnicGroupController;
use App\Http\Controllers\CriminalTypeController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\EducationalLevelController;
use App\Http\Controllers\PrisionerApperanceController;
use App\Http\Controllers\PrisionerCourtStoryController;
use App\Http\Controllers\PrisionerPropertyController;
use App\Http\Controllers\PrisionersController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PrisionHistoryController;
use App\Http\Controllers\PrisonercellController;
use App\Http\Controllers\prisioners_casheController;
use App\Http\Controllers\Prisioner_crimeController;
use App\Models\PrisionerApperance;

Route::get('/', function () {
    return 'Hello';
});
Route::middleware('auth:sanctum')->get('user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('sexes',[PublicController::class,'sexes']);
    Route::get('roles',[PublicController::class,'roles']);
    Route::get('cash-type',[PublicController::class,'cashTypes']);
    Route::get('status',[PublicController::class,'verdict_status']);
     Route::get('criminal-status',[PublicController::class,'criminal_status']);
    
    //medical history
    Route::get('medical',[MedicalHistoryController::class,'index']);
    Route::post('medical',[MedicalHistoryController::class,'store']);
    Route::put('medical/{id}',[MedicalHistoryController::class,'update']);
    Route::delete('medical/{id}',[MedicalHistoryController::class,'destroy']);
    //user
    Route::get('user',[UserController::class,'index']);
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
    Route::get('prision-history/{prision-history}',[PrisionHistoryController::class,'show']);
    Route::put('prision-history/{prision-history}',[PrisionHistoryController::class,'update']);
    Route::delete('prision-history/{prision-history}',[PrisionHistoryController::class,'destroy']);


    Route::get('prisoner-cell',[PrisonercellController::class,'index']);
    Route::post('prisoner-cell',[PrisonercellController::class,'store']);
    Route::get('prisoner-cell/{prisoner-cell}',[PrisonercellController::class,'show']);
    Route::put('prisoner-cell/{prisoner-cell}',[PrisonercellController::class,'update']);
    Route::delete('prisoner-cell/{prisoner-cell}',[PrisonercellController::class,'destroy']);


    Route::get('crime',[CrimeController::class,'index']);
    Route::post('crime',[CrimeController::class,'post']);
    Route::put('crime/{id}',[CrimeController::class,'update']);
    Route::delete('crime/{id}',[CrimeController::class,'destroy']);


});

//educational Level
Route::get('education',[EducationalLevelController::class,'index']);
Route::post('education',[EducationalLevelController::class,'post']);
Route::put('education/{id}',[EducationalLevelController::class,'update']);
Route::delete('education/{id}',[EducationalLevelController::class,'destroy']);
//hairType
Route::get('hair',[HairTypeController::class,'index']);
Route::post('hair',[HairTypeController::class,'store']);
Route::put('hair/{id}',[HairTypeController::class,'update']);
Route::delete('hair/{id}',[HairTypeController::class,'destroy']);
//ethinic
Route::get('ethincgroup',[EthnicGroupController::class,'index']);
Route::post('ethincgroup',[EthnicGroupController::class,'post']);
Route::put('ethincgroup/{id}',[EthnicGroupController::class,'update']);
Route::delete('ethincgroup/{id}',[EthnicGroupController::class,'destroy']);
//criminal
Route::get('criminal', [CriminalController::class, 'index']);
Route::post('criminal', [CriminalController::class, 'store']); // Change 'post' to 'store'
Route::put('criminal/{id}', [CriminalController::class, 'update']);
Route::delete('criminal/{id}', [CriminalController::class, 'destroy']);
//crime


//criminalType

Route::get('criminalType',[CriminalTypeController::class,'index']);
Route::post('criminalType',[CriminalTypeController::class,'post']);
Route::put('criminalType/{id}',[CriminalTypeController::class,'update']);
Route::delete('criminalType/{id}',[CriminalTypeController::class,'destroy']);
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
Route::get('type',[TypeController::class,'index']);
Route::post('type',[TypeController::class,'store']);
Route::put('type/{id}',[TypeController::class,'update']);
Route::delete('type/{id}',[TypeController::class,'destroy']);
//role
// Route::get('role',[RoleController::class,'index']);
// Route::post('role',[RoleController::class,'store']);
// Route::put('role/{id}',[RoleController::class,'update']);
// Route::delete('role/{id}',[RoleController::class,'destroy']);
//sex
// Route::get('sex',[SexController::class,'index']);
// Route::post('sex',[SexController::class,'store']);
// Route::put('sex/{id}',[SexController::class,'update']);
// Route::delete('sex/{id}',[SexController::class,'destroy']);
//user

Route::post('user',[UserController::class,'store']);
Route::put('user/{id}',[UserController::class,'update']);
Route::delete('user/{id}',[UserController::class,'destroy']);
//medical History


//criminalGuard
Route::get('criminalGuard',[CriminalGuard::class,'index']);
Route::post('criminalGuard',[CriminalGuard::class,'store']);
Route::put('criminalGuard/{id}',[CriminalGuard::class,'update']);
Route::delete('criminalGuard/{id}',[CriminalGuard::class,'destroy']);

//login
Route::post('login',[AuthController::class,'login']);
//prisioner
Route::get('prisioner',[PrisionersController::class,'index']);
Route::post('prisioner',[PrisionersController::class,'store']);
Route::get('prisioner/{id}',[PrisionersController::class,'show']);
Route::put('prisioner/{id}',[PrisionersController::class,'update']);
Route::get('prisioner/{id}',[PrisionersController::class,'destroy']);
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
Route::get('type',[TypeController::class,'index']);
Route::post('type',[TypeController::class,'store']);
Route::get('type/{id}',[TypeController::class,'show']);
Route::put('type/{id}',[TypeController::class,'update']);
Route::get('type/{id}',[TypeController::class,'destroy']);
//prisoner court story

Route::get('prisonerCourt',[PrisionerCourtStoryController::class,'index']);
Route::post('prisonerCourt',[PrisionerCourtStoryController::class,'store']);
Route::get('prisonerCourt/{id}',[PrisionerCourtStoryController::class,'show']);
Route::put('prisonerCourt/{id}',[PrisionerCourtStoryController::class,'update']);
Route::get('prisonerCourt/{id}',[PrisionerCourtStoryController::class,'destroy']);

//court

Route::get('court',[CourtController::class,'index']);
Route::post('court',[CourtController::class,'store']);
Route::get('court/{id}',[CourtController::class,'show']);
Route::put('court/{id}',[CourtController::class,'update']);
Route::get('court/{id}',[CourtController::class,'destroy']);
