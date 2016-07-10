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
     * @param  Job  $job
     * @return bool
     */
    public function show(User $user, $job )
    {
        return $user->id == $job->users_id;
    }

  	/**
     * Determine if the given user can edit the Job.
     *
     * @param  User  $user
     * @param  Job  $job
     * @return bool
     */
    public function edit(User $user, $job )
    {  	   
    	  return $user->id == $job->users_id;
    }
    
  	/**
     * Determine if the given user can update the Job.
     *
     * @param  User  $user
     * @param  Job  $job
     * @return bool
     */
    public function update(User $user, $job )
    {
        return $user->id == $job->users_id;
    }
    
}
