<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Crime;
use Illuminate\Http\Request;

class CrimeController extends Controller
{
    public function index()
    {
        return Crime::all();
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
