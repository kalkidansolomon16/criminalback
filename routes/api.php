<?php

use App\Http\Controllers\CaseHistoryController;
use App\Http\Controllers\CriminalController;
use App\Http\Controllers\HairTypeController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeController;
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
//educational Level
Route::get('education',[EducationalLevels::class,'index']);
Route::post('education',[EducationalLevels::class,'post']);
Route::put('education/{id}',[EducationalLevels::class,'update']);
Route::delete('education/{id}',[EducationalLevels::class,'destroy']);
//hairType
Route::get('hair',[HairTypeController::class,'index']);
Route::post('hair',[HairTypeController::class,'post']);
Route::put('hair/{id}',[HairTypeController::class,'update']);
Route::delete('hair/{id}',[HairTypeController::class,'destroy']);
//criminal
Route::get('hair',[CriminalController::class,'index']);
Route::post('hair',[CriminalController::class,'post']);
Route::put('hair/{id}',[CriminalController::class,'update']);
Route::delete('hair/{id}',[CriminalController::class,'destroy']);
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