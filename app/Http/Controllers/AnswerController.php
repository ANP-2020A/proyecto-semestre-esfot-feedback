<?php

namespace App\Http\Controllers;

use App\Answer;

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

    public function AnswersByStudent(Answer $answer)
    {

        $user = Auth::user();
        $subjects = $user->subjects;
        $result = [];
        foreach ($subjects as $subject) { // foreach
            $chapters = $subject->chapters;
            $tmpSubject = $subject;
            //dd($user);
            foreach ($chapters as $chapter) {
                $answers = $chapter->answers->where('FK_idUser', 1);

                $chapter["answers"] = $answers;
                //$tmpChapter = $chapter;
                //$tmpChapter["answers"] = $answers;
                $tmpSubject["chapters"][] = $answers;
            }
            //dd($tmpSubject);
            $result[] = $tmpSubject;
        }
        return response()->json($result);
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
