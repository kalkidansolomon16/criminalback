<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Court;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

    
        class CourtController extends Controller{
        
        
            public function index() {
        
                $courts = Court::all();
        
                return response()->json([
                    'data' => $courts
                ]);
            }
        
            public function store(Request $request) {
        
                $request->validate([
                    'name' => 'required|string|max:255',
                ],
            [
                    'name.required' => 'ስም ያስገቡ', // Custom error message for name
            ]);
        
                $court = new Court();
                $court->name = $request->name;
                $court->save();
        
                return response()->json([
                    'message' => 'court Successfully Created',
                ], 201);
            }
        
            public function show(Court $court) {
                
                return response()->json([
                    'data' => $court
                ]); 
            }
        
            public function update(Request $request, Court $court) {
        
                $request->validate([
                    'name' => 'required|string|max:255',
                ],
            [
                    'name.required' => 'ስም ያስገቡ', // Custom error message for name
                ]);
        
                $court->name = $request->name;
                $court->save();
        
                return response()->json([
                    'message' => 'court Updated Successfully',
                ]);
            }
        
            public function destroy(Court $court) {
                $court->delete();
                return response()->json(['message' => 'court deleted successfully!']);
            }
        }
        
