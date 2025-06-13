<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CriminalType;
use Illuminate\Http\Request;

class CriminalTypeController extends Controller

        
 {
            
            
                public function index() {
            
                    $criminalTypes = CriminalType::all();
            
                    return response()->json([
                        'data' => $criminalTypes
                    ]);
                }
            
                public function store(Request $request) {
            
                    $request->validate([
                        'name' => 'required|string|max:255',
                    ],
                    [
                        'name.required' => 'ስም ያስገቡ', // Custom error message for name
                    ]);
            
                    $criminalType = new CriminalType();
                    $criminalType->name = $request->name;
                    $criminalType->save();
            
                    return response()->json([
                        'message' => 'criminalType Successfully Created',
                    ], 201);
                }
            
                public function show(CriminalType $criminalType) {
                    
                    return response()->json([
                        'data' => $criminalType
                    ]); 
                }
            
                public function update(Request $request, CriminalType $criminalType) {
            
                    $request->validate([
                        'name' => 'required|string|max:255',
                    ],
                    [
                        'name.required' => 'ስም ያስገቡ', // Custom error message for name
                    ]);
            
                    $criminalType->name = $request->name;
                    $criminalType->save();
            
                    return response()->json([
                        'message' => 'criminalType Updated Successfully',
                    ]);
                }
            
                public function destroy(CriminalType $criminalType) {
                    $criminalType->delete();
                    return response()->json(['message' => 'criminalType deleted successfully!']);
                }
            }
            
    
