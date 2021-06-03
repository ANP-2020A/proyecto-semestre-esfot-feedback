<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapters extends Model
{
    protected $fillable = ['Topic', 'Objetives'];

    public function subject()
    {
        return $this->belongsTo('App\Subject','FK_idSubject','id');
    }
    public function answers()
    {
        return $this->hasMany('App\Answer','FK_idChapter','id');
    }
}
