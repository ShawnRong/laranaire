<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = ['title', 'body', 'creator', 'questions'];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
