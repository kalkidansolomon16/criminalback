<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiseaseType extends Model
{
    public function medicalHistories(){
        return $this->hasMany(MedicalHistory::class);
    }
}
