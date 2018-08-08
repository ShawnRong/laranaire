<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionnaireRequest;
use App\Questionnaire;
use App\User;

class QuestionnairesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $currentUser    = $user->currentUser();

        if($currentUser->is_admin) {
            $questionnaires = Questionnaire::all();
        } else {
            $questionnaires = Questionnaire::where('id', $currentUser->id);
        }
        return view('questionnaires.index', compact('questionnaires'));
    }

    public function show(QuestionnaireRequest $request, Questionnaire $questionnaire)
    {
        $this->authorize('update', $questionnaire);
        //redirect URL slug
        if(! empty($questionnaire->slug) && $questionnaire->slug != $request->slug ) {
            return redirect($questionnaire->linK(), 301);
        }

        return view('questionnaires.show', compact('questionnaire'));
    }

    public function create()
    {
        return view('questionnaires.create');
    }

    public function store(QuestionnaireRequest $request, Questionnaire $questionnaire)
    {
        $this->authorize('update', $questionnaire);

        $questionnaire->title = $request->title;
        $questionnaire->body = $request->body;
        $questionnaire->creator = $request->creator;
        $questionnaire->questions = json_encode($request->questions);
        $questionnaire->excerpt = str_limit($request->body, 10);
        $questionnaire->identify_id = md5(microtime());
        $questionnaire->save();

        return response(['status' => 'Create successfully'], 201);
    }

    public function update(QuestionnaireRequest $request, Questionnaire $questionnaire)
    {
        $this->authorize('update', $questionnaire);

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
        $this->authorize('update', $questionnaire);
        $answers = $questionnaire->answers;
        return view('questionnaires.detail', compact('answers'));
    }

    public function statics(Questionnaire $questionnaire)
    {
        $questions = json_decode($questionnaire->questions);
        $statics_field_type = array();
        collect($questions)->each(function ($field, $key) use (&$statics_field_type) {
            if($field->schema->type == "select" || $field->schema->type == "radios" || $field->schema->type == "checkbox") {
                array_push($statics_field_type, $key);
            }
        });
        $answers = json_decode($questionnaire->answers[0]->model);
        /**
         * TODO: generate statics
         * Select
         * Radio
         * Checkbox
         */
        return view('questionnaires.statics');
    }

}
