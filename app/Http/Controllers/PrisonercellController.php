<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Prision_cell;
use Illuminate\Http\Request;

class PrisonercellController extends Controller {

    public function index() {

        $prisonercell = Prision_cell::all();

        return response()->json([
            'data' => $prisonercell
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $prisonercell = new Prision_cell();
        $prisonercell->name = $request->name;
        $prisonercell->save();

        return response()->json([
            'message' => 'prisonercell Successfully Created',
        ], 201);
    }

    public function show(Prision_cell $prisonercell) {
        
        return response()->json([
            'data' => $prisonercell
        ]); 
    }

    public function update(Request $request, Prision_cell $prisonercell) {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $prisonercell->name = $request->name;
        $prisonercell->save();

        return response()->json([
            'message' => 'prisonercell Updated Successfully',
        ]);
    }

    public function destroy(Prision_cell $prisonercell) {
        $prisonercell->delete();
        return response()->json(['message' => 'prisonercell deleted successfully!']);
    }
}