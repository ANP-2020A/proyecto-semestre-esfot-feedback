<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Chapters;
use App\Http\Resources\Chapter;
use App\Http\Resources\Chapter as ChapterResource;
use App\Http\Resources\ChapterCollection;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index()
    {
        return new ChapterCollection(Chapters::paginate(25));
    }
    public function show(Chapters $chapter)
    {
        return response()->json(new ChapterResource($chapter),200);
    }
    public function store(Request $request)
    {
        $chapter = Answer::create($request->all());
        return response()->json($chapter, 201);
    }
    public function delete(Answer $chapter)
    {
        $chapter->delete();
        return response()->json(null, 204);
    }
}
