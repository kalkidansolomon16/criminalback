<?php

namespace App\Http\Controllers;

use App\Models\caseType;
use App\Models\CaseHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CaseHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $case = CaseHistory::all();
        if($case){
            return response()->json([
                'message'=>'Sucess',
                'case'=>$case
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'case type not found'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'criminal_id'=>'required'
        ]);
        if($validation->fails()){
        return response()->json([
        'status'=>422,
        'message'=>$validation->messages()
        ]);
        }
        else{
$case = new CaseHistory();
$case->criminal_id = request('criminal_id');
$case->save();
return response()->json([
    'status'=>200,
    'message'=>'case Type added successfully'
]);
    }}
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $case = CaseHistory::find($id);
        if($case){
            return response()->json([
                'status'=>200,
                'case'=>$case
            ]);
        }

        else{
            return response()->json([
                'status'=>500,
                'message'=>'case Type Not Found'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $case = CaseHistory::find($id);
        if($case){
            return response()->json([
                'status'=>200,
                'case'=>$case
            ]);
        }
        
        else{
            return response()->json([
                'status'=>500,
                'message'=>'case Type Not Found'
            ]);
        }
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = Validator::make($request->all(),[
            'criminal_id'=>'required'
            ]);
            if($validation->fails()){
            return response()->json([
            'status'=>422,
            'message'=>$validation->messages()
            ]);
            }
            else{
            $case = new CaseHistory();
            $case->criminal_id = request('criminal_id');
            $case->update();
            return response()->json([
            'message'=>'CaseHistory updated successfully'
            ]);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $case = CaseHistory::find($id);
        if($case){
            $case->delete();
            return response()->json([
                'message'=>'caseal Level Deleted Successfully'
            ]);
        }
        else{
            return response()->json([
                'message'=>'caseal level with this id not foud'
            ]);
        }
    }
}
