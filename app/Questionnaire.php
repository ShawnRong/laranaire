<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = ['title', 'body', 'creator', 'questions', 'identify_id'];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function link($params=[])
    {
        return route('questionnaire.show', array_merge([$this->id, $this->slug], $params));
    }

    public function submitQuestionnaire()
    {
        $this->increment('reply_count');
        $this->save();
    }

    public function openQuestionnaire()
    {
        $this->increment('view_count');
        $this->save();
    }
}
