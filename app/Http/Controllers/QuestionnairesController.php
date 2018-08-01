<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionnaireRequest;
use App\Questionnaire;
use App\User;

class QuestionnairesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

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

    public function create()
    {
        return view('questionnaires.create');
    }

    public function store(QuestionnaireRequest $request, Questionnaire $questionnaire)
    {
        dd($request->all());
        $questionnaire->fill($request->all());
        $questionnaire->creator = $this->user()->id;
        $questionnaire->save();
        return response([], 201);
    }

    public function update(QuestionnaireRequest $request, Questionnaire $questionnaire)
    {
        $questionnaire->update($request->all());
        return response([], 204);
    }

    public function destroy(Questionnaire $questionnaire)
    {
        $questionnaire->delete();
    }
}
