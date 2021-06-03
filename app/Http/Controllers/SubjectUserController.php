<?php

namespace App\Http\Controllers;


use App\Http\Resources\SubjectUser as SubjectUserResource;
use App\Http\Resources\SubjectUserCollection;
use App\SubjectUser;
use Illuminate\Http\Request;


class SubjectUserController extends Controller
{
    public function index()
    {
        return new SubjectCollection(Auth::user()->subjects);
    }
    public function show(SubjectUser $subject_Users)

    {
        $this->authorize('view', $subject_Users);
        return response()->json(new SubjectUserResource($subject_Users),200);
    }

    public function store(Request $request)
    {
        $subject_Users = SubjectUser::create($request->all());
        return response()->json($subject_Users, 201);
    }

    public function delete(SubjectUser $subject_Users)

    {
        $this->authorize('delete', $subject_Users);
        $subject_Users->delete();
        return response()->json(null, 204);
    }
}
