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

Route::get('chapters', 'ChapterController@index');
Route::get('chapters/{chapter}', 'ChapterController@show');
Route::post('chapters', 'ChapterController@store');
Route::delete('chapters/{chapter}', 'AnswerController@delete');
