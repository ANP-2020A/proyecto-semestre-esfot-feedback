<?php

namespace App\Http\Controllers;

use App\Answer;

use App\SubjectUser;
use Illuminate\Http\Request;


use App\Http\Resources\Answer as AsnwerResource;
use App\Http\Resources\AnswerCollection;
use App\Http\Resources\Chapter;
use App\Http\Resources\ChapterCollection;
use Illuminate\Support\Facades\Auth;


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
        return response()->json(new AsnwerResource($answer), 200);
    }

    public function AnswersByStudent()
    {
        $user = Auth::user();
        $subjects = $user->subjects;
        foreach ($subjects as $subject) { // foreach
            foreach ($subject->chapters as $chapter) {
                // todo el atributo fk_user_id noo debe existir en anwers xq lo podemos obtener mediante la pivot table
                $chapter->answers = $chapter->answers()->where('subject_user_id', $subject->pivot->id)->get();
            }
        }
        return response()->json($subjects);
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
