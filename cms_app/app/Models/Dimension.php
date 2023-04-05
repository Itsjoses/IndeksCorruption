<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    use HasFactory;
    protected $fillable  = ["survey_id", "name"];

    function survey(){
        return $this->belongsTo(Survey::class);
    }

    function indicators(){
        return $this->hasMany(Indicator::class);
    }

    function questions(){
        return $this->hasManyThrough(Question::class, Indicator::class);
    }

}
