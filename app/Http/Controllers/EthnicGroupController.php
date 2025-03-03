<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EthnicGroup;
use Illuminate\Http\Request;

class EthnicGroupController extends Controller
{
    public function index()
    {
        return EthnicGroup::all();
    }


    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' =>'required',
        ]);
        $ethnic =EthnicGroup::create($fields);
        return $ethnic;
    }


    public function show(EthnicGroup $ethnic)
    {
        return $ethnic;
    }


    public function update(Request $request, EthnicGroup $ethnic)
    {
        $fields = $request->validate([
            'name' =>'required',
        ]);
        $ethnic->update($fields);
        return $ethnic;
    }


    public function destroy(EthnicGroup $ethnic)
    {
        $ethnic->delete();
        return ['message' =>'ethnic deleted successully!'];
    }
}
