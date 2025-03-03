<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sex;
use Illuminate\Http\Request;

class SexController extends Controller
{
    public function index()
    {
        return Sex::all();
    }


    public function store(Request $request)
    {
        $fields = $request->validate([
            'gender' =>'required',
        ]);
        $sexgender =Sex::create($fields);
        return $sexgender;
    }


    public function show(Sex $sexgender)
    {
        return $sexgender;
    }


    public function update(Request $request, Sex $sexgender)
    {
        $fields = $request->validate([
            'gender' =>'required',
        ]);
        $sexgender->update($fields);
        return $sexgender;
    }


    public function destroy(Sex $sexgender)
    {
        $sexgender->delete();
        return ['message' =>'sexgender deleted successully!'];
    }
}
