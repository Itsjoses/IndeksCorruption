<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domicile extends Model
{

    protected $primaryKey = ['participant_id', 'city_id', 'start_date'];
    protected $casts = [
        "participant_id" => "int",
        "city_id" => "int",
        "start_date" => "date"
    ];


    public $incrementing = false;

    use HasFactory;

    function participant(){
        return $this->belongsTo(Participant::class);
    }

    function city(){
        return $this->belongsTo(City::class);
    }

    public function scopeByCompositeKey($query, $participant_id, $city_id, $start_date)
    {
        return $query->where('participant_id', $participant_id)
            ->where('city_id', $city_id)
            ->where('start_date', $start_date);
    }

}
