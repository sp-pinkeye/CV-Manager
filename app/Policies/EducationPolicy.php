<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\User ;

use App\Education ;

class EducationPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given user can show the Education.
     *
     * @param  User  $user
     * @param  Education  $education
     * @return bool
     */
    public function show(User $user, $education )
    {
        return $user->id == $education->user_id;
    }

    /**
     * Determine if the given user can edit the Education.
     *
     * @param  User  $user
     * @param  Education  $education
     * @return bool
     */
    public function edit(User $user, $education )
    {
        return $user->id == $education->user_id;
    }

    /**
     * Determine if the given user can update the Education.
     *
     * @param  User  $user
     * @param  Education  $education
     * @return bool
     */
    public function update(User $user, $education )
    {
        return $user->id == $education->user_id;
    }
}
