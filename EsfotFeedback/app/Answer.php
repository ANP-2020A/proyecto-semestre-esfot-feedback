<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['Value', 'FK_idQuestion','FK_idUser', 'FK_idChapter'];
}
