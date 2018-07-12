<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\User;
use Illuminate\Support\Facades\Auth;

class QuestionnairesController extends Controller {

    public function index(User $currentUser) {
//        $currentUser = $currentUser->find(Auth::id());
//        dd($currentUser->name);
//        $questionnaires = $currentUser->questionnaires();
//        dd($questionnaires);
//        return view('questionnaires.index', compact('questionnaires') );
        return view('questionnaires.index');
    }
}
