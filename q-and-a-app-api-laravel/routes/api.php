<?php

use App\Http\Controllers\API\UserAuthController;
use App\Http\Controllers\API\QuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// user register
Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/login', [UserAuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/add/question', [QuestionController::class, 'addQuestion']);
    Route::get('/questions/all', [QuestionController::class, 'getAllQuestions']);
    Route::get('/questions/others', [QuestionController::class, 'getOthersQuestions']);
});
