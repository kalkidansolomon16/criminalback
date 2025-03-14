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
use App\Http\Controllers\DiseaseTypeController;
use App\Http\Controllers\EthnicGroupController;
use App\Http\Controllers\CriminalTypeController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\EducationalLevelController;

Route::get('/', function () {
    return 'Hello';
});
Route::middleware('auth:sanctum')->get('user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:sanctum'])->group(function () {
    //medical history
    Route::get('medical',[MedicalHistoryController::class,'index']);
    Route::post('medical',[MedicalHistoryController::class,'store']);
    Route::put('medical/{id}',[MedicalHistoryController::class,'update']);
    Route::delete('medical/{id}',[MedicalHistoryController::class,'destroy']);
    //user
    Route::get('user',[UserController::class,'index']);
    //DeasesTypeRoute
    Route::get('disease',[DiseaseTypeController::class,'index']);
    Route::post('disease',[DiseaseTypeController::class,'store']);
    Route::put('disease/{id}',[DiseaseTypeController::class,'update']);
    Route::delete('disease/{id}',[DiseaseTypeController::class,'destroy']);
    //criminal
    Route::get('criminal',[CriminalController::class,'index']);
    });
//region
Route::get('region',[RegionController::class,'index']);
Route::post('region',[RegionController::class,'store']);
Route::get('region/{id}',[RegionController::class,'show']);
Route::put('region/{id}',[RegionController::class,'update']);
Route::delete('region/{id}',[RegionController::class,'destroy']);
//
Route::get('religion',[ReligionController::class,'index']);
Route::post('religion',[ReligionController::class,'store']);
Route::get('religion/{id}',[ReligionController::class,'show']);
Route::put('religion/{id}',[ReligionController::class,'update']);
Route::delete('religion/{id}',[ReligionController::class,'destroy']);
//city
Route::get('city',[CityController::class,'index']);
Route::post('city',[CityController::class,'store']);
Route::get('city/{id}',[CityController::class,'show']);
Route::put('city/{id}',[CityController::class,'update']);
Route::delete('city/{id}',[CityController::class,'destroy']);
//town
Route::get('town',[TownController::class,'index']);
Route::post('town',[TownController::class,'store']);
Route::get('town/{id}',[TownController::class,'show']);
Route::put('town/{id}',[TownController::class,'update']);
Route::delete('town/{id}',[TownController::class,'destroy']);
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
Route::get('crime',[CrimeController::class,'index']);
Route::post('crime',[CrimeController::class,'post']);
Route::put('crime/{id}',[CrimeController::class,'update']);
Route::delete('crime/{id}',[CrimeController::class,'destroy']);

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
Route::get('role',[RoleController::class,'index']);
Route::post('role',[RoleController::class,'store']);
Route::put('role/{id}',[RoleController::class,'update']);
Route::delete('role/{id}',[RoleController::class,'destroy']);
//sex
Route::get('sex',[SexController::class,'index']);
Route::post('sex',[SexController::class,'store']);
Route::put('sex/{id}',[SexController::class,'update']);
Route::delete('sex/{id}',[SexController::class,'destroy']);
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