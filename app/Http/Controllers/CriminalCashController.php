<?php

namespace App\Http\Controllers;

use App\Models\Criminal_cash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CriminalCashController extends Controller
{

    public function index()
    {
      return Criminal_cash::all();
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'criminal_id' =>'required',
            'amount' =>'required',
            'deposit_date' => 'required',
            'withdrawal_date' => 'required',
            'user_id' => 'required'
        ]);
        $criminal_cash = Criminal_cash::create($fields);
        return [
         'data' =>$criminal_cash
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Criminal_cash $criminal_cash)
    {
        return $criminal_cash;
    }

    public function update(Request $request, Criminal_cash $criminal_cash)
    {
        $fields = $request->validate([
            'criminal_id' =>'required',
            'amount' =>'required',
            'deposit_date' => 'required',
            'withdrawal_date' => 'required',
            'user_id' => 'required'
        ]);
        $criminal_cash->update($fields);
        return $criminal_cash;
    }


    public function destroy(Criminal_cash $criminal_cash)
    {
        $criminal_cash->delete();
        return ["message" => "item deleted successfully!"];
    }
}
