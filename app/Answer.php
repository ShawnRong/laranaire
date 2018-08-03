<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['question_id', 'model', 'submit_address'];

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }
}
