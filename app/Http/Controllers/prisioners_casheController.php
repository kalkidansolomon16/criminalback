<?php

namespace App\Http\Controllers;

use App\Models\Prisioners_cashe;
use Illuminate\Http\Request;

class prisioners_casheController extends Controller {

    public function index() {

        $prisioners_cashe = Prisioners_cashe::all();

        return response()->json([
            'data' => $prisioners_cashe
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'date' => 'required',
            'amount' => 'required',
            'type' => 'required',
            'prision_history_id' => 'required'
        ]);

        $prisioners_cashe = new Prisioners_cashe();
        $prisioners_cashe->date = $request->date;
        $prisioners_cashe->amount = $request->amount;
        $prisioners_cashe->type = $request->type;
        $prisioners_cashe->prision_history_id = $request->prision_history_id;
        $prisioners_cashe->save();

        return response()->json([
            'data' => $prisioners_cashe,
            'message' => 'prisioners_cashe Successfully Created',
        ], 201);
    }

    public function show(Prisioners_cashe $prisioners_cashe) {
        
        return response()->json([
            'data' => $prisioners_cashe
        ]); 
    }

    public function update(Request $request, Prisioners_cashe $prisioners_cashe) {

        $request->validate([
            'date' => 'required',
            'amount' => 'required',
            'type' => 'required',
            'prision_history_id' => 'required'
        ]);

        $prisioners_cashe->date = $request->date;
        $prisioners_cashe->amount = $request->amount;
        $prisioners_cashe->type = $request->type;
        $prisioners_cashe->prision_history_id = $request->prision_history_id;
        $prisioners_cashe->save();

        return response()->json([
            'data' => $prisioners_cashe,
            'message' => 'prisioners_cashe Updated Successfully',
        ]);
    }

    public function destroy(Prisioners_cashe $prisioners_cashe) {
        $prisioners_cashe->delete();
        return response()->json(['message' => 'prisioners_cashe deleted successfully!']);
    }
}