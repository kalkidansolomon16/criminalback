<?php

namespace App\Models;
use App\Models\City;
use App\Models\Town;
use App\Models\User;
use App\Models\Court;
use App\Models\Crime;
use App\Models\Region;
use App\Models\Religion;
use App\Models\EthnicGroup;
use App\Models\CriminalType;
use App\Models\EducationalLevel;
// use App\Models\prisonerHistory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrisionHistory extends Model
{
    public function birthRegion(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'birth_region_id');
    }

    public function birthTown(): BelongsTo
    {
        return $this->belongsTo(Town::class, 'birth_town_id');
    }

    public function birthCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'birth_city_id');
    }

    public function currentRegion(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'current_region_id');
    }

    public function currentTown(): BelongsTo
    {
        return $this->belongsTo(Town::class, 'current_town_id');
    }

    public function currentCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'current_city_id');
    }

    public function educationalLevel(): BelongsTo
    {
        return $this->belongsTo(EducationalLevel::class, 'educational_level_id');
    }

    public function ethnicGroup(): BelongsTo
    {
        return $this->belongsTo(EthnicGroup::class, 'ethnic_group_id');
    }

    public function religion(): BelongsTo
    {
        return $this->belongsTo(Religion::class, 'religion_id');
    }

    public function closestRespondentRegion(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'Closest_respondent_region_id');
    }

    public function closestRespondentTown(): BelongsTo
    {
        return $this->belongsTo(Town::class, 'closest_respondent_town_id');
    }

    public function closestRespondentCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'Closest_respondent_city_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function prisioner_crimes(): HasMany
    {
        return $this->hasMany(Prisioner_crime::class);
    }

    public function criminalType(): BelongsTo
    {
        return $this->belongsTo(CriminalType::class, 'criminal_type_id');
    }

    public function arrestCourt(): BelongsTo
    {
        return $this->belongsTo(Court::class, 'arrest_court_id');
    }

    public function verdictCourt(): BelongsTo
    {
        return $this->belongsTo(Court::class, 'verdict_court_id');
    }

    public function updatedVerdictCourt(): BelongsTo
    {
        return $this->belongsTo(Court::class, 'updated_verdict_court_id');
    }
    public function prisonerCell(): BelongsTo
    {
        return $this->belongsTo(Court::class, 'prision_cell_id');
    }

    public function medicalHistories() {
        return $this->hasMany(MedicalHistory::class);
    }

    public function prisoner()
    {
        return $this->belongsTo(Prisioner::class, 'prisioner_id');
    }

    public function prisonerApperance()
    {
        return $this->hasOne(PrisonerApperance::class);
    }

    public function prisonerProperties()
    {
        return $this->hasMany(Prisioner_property::class);
    }

    public function prisonerCourtHistories()
    {
        return $this->hasMany(Prisioner_court_story::class);
    }
    
    public function prisonerCashes()
    {
        return $this->hasMany(Prisioners_cashe::class);
    }
}
