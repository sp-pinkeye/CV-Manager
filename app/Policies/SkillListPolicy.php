<?php
namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\User;
use App\SkillList;

class SkillListPolicy
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
     * Determine if the given user can show the Skill List.
     *
     * @param  User  $user
     * @param  Int  $id
     * @return bool
     */
    public function show(User $user, $SkillList )
    {
        return $user->id == $SkillList->user_id;
    }

  	/**
     * Determine if the given user can edit the Skill List.
     *
     * @param  User  $user
     * @param  Int  $id
     * @return bool
     */
    public function edit(User $user, $SkillList )
    {  	   
    	  return $user->id == $SkillList->user_id;
    }
    
  	/**
     * Determine if the given user can update the Skill List.
     *
     * @param  User  $user
     * @param  Int  $id
     * @return bool
     */
    public function update(User $user, $SkillList )
    {
        return $user->id == $SkillList->user_id;
    }

}
