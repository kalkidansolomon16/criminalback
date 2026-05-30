<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Crime;
use Illuminate\Http\Request;


            class CrimeController extends Controller{
            
            
                public function index() {
            
                    $crimes = Crime::all();
            
                    return response()->json([
                        'data' => $crimes
                    ]);
                }
            
                public function store(Request $request) {
            
                    $request->validate([
                        'name' => 'required|string|max:255',
                    ],
                    [
                        'name.required' => 'ስም ያስገቡ', // Custom error message for name
                    ]);
            
                    $crime = new Crime();
                    $crime->name = $request->name;
                    $crime->save();
            
                    return response()->json([
                        'message' => 'crime Successfully Created',
                    ], 201);
                }
            
                public function show(Crime $crime) {
                    
                    return response()->json([
                        'data' => $crime
                    ]); 
                }
            
                public function update(Request $request, Crime $crime) {
            
                    $request->validate([
                        'name' => 'required|string|max:255',
                    ],
                    [
                        'name.required' => 'ስም ያስገቡ', // Custom error message for name
                    ]);
            
                    $crime->name = $request->name;
                    $crime->save();
            
                    return response()->json([
                        'message' => 'crime Updated Successfully',
                    ]);
                }
            
                public function destroy(Crime $crime) {
                    $crime->delete();
                    return response()->json(['message' => 'crime deleted successfully!']);
                }
            }
            
    
