<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Prision_cell;
use Illuminate\Http\Request;

class prisonerCellController extends Controller {
       
                    public function index() {
                
                        $prisonerCells = Prision_cell::all();
                
                        return response()->json([
                            'data' => $prisonerCells
                        ]);
                    }
                
                    public function store(Request $request) {
                
                        $request->validate([
                            'name' => 'required|string|max:255',
                        ]);
                
                        $prisonerCell = new Prision_cell();
                        $prisonerCell->name = $request->name;
                        $prisonerCell->save();
                
                        return response()->json([
                            'message' => 'prisonerCell Successfully Created',
                        ], 201);
                    }
                
                    public function show(Prision_cell $prisonerCell) {
                        
                        return response()->json([
                            'data' => $prisonerCell
                        ]); 
                    }
                
                    public function update(Request $request, Prision_cell $prisonerCell) {
                
                        $request->validate([
                            'name' => 'required|string|max:255',
                        ]);
                
                        $prisonerCell->name = $request->name;
                        $prisonerCell->save();
                
                        return response()->json([
                            'message' => 'prisonerCell Updated Successfully',
                        ]);
                    }
                
                    public function destroy(Prision_cell $prisonerCell) {
                        $prisonerCell->delete();
                        return response()->json(['message' => 'prisonerCell deleted successfully!']);
                    }
                }
                
        
    