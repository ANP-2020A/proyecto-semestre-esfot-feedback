<?php

namespace App\Http\Controllers;


use App\Chapters;
use App\Http\Resources\Chapter;
use App\Http\Resources\Chapter as ChapterResource;
use App\Http\Resources\ChapterCollection;
use App\Subject;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Chapters::class);
        return new ChapterCollection(Chapters::paginate(25));
    }
    public function show(Chapters $chapter)
    {
        $this->authorize('view', $chapter);
        return response()->json(new ChapterResource($chapter),200);
    }
    public function store(Request $request)
    {

        $chapter = Chapter::create($request->all());
        return response()->json($chapter, 201);
    }
    public function update(Request $request, Chapters $chapter)
    {
        $this->authorize('update', $chapter);
        $chapter->update($request->all());
        return response()->json($chapter, 200);
    }
    public function delete(Chapter $chapter)
    {
        $this->authorize('delete', $chapter);
        $chapter->delete();
        return response()->json(null, 204);
    }
}
