<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapters extends Model
{
    protected $fillable = ['Topic', 'Objetives'];

    public function user()
    {
        return $this->belongsTo('App\Subject','FK_idSubject','id');
    }
}
