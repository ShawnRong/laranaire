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

    public function index(User $user, Questionnaire $questionnaire)
    {
        //TODO: login user auth permission
//        $currentUser    = $user->currentUser();
//        $questionnaires = $currentUser->questionnaires;
        $questionnaires = Questionnaire::all();
        return view('questionnaires.index', compact('questionnaires'));
    }

    public function show(Questionnaire $questionnaire)
    {
        return view('questionnaires.show', compact('questionnaire'));
    }

    public function create()
    {
        return view('questionnaires.create');
    }

    public function store(QuestionnaireRequest $request, Questionnaire $questionnaire)
    {
        $questionnaire->title = $request->title;
        $questionnaire->body = $request->body;
        $questionnaire->creator = $request->creator;
        $questionnaire->questions = json_encode($request->questions);
        $questionnaire->excerpt = str_limit($request->body, 10);
        $questionnaire->identify_id = md5($questionnaire->id);
        $questionnaire->save();

        return response(['status' => 'Create successfully'], 201);
    }

    public function update(QuestionnaireRequest $request, Questionnaire $questionnaire)
    {
        $questionnaire->title = $request->title;
        $questionnaire->body = $request->body;
        $questionnaire->questions = json_encode($request->questions);
        $questionnaire->excerpt = str_limit($request->body, 10);
        $questionnaire->update();
        return response(['status' => 'Update successfully'], 201);
    }

    public function destroy(Questionnaire $questionnaire)
    {
        $questionnaire->delete();
        return redirect('/questionnaire')->with('flash', 'Delete Successfully');
    }

    public function detail(Questionnaire $questionnaire)
    {
        $answers = $questionnaire->answers;
        return view('questionnaires.detail', compact('answers'));
    }
}
