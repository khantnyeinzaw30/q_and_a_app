<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // ask a question by user
    public function addQuestion(Request $request)
    {
        logger($request->all());
    }
}
