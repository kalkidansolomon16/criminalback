<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Criminal extends Model
{
    public function medicalHistories(){
        return $this->hasMany(MedicalHistory::class);
    }
    public function sex()
    {
        return $this->belongsTo(Sex::class, 'sex_id');
    }
  
    public function region(){
        return $this->belongsTo(Region::class,'id');
    }
    public function town(){
        return $this->belongsTo(Town::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function educational_level(){
        return $this->belongsTo(EducationalLevel::class);
    }
    public function ethnic_group(){
        return $this->belongsTo(EthnicGroup::class);
    } 
    public function religion(){
        return $this->belongsTo(Religion::class);
    }
    public function crime(){
        return $this->belongsTo(Crime::class);
    }
    public function criminal_type(){
        return $this->belongsTo(CriminalType::class);
    }
    public function court(){
        return $this->belongsTo(Court::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
