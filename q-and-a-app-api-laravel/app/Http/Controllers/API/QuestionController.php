<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // ask a question by user
    public function addQuestion(Request $request)
    {
        $data = [
            'question' => $request->question,
            'user_id' => $request->userId
        ];
        $q = Question::create($data);
        return response()->json(['question' => $q]);
    }

    // get all questions
    public function getAllQuestions(Request $request)
    {
        $q = Question::where('user_id', $request->query('userId'))
            ->orderBy('created_at', 'desc')
            ->get();
        return response()->json([
            'questions' => $q
        ]);
    }

    // get other's questions
    public function getOthersQuestions(Request $request)
    {
        $q = Question::whereNot('user_id', $request->query('userId'))
            ->orderBy('created_at', 'desc')
            ->get();
        logger($q->toArray());
        return response()->json([
            'questions' => $q
        ]);
    }
}
