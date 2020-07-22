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

<<<<<<< HEAD
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('subjects', 'SubjectController@index');
Route::get('subjects/{subject}', 'SubjectController@show');
Route::post('subjects', 'SubjectController@store');
Route::put('subjects/{subject}', 'SubjectController@update');
Route::delete('subjects/{subject}', 'SubjectController@delete');
=======
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('answers', 'AnswerController@index');
Route::get('answers/{answer}', 'AnswerController@show');
Route::post('answers', 'AnswerController@store');
Route::delete('answers/{answer}', 'AnswerController@delete');
>>>>>>> 422b8cef8f7e864e8b23793a0f6cf0b91864c2db
