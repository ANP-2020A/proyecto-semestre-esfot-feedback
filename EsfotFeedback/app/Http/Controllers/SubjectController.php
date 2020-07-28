<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Http\Resources\Subject as SubjectResource;
use App\Http\Resources\SubjectCollection;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return new SubjectCollection(Subject::paginate(25));
    }

    public function show(Subject $subject)
    {
        return response()->json(new SubjectResource($subject),200);
    }

    public function store(Request $request)
    {
        $subject = Subject::create($request->all());
        return response()->json($subject, 201);
    }

    public function update(Request $request, Subject $subject)
    {
        $subject->update($request->all());
        return response()->json($subject, 200);
    }

    public function delete(Subject $subject)
    {
        $subject->delete();
        return response()->json(null, 204);
    }
}
