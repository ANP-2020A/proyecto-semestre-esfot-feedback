<?php

namespace App\Http\Controllers;


use App\Http\Resources\SubjectUser as SubjectUserResource;
use App\Http\Resources\SubjectUserCollection;
use App\Subject_User;
use Illuminate\Http\Request;


class SubjectUserController extends Controller
{
    public function index()
    {
        return new SubjectUserCollection(Subject_User::paginate(4));
    }
    public function show(Subject_User $subject_Users)
    {
        return response()->json(new SubjectUserResource($subject_Users),200);
    }
    public function store(Request $request)
    {
        $subject_Users = Subject_User::create($request->all());
        return response()->json($subject_Users, 201);
    }
    public function delete(Subject_User $subject_Users)
    {
        $subject_Users->delete();
        return response()->json(null, 204);
    }
}
