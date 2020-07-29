<?php

namespace App\Http\Controllers;

use App\Answer;

use Illuminate\Http\Request;
use App\Http\Resources\answer as AnswerResource;

class AnswerController extends Controller
{
    public function index()
    {
        return AnswerResource::collection(Answer::all());
    }
    public function show(Answer $answer)
    {
        return new AnswerResource($answer);
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

