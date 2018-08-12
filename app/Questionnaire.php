<?php

namespace App;

use chillerlan\QRCode\QRCode;
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

    public function detailLink($params=[])
    {
        return route('questionnaire.detail', array_merge([$this->id, $this->slug], $params));
    }

    public function formLink()
    {
        return  route('form.generate', $this->identify_id);
    }

    public function formQrcode() {
        return (new QRCode())->render($this->formLink());
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
