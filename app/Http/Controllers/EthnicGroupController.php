<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EthnicGroup;
use Illuminate\Http\Request;


    class EthnicGroupController extends Controller{
    
    
        public function index() {
    
            $ethnicgroups = EthnicGroup::all();
    
            return response()->json([
                'data' => $ethnicgroups
            ]);
        }
    
        public function store(Request $request) {
    
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
    
            $ethnic = new EthnicGroup();
            $ethnic->name = $request->name;
            $ethnic->save();
    
            return response()->json([
                'message' => 'ethnic Successfully Created',
            ], 201);
        }
    
        public function show(EthnicGroup $ethnic) {
            
            return response()->json([
                'data' => $ethnic
            ]); 
        }
    
        public function update(Request $request, EthnicGroup $ethnic) {
    
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
    
            $ethnic->name = $request->name;
            $ethnic->save();
    
            return response()->json([
                'message' => 'ethnic Updated Successfully',
            ]);
        }
    
        public function destroy(EthnicGroup $ethnic) {
            $ethnic->delete();
            return response()->json(['message' => 'ethnic deleted successfully!']);
        }
    }
    