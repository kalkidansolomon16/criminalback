<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiseaseType extends Model
{
    protected $fillable = [
        'name',
    ];

    // public function medicalHistories()
    // {
    //     return $this->belongsTo(MedicalHistory::class);
    // }
}
