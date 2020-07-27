<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Subject_User extends Model
{

    protected $fillable = ['subject_id','user_id'];
    public function answers() {
        return $this->hasMany('App\Answer'); }
    public function user() {
        return $this->belongsTo('App\User'); }
    public function subject() {
        return $this->belongsTo('App\Subject'); }
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
