<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\User ;

use App\Cvs ;
use App\Policies\CvsPolicy ;

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
     * @param  Int  $id
     * @return bool
     */
    public function show(User $user, $Cv )
    {
        return $user->id == $Cv->user_id;
    }

  	/**
     * Determine if the given user can edit the Cv.
     *
     * @param  User  $user
     * @param  Int  $id
     * @return bool
     */
    public function edit(User $user, $Cv )
    {  	   
    	  return $user->id == $Cv->user_id;
    }
    
  	/**
     * Determine if the given user can update the Cv.
     *
     * @param  User  $user
     * @param  Int  $id
     * @return bool
     */
    public function update(User $user, $Cv )
    {
        return $user->id == $Cv->user_id;
    }
}
