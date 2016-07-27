<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\User ;

use App\Cvs ;

class CvsPolicy
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
     * Determine if the given user can show the Cv.
     *
     * @param  User  $user
     * @param  Cvs  $cv
     * @return bool
     */
    public function show(User $user, $cv )
    {
        return $user->id == $cv->user_id;
    }

  	/**
     * Determine if the given user can edit the Cv.
     *
     * @param  User  $user
     * @param  Cvs  $cv
     * @return bool
     */
    public function edit(User $user, $cv )
    {  	   
    	  return $user->id == $cv->user_id;
    }
    
  	/**
     * Determine if the given user can update the Cv.
     *
     * @param  User  $user
     * @param  Cvs  $cv
     * @return bool
     */
    public function update(User $user, $cv )
    {
        return $user->id == $cv->user_id;
    }
}
