<?php

namespace App\Http\Controllers;

use App\Models\Prisioner;
use App\Models\Prisioners_cashe;
use App\Settings\Constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class prisioners_casheController extends Controller {

    public function index() {
        
        $prisonerCashes = Prisioners_cashe::with(['prisonerHistory.prisoner'])->paginate(10);

        return response()->json([
            'data' => $prisonerCashes,
            'status' => 200,
            'message' => 'Success'
        ]);
       
    }

    public function total() {

        $prisoners = Prisioner::with('prisonHistories.prisonerCashes')->paginate(10);

        $summary = $prisoners->map(function ($prisoner) {
            $deposits = 0;
            $withdrawals = 0;

            foreach ($prisoner->prisonHistories as $history) {
                foreach ($history->prisonerCashes as $cash) {
                    if ($cash->type == Constants::ገቢ) {
                        $deposits += $cash->amount;
                    } elseif ($cash->type == Constants::ወጪ) {
                        $withdrawals += $cash->amount;
                    }
                }
            }

            return [
                'prisoner_id' => $prisoner->id,
                'name' => $prisoner->first_name . ' ' . $prisoner->middle_name . ' ' . $prisoner->last_name,
                'total_deposit' => $deposits,
                'total_withdrawal' => $withdrawals,
                'balance' => $deposits - $withdrawals,
            ];
        });

        return response()->json([
            'data' => $summary,
            'status' => 200,
            'message' => 'Success'
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