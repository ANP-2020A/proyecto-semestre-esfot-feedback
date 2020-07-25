<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name','week_hours'];

    public function chapters()
    {
        return $this->hasMany('App\Chapters','FK_idSubject','id');
    }
}
