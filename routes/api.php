<?php


use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::group(['middleware' => ['cors']], function () { // <=== Añadir el middleware
        Route::post('register', [UserController::class, 'register']);
        Route::post('login', [UserController::class, 'authenticate']);
        Route::post('logout', [UserController::class, 'logout']);


        Route::group(['middleware' => ['jwt.verify']], function () {
                Route::get('user', [UserController::class, 'getAuthenticatedUser']);

                //Subjects
                Route::get('subjects', [SubjectController::class, 'index']);
                Route::get('subjects/{subject}', [SubjectController::class, 'show']);
                Route::post('subjects', [SubjectController::class, 'store']);
                Route::put('subjects/{subject}', [SubjectController::class, 'update']);
                Route::delete('subjects/{subject}', [SubjectController::class, 'delete']);

                //Answers
                Route::get('answers', [AnswerController::class, 'AnswersByStudent']);
                Route::get('answers/{answer}', [AnswerController::class, 'show']);
                Route::post('answers', [AnswerController::class, 'store']);
                Route::delete('answers/{answer}', [AnswerController::class, 'delete']);

                //Chapters
                Route::get('chapters', [ChapterController::class, 'index']);
                Route::get('chapters/{chapter}', [ChapterController::class, 'show']);
                Route::post('chapters', [ChapterController::class, 'store']);
                Route::delete('chapters/{chapter}', [ChapterController::class, 'delete']);

                Route::post('chapters/{chapter}/answers', [ChapterController::class, 'storeAnswers']);


                //Questions
                Route::get('questions', [QuestionController::class, 'index']);
                Route::get('questions/{question}', [QuestionController::class, 'show']);
                Route::post('questions', [QuestionController::class, 'store']);
                Route::delete('questions/{question}', [QuestionController::class, 'delete']);

                //SubjectUsers

                Route::get('users/subjects', [SubjectController::class, 'subjectByUser']);
                // Route::get('subject_Users/{subject_Users}', 'SubjectUserController@show');
                //  Route::post('subject_Users', 'SubjectUserController@store');
                //  Route::delete('subject_Users/{subject_Users}', 'SubjectUserController@delete');


        });
});
