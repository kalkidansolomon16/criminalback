<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    public function prisonerHistory()
    {
        return $this->belongsTo(PrisionHistory::class, 'prision_history_id');
    }
    public function diseaseType()
    {
        return $this->belongsTo(DiseaseType::class, 'disease_type_id');
    }
}
