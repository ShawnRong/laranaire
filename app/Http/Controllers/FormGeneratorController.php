<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class FormGeneratorController extends Controller
{
    function show(Request $request) {
        $questionnaire = Questionnaire::where('identify_id', $request->token)->firstOrFail();
        $questions = $questionnaire->questions;
        return view('form', compact('questions'));
    }
}
