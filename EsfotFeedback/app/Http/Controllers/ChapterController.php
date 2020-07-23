<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Chapters;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index()
    {
        return Chapters::all();
    }
    public function show(Chapters $chapter)
    {
        return $chapter;
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
