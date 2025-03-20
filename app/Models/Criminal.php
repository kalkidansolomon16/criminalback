<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criminal extends Model
{
    public function medicalHistories(){
        return $this->hasMany(MedicalHistory::class);
    }
    public function sex()
    {
        return $this->belongsTo(Sex::class, 'sex_id');
    }
}
