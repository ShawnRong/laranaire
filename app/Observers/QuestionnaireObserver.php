<?php

namespace App\Observers;

use App\Handlers\SlugTranslateHandler;
use App\Questionnaire;

class QuestionnaireObserver
{
    public function saving(Questionnaire $questionnaire)
    {
        if(!$questionnaire->slug)
        {
            $questionnaire->slug = app(SlugTranslateHandler::class)->translate($questionnaire->title);
        }
    }
}
