<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Http\Resources\Subject as SubjectResource;
use App\Http\Resources\SubjectUserCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index()
    {
       // $this->authorize('viewAny', Subject::class);


        return new SubjectUserCollection( Auth::user()->subjects());
    }

    public function show(Subject $subject)
    {
        $this->authorize('view', $subject);
        return response()->json(new SubjectResource($subject),200);
    }

    public function store(Request $request)
    {
        $subject = Subject::create($request->all());
        return response()->json($subject, 201);
    }

    public function update(Request $request, Subject $subject)
    {
        $this->authorize('update', $subject);
        $subject->update($request->all());
        return response()->json($subject, 200);
    }

    public function delete(Subject $subject)
    {
        $this->authorize('delete', $subject);
        $subject->delete();
        return response()->json(null, 204);
    }
}
