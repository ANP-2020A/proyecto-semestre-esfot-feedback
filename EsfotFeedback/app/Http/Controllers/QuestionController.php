<?php

namespace App\Http\Controllers;




use App\Question;
use App\Http\Resources\Question as QuestionResource;
use App\Http\Resources\QuestionCollection;
use Illuminate\Http\Request;


class QuestionController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Question::class);

        return new QuestionCollection(Question::paginate(25));
    }
    public function show(Question $question)
    {
        $this->authorize('view', $question);
        return response()->json(new QuestionResource($question),200);
    }
    public function store(Request $request)
    {

        $question = Question::create($request->all());
        return response()->json($question, 201);
    }
    public function update(Request $request, Question $question)
    {
        $this->authorize('update', $question);
        $question->update($request->all());
        return response()->json($question, 200);
    }
    public function delete(Question $question)
    {
        $this->authorize('delete', $question);
        $question->delete();
        return response()->json(null, 204);
    }
}
