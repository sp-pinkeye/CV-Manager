<?php

namespace App ;

use App\Jobs ;
use App\SkillList ;

class Helpers{


	static function formatSkillSet( $job ){

		// Get the Skill Set list
		$skillIds = array() ;
		foreach( $job->skills as $skill){
			$skillIds[] = $skill->skill_id ;
		}
		$skillSet = SkillList::whereIn( 'id', $skillIds )->select( 'name')->get() ;

		$printSkill = array() ; 
		foreach( $skillSet as $skill ){
			$printSkill[] = $skill->name ;
		}
		return implode( ", ",$printSkill );	
	} 

}

