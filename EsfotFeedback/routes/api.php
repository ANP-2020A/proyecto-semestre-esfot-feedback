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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('subjects', function() {
    return Subject::all();
});

Route::get('subjects/{id}', function($id) {
    return Subject::find($id);
});

Route::post('subjects', function(Request $request) {
    return Subject::create($request->all());
});

Route::put('subjects/{id}', function(Request $request, $id) {
    $article = Subject::findOrFail($id);
    $article->update($request->all());
    return $article;
});

Route::delete('subjects/{id}', function($id) {
    Subject::find($id)->delete();
    return 204;
});
