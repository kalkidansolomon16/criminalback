<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ear;
use Illuminate\Support\Facades\Validator;

class EarController extends Controller
{              
            public function index() {
        
                $ears = Ear::all();
        
                return response()->json([
                    'data' => $ears
                ]);
            }
        
            public function store(Request $request) {
        
                $request->validate([
                    'name' => 'required|string|max:255',
                ],
            [
                    'name.required' => 'ስም ያስገቡ', // Custom error message for name
            ]);
        
                $ear = new Ear();
                $ear->name = $request->name;
                $ear->save();
        
                return response()->json([
                    'message' => 'ear Successfully Created',
                ], 201);
            }
        
            public function show(Ear $ear) {
                
                return response()->json([
                    'data' => $ear
                ]); 
            }
        
            public function update(Request $request, Ear $ear) {
        
                $request->validate([
                    'name' => 'required|string|max:255',
                ],
            [
                    'name.required' => 'ስም ያስገቡ', // Custom error message for name
                ]);
        
                $ear->name = $request->name;
                $ear->save();
        
                return response()->json([
                    'message' => 'ear Updated Successfully',
                ]);
            }
        
            public function destroy(Ear $ear) {
                $ear->delete();
                return response()->json(['message' => 'ear deleted successfully!']);
            }
        }
        
        
    
