<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class UsersPolicy
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
     * Determine if the given user can show the given user profile.
     *
     * @param  User  $user
     * @param  Int  $id
     * @return bool
     */
    public function show(User $user, $id )
    {
        return $user->id === $id;
    }

  	/**
     * Determine if the given user can edit the given user profile.
     *
     * @param  User  $user
     * @param  Int  $id
     * @return bool
     */
    public function edit(User $user, $id )
    {
        return $user->id === $id;
    }
    
  	/**
     * Determine if the given user can update the given user profile.
     *
     * @param  User  $user
     * @param  Int  $id
     * @return bool
     */
    public function update(User $user, $id )
    {
        return $user->id === $id;
    }

}
