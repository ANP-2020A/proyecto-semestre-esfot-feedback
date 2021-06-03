<?php

namespace App\Policies;

use App\Chapters;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChapterPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any chapters.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->isGranted(User::ROLE_ADMIN)) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the chapters.
     *
     * @param  \App\User  $user
     * @param  \App\Chapters  $chapters
     * @return mixed
     */
    public function view(User $user, Chapters $chapters)
    {
        return $user->isGranted(User::ROLE_STUDENT)||
            $user->isGranted(User::ROLE_TEACHER);
    }

    /**
     * Determine whether the user can create chapters.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isGranted(User::ROLE_STUDENT)||
            $user->isGranted(User::ROLE_TEACHER);
    }

    /**
     * Determine whether the user can update the chapters.
     *
     * @param  \App\User  $user
     * @param  \App\Chapters  $chapters
     * @return mixed
     */
    public function update(User $user, Chapters $chapters)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    /**
     * Determine whether the user can delete the chapters.
     *
     * @param  \App\User  $user
     * @param  \App\Chapters  $chapters
     * @return mixed
     */
    public function delete(User $user, Chapters $chapters)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    /**
     * Determine whether the user can restore the chapters.
     *
     * @param  \App\User  $user
     * @param  \App\Chapters  $chapters
     * @return mixed
     */
    public function restore(User $user, Chapters $chapters)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    /**
     * Determine whether the user can permanently delete the chapters.
     *
     * @param  \App\User  $user
     * @param  \App\Chapters  $chapters
     * @return mixed
     */
    public function forceDelete(User $user, Chapters $chapters)
    {
        //
    }
}
