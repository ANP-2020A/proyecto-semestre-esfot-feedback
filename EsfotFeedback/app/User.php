<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_TEACHER = 'ROLE_TEACHER';
    const ROLE_STUDENT = 'ROLE_STUDENT';

//    private const ROLES_HIERARCHY = [
//        self::ROLE_ADMIN => [self::ROLE_TEACHER, self::ROLE_STUDENT],
//        self::ROLE_TEACHER => [self::ROLE_STUDENT],
//        self::ROLE_STUDENT => []
//    ];

    private const ROLES_HIERARCHY = [
        self::ROLE_ADMIN => [self::ROLE_TEACHER],
        self::ROLE_TEACHER => [],
        self::ROLE_STUDENT => []
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function subjects() {
        return $this->belongsToMany('App\Subject')->using('App\SubjectUser');
    }


//    public function isGranted($role)
//    {
//        return $role === $this->role || in_array($role, self::ROLES_HIERARCHY[$this->role]);
//    }

    public function isGranted($role)
    {
        if ($role === $this->role) {
            return true;
        }
        return self::isRoleInHierarchy($role, self::ROLES_HIERARCHY[$this->role]);
    }
    private static function isRoleInHierarchy($role, $role_hierarchy)
    {
        if (in_array($role, $role_hierarchy)) {
            return true;
        }
        foreach ($role_hierarchy as $role_included) {
            if(self::isRoleInHierarchy($role,self::ROLES_HIERARCHY[$role_included]))
            {
                return true;
            }
        }
        return false;
    }

}
