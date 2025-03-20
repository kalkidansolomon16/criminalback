<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    public function criminal(){
        return $this->belongsTo(Criminal::class, 'criminal_id');
    }
    public function DiseaseType(){
        return $this->belongsTo(DiseaseType::class, 'disease_type_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
