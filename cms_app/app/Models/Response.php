<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    function participant(){
        return $this->belongsTo(Participant::class);
    }

    function city(){
        return $this->belongsTo(City::class);
    }

    function answers(){
        return $this->hasMany(Answer::class);
    }

    function survey(){
        return $this->belongsTo(Survey::class);
    }

    public function scopeByCompositeKey($query, $participant_id, $city_id, $survey_id)
    {
        return $query->where('participant_id', $participant_id)
            ->where('city_id', $city_id)
            ->where('survey_id', $survey_id);
    }

}
