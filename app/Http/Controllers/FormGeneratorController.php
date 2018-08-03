<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Questionnaire;
use Illuminate\Http\Request;

class FormGeneratorController extends Controller
{
    function show(Request $request) {
        $questionnaire = Questionnaire::where('identify_id', $request->token)->firstOrFail();
        $questions = $questionnaire->questions;
        $quesitonnaire_id = $questionnaire->id;
        return view('form', compact('questions', 'quesitonnaire_id' ));
    }

    function store(Request $request, Answer $answer)
    {
        $answer->questionnaire_id = $request->formId;
        $answer->model = json_encode($request->data);
        $answer->submit_address = $request->ip();
        $answer->save();

        return response(['status' => 'Submit successfully'], 201);
    }
}
