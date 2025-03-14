<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CriminalType;
use Illuminate\Http\Request;

class CriminalTypeController extends Controller
{
    public function index()
    {
        $criminalType = CriminalType::all();
        if($criminalType){
            return response()->json([
                'message'=>'Sucess',
                'data'=>$criminalType
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
        $type =CriminalType::create($fields);
        return $type;
    }


    public function show(CriminalType $type)
    {
        return $type;
    }


    public function update(Request $request, CriminalType $type)
    {
        $fields = $request->validate([
            'name' =>'required',
        ]);
        $type->update($fields);
        return $type;
    }


    public function destroy(CriminalType $type)
    {
        $type->delete();
        return ['message' =>'type deleted successully!'];
    }
}
