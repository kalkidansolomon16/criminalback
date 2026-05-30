<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Lip;

class LipController extends Controller
{      
                
        public function index() {
    
            $lips = Lip::all();
    
            return response()->json([
                'data' => $lips
            ]);
        }
    
        public function store(Request $request) {
    
            $request->validate([
                'name' => 'required|string|max:255',
            ],
        [
                'name.required' => 'ስም ያስገቡ', // Custom error message for name
            ]);
    
            $lip = new Lip();
            $lip->name = $request->name;
            $lip->save();
    
            return response()->json([
                'message' => 'lip Successfully Created',
            ], 201);
        }
    
        public function show(Lip $lip) {
            
            return response()->json([
                'data' => $lip
            ]); 
        }
    
        public function update(Request $request, Lip $lip) {
    
            $request->validate([
                'name' => 'required|string|max:255',
            ],
        [
                'name.required' => 'ስም ያስገቡ', // Custom error message for name
            ]);
    
            $lip->name = $request->name;
            $lip->save();
    
            return response()->json([
                'message' => 'lip Updated Successfully',
            ]);
        }
    
        public function destroy(Lip $lip) {
            $lip->delete();
            return response()->json(['message' => 'lip deleted successfully!']);
        }
    }
    
    
