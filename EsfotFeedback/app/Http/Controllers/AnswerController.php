<?php

namespace App\Http\Controllers;

use App\Answer;

use Illuminate\Http\Request;
use App\Http\Resources\answer as AsnwerResource;

class AnswerController extends Controller
{
    public function index()
    {
        return AsnwerResource::collection(Answer::all());
    }
    public function show(Answer $answer)
    {
        return new AsnwerResource($answer);
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

