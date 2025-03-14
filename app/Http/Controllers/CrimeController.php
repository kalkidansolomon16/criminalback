<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Crime;
use Illuminate\Http\Request;

class CrimeController extends Controller
{
    public function index()
    {
        $crime = Crime::all();
        if($crime){
            return response()->json([
                'message'=>'Sucess',
                'data'=>$crime
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Hair type not found'
            ]);
        }
    }


    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' =>'required',
        ]);
        $Crime =Crime::create($fields);
        return $Crime;
    }


    public function show(Crime $Crime)
    {
        return $Crime;
    }


    public function update(Request $request, Crime $Crime)
    {
        $fields = $request->validate([
            'name' =>'required',
        ]);
        $Crime->update($fields);
        return $Crime;
    }


    public function destroy(Crime $Crime)
    {
        $Crime->delete();
        return ['message' =>'Crime deleted successully!'];
    }
}
