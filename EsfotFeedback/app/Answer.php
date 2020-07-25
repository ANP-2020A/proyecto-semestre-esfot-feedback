<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['Value', 'FK_idQuestion','FK_idUser', 'FK_idChapter'];

    public function chapters()
    {
        return $this->belongsTo('App\Chapters','FK_idChapter','id');
    }

    public function question()
    {
        return $this->belongsTo('App\Question','FK_idQuestion','id');
    }

}
