<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EducationalLevel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EducationalLevelController extends Controller
{

                public function index() {
            
                    $educations = EducationalLevel::all();
            
                    return response()->json([
                        'data' => $educations
                    ]);
                }
            
                public function store(Request $request) {
            
                    $request->validate([
                        'name' => 'required|string|max:255',
                    ]);
            
                    $education = new EducationalLevel();
                    $education->name = $request->name;
                    $education->save();
            
                    return response()->json([
                        'message' => 'education Successfully Created',
                    ], 201);
                }
            
                public function show(EducationalLevel $education) {
                    
                    return response()->json([
                        'data' => $education
                    ]); 
                }
            
                public function update(Request $request, EducationalLevel $education) {
            
                    $request->validate([
                        'name' => 'required|string|max:255',
                    ]);
            
                    $education->name = $request->name;
                    $education->save();
            
                    return response()->json([
                        'message' => 'education Updated Successfully',
                    ]);
                }
            
                public function destroy(EducationalLevel $education) {
                    $education->delete();
                    return response()->json(['message' => 'education deleted successfully!']);
                }
            }
            
    