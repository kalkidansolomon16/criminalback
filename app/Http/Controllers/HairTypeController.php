<?php

namespace App\Http\Controllers;

use App\Models\HairType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HairTypeController extends Controller
{
    public function index()
    {
        $hair = HairType::all();
        if($hair){
            return response()->json([
                'message'=>'Sucess',
                'data'=>$hair
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
        $type =HairType::create($fields);
        return $type;
    }


    public function show(HairType $type)
    {
        return $type;
    }


    public function update(Request $request, HairType $type)
    {
        $fields = $request->validate([
            'name' =>'required',
        ]);
        $type->update($fields);
        return $type;
    }


    public function destroy(HairType $type)
    {
        $type->delete();
        return ['message' =>'type deleted successully!'];
    }
}
