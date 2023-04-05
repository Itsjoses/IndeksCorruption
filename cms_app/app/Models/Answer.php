<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $primaryKey = ["responses_id", "question_id"];
    public $incrementing = false;

    function question(){
        return $this->belongsTo(Question::class);
    }

    function response(){
        return $this->belongsTo(Response::class);
    }

    function participant(){
        return $this->belongsTo(Participant::class);
    }

    public function scopeByCompositeKey($query, $response_id, $question_id)
    {
        return $query->where('response_id', $response_id)
            ->where('question_id', $question_id);
    }

}
