<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\pris;
use App\Models\Prisioner_court_story;
use Illuminate\Support\Facades\Validator;

class PrisionerCourtStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prisionerCourtStory = Prisioner_court_story::with('court','updatedCourt')->get();
        if($prisionerCourtStory){
            return response()->json([
                'prisionerCourtStory'=>$prisionerCourtStory,
                'message'=>'Success'
            ]);
            
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'prisionerCourtStory not found'
            ]);
        }
    }

    /**
     * Show the pri for creating a new resource.
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
            'prision_history_id'=>'required',
            'court_id'=>'required',
            'updated_verdict_court'=>'required',
            'appointment_date'=>'required',
            'verdict_description'=>'required',
            'status'=>'required',
            'criminal_status'=>'required',
            
        ]);
        if($validation->fails()){
            return response()->json([
                'status'=>422,
                'message'=>$validation->messages()
            ]);
        }
        else{
            $prisionerCourtStory = new Prisioner_court_story();
            $prisionerCourtStory->prision_history_id = request('prision_history_id');
            $prisionerCourtStory->court_id = request('court_id');
            $prisionerCourtStory->updated_verdict_court = request('updated_verdict_court');
            $prisionerCourtStory->appointment_date = request('appointment_date');
            $prisionerCourtStory->verdict_date = request('verdict_date');
            $prisionerCourtStory->verdict_description = request('verdict_description');
            $prisionerCourtStory->updated_verdict = request('updated_verdict');
            $prisionerCourtStory->status = request('status');
            $prisionerCourtStory->criminal_status = request('criminal_status');

                    $prisionerCourtStory->save();
            return response()->json([
                'message'=>"prisionerCourtStory added Successfully",
                'prisionerCourtStory'=> $prisionerCourtStory
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prisionerCourtStory = Prisioner_court_story::find($id);
        if($prisionerCourtStory){
            return response()->json([
                'prisionerCourtStory'=>$prisionerCourtStory,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'prisionerCourtStory Not Found'
            ]);
        }
    }

    /**
     * Show the pri for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prisionerCourtStory =Prisioner_court_story::find($id);
        if($prisionerCourtStory){
            return response()->json([
                'prisionerCourtStory'=>$prisionerCourtStory,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>' status not found'

            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = Validator::make($request->all(),[
            'prision_history_id'=>'required',
            'court_id'=>'required',
            'updated_verdict_court'=>'required',
            'appointment_date'=>'required',
            'verdict_description'=>'required',
            'status'=>'required',
            'criminal_status'=>'required',
            
        ]);
        if($validation->fails()){
            return response()->json([
                'status'=>422,
                'message'=>$validation->messages()
            ]);
        }
        else{
            $prisionerCourtStory = new  Prisioner_court_story();
        
            $prisionerCourtStory->prision_history_id = request('prision_history_id');
            $prisionerCourtStory->court_id = request('court_id');
            $prisionerCourtStory->updated_verdict_court = request('updated_verdict_court');
            $prisionerCourtStory->appointment_date = request('appointment_date');
            $prisionerCourtStory->verdict_date = request('verdict_date');
            $prisionerCourtStory->verdict_description = request('verdict_description');
            $prisionerCourtStory->updated_verdict = request('updated_verdict');
            $prisionerCourtStory->status = request('status');
            $prisionerCourtStory->criminal_status = request('criminal_status');

            $prisionerCourtStory->update();
            return response()->json([
                'message'=>" updated Successfully"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prisionerCourtStory = Prisioner_court_story::find($id);
        if($prisionerCourtStory){
            $prisionerCourtStory->delete();
            return response()->json([
                'message'=>' Deleted Successfully'
            ]);
        }
        else{
            return response()->json([
                'message'=>' not foud'
            ]);
        }
    }
}
