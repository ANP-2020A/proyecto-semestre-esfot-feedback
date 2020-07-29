<?php

namespace App\Http\Controllers;




use App\Question;
use App\Http\Resources\Question as QuestionResource;
use Illuminate\Http\Request;


class QuestionController extends Controller
{
    public function index()
    {
        return QuestionResource::collection(Question::all());
    }
    public function show(Question $question)
    {
        return new QuestionResource($question);
    }
    public function store(Request $request)
    {
        $question = Question::create($request->all());
        return response()->json($question, 201);
    }
    public function delete(Question $question)
    {
        $question->delete();
        return response()->json(null, 204);
    }
}
