<?php

namespace App\Http\Controllers;

use App\Answer;

use Illuminate\Http\Request;


use App\Http\Resources\Answer as AsnwerResource;
use App\Http\Resources\AnswerCollection;


class AnswerController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Answer::class);
        return new AnswerCollection(Answer::paginate(25));
    }
    public function show(Answer $answer)
    {
        $this->authorize('view', $answer);
        return response()->json(new AsnwerResource($answer),200);

    }
    public function store(Request $request)
    {
        $answer = Answer::create($request->all());
        $this->authorize('create', $answer);
        return response()->json($answer, 201);
    }
    public function delete(Answer $answer)
    {
        $this->authorize('delete', $answer);
        $answer->delete();
        return response()->json(null, 204);
    }
}

