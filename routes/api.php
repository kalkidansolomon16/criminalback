<?php

use App\Http\Controllers\CaseHistoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CriminalController;
use App\Http\Controllers\HairTypeController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CrimeController;
use App\Http\Controllers\SexController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TownController;
use App\Http\Controllers\EducationalLevelController;
use App\Http\Controllers\CriminalTypeController;
use App\Http\Controllers\EthnicGroupController;
use App\Http\Controllers\ReligionController;
use App\Models\CriminalInformation;
use App\Models\EducationalLEvel;
use App\Models\EducationalLevels;
use App\Models\Region;
use App\Models\Role;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Hello';
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
Route::post('hair',[HairTypeController::class,'post']);
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
Route::post('criminalInfo',[CriminalInformation::class,'post']);
Route::put('criminalInfo/{id}',[CriminalInformation::class,'update']);
Route::delete('criminalInfo/{id}',[CriminalInformation::class,'destroy']);
//caseHistory
Route::get('case',[CaseHistoryController::class,'index']);
Route::post('case',[CaseHistoryController::class,'post']);
Route::put('case/{id}',[CaseHistoryController::class,'update']);
Route::delete('case/{id}',[CaseHistoryController::class,'destroy']);
//type
Route::get('type',[TypeController::class,'index']);
Route::post('type',[TypeController::class,'post']);
Route::put('type/{id}',[TypeController::class,'update']);
Route::delete('type/{id}',[TypeController::class,'destroy']);
//role
Route::get('role',[RoleController::class,'index']);
Route::post('role',[RoleController::class,'post']);
Route::put('role/{id}',[RoleController::class,'update']);
Route::delete('role/{id}',[RoleController::class,'destroy']);
//
Route::get('sex',[SexController::class,'index']);
Route::post('sex',[SexController::class,'post']);
Route::put('sex/{id}',[SexController::class,'update']);
Route::delete('sex/{id}',[SexController::class,'destroy']);
//
Route::get('user',[UserController::class,'index']);
Route::post('user',[UserController::class,'store']);
Route::put('user/{id}',[UserController::class,'update']);
Route::delete('user/{id}',[UserController::class,'destroy']);