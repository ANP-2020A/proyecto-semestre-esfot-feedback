<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\Auth;

class SubjectUser extends Pivot
{

    public $incrementing = true;
    protected $fillable = ['subject_id','user_id'];

    public function answers() {
        return $this->hasMany('App\Answer', 'subject_user_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function subject() {
        return $this->belongsTo('App\Subject');
    }
   /* public static function boot() {
        parent::boot();

        static::creating(function ($subject) {
            $subject->subject_id = Auth::id();


        });
       static::creating(function ($user) {

            $user->user_id = Auth::id();

        });
    }*/




}
