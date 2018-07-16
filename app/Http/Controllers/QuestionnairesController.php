<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\User;

class QuestionnairesController extends Controller
{

    public function index(User $user)
    {
        $currentUser    = $user->currentUser();
        $questionnaires = $currentUser->questionnaires;
        return view('questionnaires.index', compact('questionnaires'));
    }

    public function show(Questionnaire $questionnaire)
    {
        return view('questionnaires.show');
    }

}
