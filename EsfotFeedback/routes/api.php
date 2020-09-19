<?php


use App\Subject;
use Illuminate\Http\Request;

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
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@authenticate');


    Route::group(['middleware' => ['jwt.verify']], function () {
        Route::get('user', 'UserController@getAuthenticatedUser');

//Subjects
        Route::get('subjects', 'SubjectController@index');
        Route::get('subjects/{subject}', 'SubjectController@show');
        Route::post('subjects', 'SubjectController@store');
        Route::put('subjects/{subject}', 'SubjectController@update');
        Route::delete('subjects/{subject}', 'SubjectController@delete');

//Answers
        Route::get('answers', 'AnswerController@index');
        Route::get('answers/{answer}', 'AnswerController@show');
        Route::post('answers', 'AnswerController@store');
        Route::delete('answers/{answer}', 'AnswerController@delete');

//Chapters
        Route::get('chapters', 'ChapterController@index');
        Route::get('chapters/{chapter}', 'ChapterController@show');
        Route::post('chapters', 'ChapterController@store');
        Route::delete('chapters/{chapter}', 'ChapterController@delete');

        Route::post('chapters/{chapter}/answers', 'ChapterController@storeAnswers');


//Questions
        Route::get('questions', 'QuestionController@index');
        Route::get('questions/{question}', 'QuestionController@show');
        Route::post('questions', 'QuestionController@store');
        Route::delete('questions/{question}', 'QuestionController@delete');

        //SubjectUsers

        Route::get('users/subjects', 'SubjectController@subjectByUser');
       // Route::get('subject_Users/{subject_Users}', 'SubjectUserController@show');
      //  Route::post('subject_Users', 'SubjectUserController@store');
      //  Route::delete('subject_Users/{subject_Users}', 'SubjectUserController@delete');


    });
});
