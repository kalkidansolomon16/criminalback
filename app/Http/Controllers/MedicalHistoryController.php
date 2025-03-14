<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalHistory;
use App\Http\Controllers\Controller;
use App\Models\CriminalGuard;
use Faker\Provider\Medical;
use Illuminate\Support\Facades\Validator;

class MedicalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicalHostory = MedicalHistory::all();
        if($medicalHostory){

            return response()->json([
                'medicalHistory'=>$medicalHostory,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'Medical History Not Found'
            ]);
        }
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'user_id'=>'required',
            'criminal_id'=>'required',
            'disease_type_id'=>'required',
            'hospital_name'=>'required',
            'doctor_name'=>'required',
            'date'=>'required',
            'doctor_address'=>'required',
            'medical_expense'=>'required',
            
        ]);
        if($validation->fails()){
        return response()->json([
        'status'=>422,
        'message'=>$validation->messages()
        ]);
        }
        else{
    // Create a new MedicalHistory instance
    $medicalHistory = new MedicalHistory();
    $medicalHistory->user_id = $request->user_id;
    $medicalHistory->criminal_id = $request->criminal_id;
    $medicalHistory->disease_type_id = $request->disease_type_id;
    $medicalHistory->hospital_name = $request->hospital_name;
    $medicalHistory->doctor_name = $request->doctor_name;
    $medicalHistory->date = $request->date;
    $medicalHistory->doctor_address = $request->doctor_address;
    $medicalHistory->medical_expense = $request->medical_expense;
    // $medicalHistory->guards = $request->guards;

    // Save the Medical History first
    $medicalHistory->save();

    $guards = explode(',',$request->input('guard_id'));
    foreach($guards as $guard){
$criminalGuard = new CriminalGuard();
$criminalGuard->criminal_id =  $medicalHistory->criminal_id;
$criminalGuard->guard_id =  $guard;
$criminalGuard->save();

    }

    // Attach guards to the medical history
    // Assuming guards are being sent as an array from the front-end
    // if ($request->has('guards')) {
    //     $guardIds = $request->input('guards');
    //     $medicalHistory->guards()->attach($guardIds);
    // }

    return response()->json([
        'status' => 200,
        'message' => 'Medical History added successfully'
    ]);
    
    }

    }
    public function show(string $id)
    {
        $medicalHostory = MedicalHistory::find($id);
        if($medicalHostory){
            return response()->json([
                'medicalHistory'=>$medicalHostory,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'medicalHistory not found'
            ]);
        }
    }

    
    public function edit(string $id)
    {
        $medicalHostory = MedicalHistory::find($id);
        if($medicalHostory){
            return response()->json([
                'medicalHistory'=>$medicalHostory,
                'message'=>'Success'
            ]);
        }
        else{
            return response()->json([
                'status'=>422,
                'message'=>'medicalHistory not found'
            ]);
        }
    }


    public function update(Request $request, string $id)
    {
        $validation = Validator::make($request->all(),[
            'user_id'=>'required',
            'criminal_id'=>'required',
            'disease_type_id'=>'required',
            'hospital_name'=>'required',
            'doctor_name'=>'required',
            'date'=>'required',
            'doctor_address'=>'required',
            'medical_expense'=>'required',
            'guards'=>'required'
        ]);
        if($validation->fails()){
        return response()->json([
        'status'=>422,
        'message'=>$validation->messages()
        ]);
        }
        else{
$medicalHostory = new MedicalHistory();
$medicalHostory->user_id = request('user_id');
$medicalHostory->criminal_id = request('criminal_id');
$medicalHostory->disease_type_id = request('disease_type_id');
$medicalHostory->hospital_name = request('hospital_name');
$medicalHostory->doctor_name = request('doctor_name');
$medicalHostory->date = request('date');
$medicalHostory->doctor_address = request('doctor_address');
$medicalHostory->medical_expense = request('medical_expense');
$medicalHostory->guards = request('guards');
$medicalHostory->update();
return response()->json([
    'status'=>200,
    'message'=>'property Type added successfully'
]);
    }
  
    }

    public function destroy(string $id)
    {
        $medicalHostory = MedicalHistory::find($id);
        if($medicalHostory){
            $medicalHostory->delete();
            return response()->json([
                'message'=>'MedicanHistory Deleted Successfully'
            ]);
        }
        else{
            return response()->json([
                'message'=>'MedicanHistory with this id not foud'
            ]);
        }
    }
}
