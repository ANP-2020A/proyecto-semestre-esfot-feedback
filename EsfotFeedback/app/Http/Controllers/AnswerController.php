<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        return Answer::all();
    }
    public function show(Answer $answer)
    {
        return $answer;
    }
    public function store(Request $request)
    {
        $answer = Answer::create($request->all());
        return response()->json($answer, 201);
    }
    public function delete(Answer $answer)
    {
        $answer->delete();
        return response()->json(null, 204);
    }
}

