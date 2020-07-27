<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Answer extends Model
{

    protected $fillable = ['Value', 'FK_idQuestion','FK_idUser', 'FK_idChapter','user_subject_id'];

    public function chapters()
    {
        return $this->belongsTo('App\Chapters','FK_idChapter','id');
    }

    public function question()
    {

        return $this->belongsTo('App\Question','FK_idQuestion','id');
    }

    public function Subject_answer() {
        return $this->belongsTo('App\Subject_User'); }
   /* public static function boot() {
        parent::boot();

        static::creating(function ($answer) {
            $answer->subject__user_id = Auth::id();
        }); }*/
}
