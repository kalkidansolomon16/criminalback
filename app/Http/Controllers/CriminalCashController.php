<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CriminalCash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CriminalCashController extends Controller
{

    public function index()
    {
      return CriminalCash::all();
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'criminal_id' =>'required',
            'amount' =>'required',
            // 'deposit_date' => 'required',
            // 'withdrawal_date' => 'required',
            'user_id' => 'required'
        ]);
        if($validation->fails()){
        return response()->json([
        'status'=>422,
        'message'=>$validation->messages()
        ]);
        }
        else{
        $criminalCash = new CriminalCash();
        $criminalCash->criminal_id = request('criminal_id');
        $criminalCash->amount = request('amount');
        $criminalCash->deposit_date = request('deposit_date');
        $criminalCash->withdrawal_date = request('withdrawal_date');
        $criminalCash->user_id = request('user_id');
        $criminalCash->save();
        return response()->json([
            'status'=>200,
            'message'=>'CeiminalCash inserted successfully'
        ]);

        }
        
        
        // $CriminalCash = CriminalCash::create($fields);
        // return [
        //  'data' =>$CriminalCash
        // ];
    }

    /**
     * Display the specified resource.
     */
    public function show(CriminalCash $CriminalCash)
    {
        return $CriminalCash;
    }

    public function update(Request $request, CriminalCash $CriminalCash)
    {
        $validation = Validator::make($request->all(),[
            'criminal_id' =>'required',
            'amount' =>'required',
            // 'deposit_date' => 'required',
            // 'withdrawal_date' => 'required',
            'user_id' => 'required'
        ]);
        if($validation->fails()){
        return response()->json([
        'status'=>422,
        'message'=>$validation->messages()
        ]);
        }
        else{
        $criminalCash = new CriminalCash();
        $criminalCash->criminal_id = request('criminal_id');
        $criminalCash->amount = request('amount');
        $criminalCash->deposit_date = request('deposit_date');
        $criminalCash->withdrawal_date = request('withdrawal_date');
        $criminalCash->user_id = request('user_id');
        $criminalCash->update();
        return response()->json([
            'status'=>200,
            'message'=>'CeiminalCash inserted successfully'
        ]);
    }
}
public function destroy(string $id)
{
    $criminalCash = CriminalCash::find($id);
    if($criminalCash){

        $criminalCash->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Criminal Cash Deleted Successfully'
        ]);
    }
    else{
        return  response()->json([
            'status'=>422,
            'message'=>'No Criminal Cash With this is found'
        ]);
    }
}
}