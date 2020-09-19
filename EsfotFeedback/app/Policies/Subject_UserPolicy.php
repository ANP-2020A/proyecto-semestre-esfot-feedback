<?php

namespace App\Policies;

use App\Subject_User;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Subject_UserPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->isGranted(User::ROLE_ADMIN)) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any subjects.
     *
     * @param  \App\User  $user
     * @return mixed
     */

    public function viewAny(User $user)
    {
        return $user->isGranted(User::ROLE_STUDENT)||
            $user->isGranted(User::ROLE_TEACHER);
    }

    /**
     * Determine whether the user can view the subject_ user.
     *
     * @param  \App\User  $user
     * @param  \App\Subject_User  $subjectUser
     * @return mixed
     */
    public function view(User $user, Subject_User $subjectUser)
    {
        return $user->isGranted(User::ROLE_STUDENT)||
            $user->isGranted(User::ROLE_TEACHER);
    }

    /**
     * Determine whether the user can create subject_ users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    /**
     * Determine whether the user can update the subject_ user.
     *
     * @param  \App\User  $user
     * @param  \App\Subject_User  $subjectUser
     * @return mixed
     */
    public function update(User $user, Subject_User $subjectUser)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the subject_ user.
     *
     * @param  \App\User  $user
     * @param  \App\Subject_User  $subjectUser
     * @return mixed
     */
    public function delete(User $user, Subject_User $subjectUser)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    /**
     * Determine whether the user can restore the subject_ user.
     *
     * @param  \App\User  $user
     * @param  \App\Subject_User  $subjectUser
     * @return mixed
     */
    public function restore(User $user, Subject_User $subjectUser)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the subject_ user.
     *
     * @param  \App\User  $user
     * @param  \App\Subject_User  $subjectUser
     * @return mixed
     */
    public function forceDelete(User $user, Subject_User $subjectUser)
    {
        //
    }
}
