<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
    
        $city = City::all();
        if($city){
            return response()->json([
                'message'=>'Sucess',
                'data'=>$city
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
        $city =City::create($fields);
        return $city;
    }


    public function show(City $city)
    {
        return $city;
    }


    public function update(Request $request, City $city)
    {
        $fields = $request->validate([
            'name' =>'required',
        ]);
        $city->update($fields);
        return $city;
    }


    public function destroy(City $city)
    {
        $city->delete();
        return ['message' =>'city deleted successully!'];
    }
}
