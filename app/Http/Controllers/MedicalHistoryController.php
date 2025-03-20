<?php

namespace App\Http\Controllers;

// use App\Models\User;
// use Faker\Provider\Medical;
use Illuminate\Http\Request;
use App\Models\CriminalGuard;
use App\Models\MedicalHistory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MedicalHistoryController extends Controller
{

    public function index(Request $request)
    {

        $user = Auth::user();
    
        if (!$user) {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized'
            ]);
        }
    
     
        $criminalId = $request->input('criminal_id'); 
        $diseaseTypeId = $request->input('disease_type_id'); 
        $sexId =$request->input('sex_id');
  
        $query = MedicalHistory::with(['user', 'criminal','criminal.sex', 'diseaseType'])
            ->where('user_id', $user->id);
    

        if ($criminalId) {
            $query->where('criminal_id', $criminalId);
        }
    
        if ($diseaseTypeId) {
            $query->where('disease_type_id', $diseaseTypeId);
        }
        if($sexId){
            $query->where('sex_id',$sexId);
        }

    

        $medicalHistory = $query->get();
    
        if ($medicalHistory->isNotEmpty()) {
            return response()->json([
                'data' => $medicalHistory,
                'message' => 'Success'
            ]);
        } else {
            return response()->json([
                'status' => 422,
                'message' => 'Medical History Not Found'
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


    $medicalHistory->save();

    $guards = explode(',',$request->input('guard_id'));
    foreach($guards as $guard){
$criminalGuard = new CriminalGuard();
$criminalGuard->criminal_id =  $medicalHistory->criminal_id;
$criminalGuard->guard_id =  $guard;
$criminalGuard->save();

    }



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
