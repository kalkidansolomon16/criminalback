<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Eye;
use Illuminate\Support\Facades\Validator;

class EyeController extends Controller
{           
                public function index() {
            
                    $eyes = Eye::all();
            
                    return response()->json([
                        'data' => $eyes
                    ]);
                }
            
                public function store(Request $request) {
            
                    $request->validate([
                        'name' => 'required|string|max:255',
                    ],
                [
                        'name.required' => 'ስም ያስገቡ', // Custom error message for name
                    ]);
            
                    $eye = new Eye();
                    $eye->name = $request->name;
                    $eye->save();
            
                    return response()->json([
                        'message' => 'eye Successfully Created',
                    ], 201);
                }
            
                public function show(Eye $eye) {
                    
                    return response()->json([
                        'data' => $eye
                    ]); 
                }
            
                public function update(Request $request, Eye $eye) {
            
                    $request->validate([
                        'name' => 'required|string|max:255',
                    ],
                [
                        'name.required' => 'ስም ያስገቡ', // Custom error message for name
                    ]);
            
                    $eye->name = $request->name;
                    $eye->save();
            
                    return response()->json([
                        'message' => 'eye Updated Successfully',
                    ]);
                }
            
                public function destroy(Eye $eye) {
                    $eye->delete();
                    return response()->json(['message' => 'eye deleted successfully!']);
                }
            }
            
            
        
    
