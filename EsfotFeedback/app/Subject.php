<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Subject extends Model
{
    protected $fillable = ['name','week_hours'];

    public function chapters()
    {
        return $this->hasMany('App\Chapters','FK_idSubject','id');
    }
    public function subjecjs_users() {
        return $this->hasMany('App\Subject_Users');
    }

}
