<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\User ;

use App\Jobs ;
use App\Policies\JobsPolicy ;

class JobsPolicy
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
     * Determine if the given user can show the Job.
     *
     * @param  User  $user
     * @param  Int  $id
     * @return bool
     */
    public function show(User $user, $Job )
    {
        return $user->id == $Job->users_id;
    }

  	/**
     * Determine if the given user can edit the Job.
     *
     * @param  User  $user
     * @param  Int  $id
     * @return bool
     */
    public function edit(User $user, $Job )
    {  	   
    	  return $user->id == $Job->users_id;
    }
    
  	/**
     * Determine if the given user can update the Job.
     *
     * @param  User  $user
     * @param  Int  $id
     * @return bool
     */
    public function update(User $user, $Job )
    {
        return $user->id == $Job->users_id;
    }
    
}
