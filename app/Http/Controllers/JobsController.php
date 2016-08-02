<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Jobs;

use App\Helpers ;
use App\SkillList;
use App\Skills;
use App\Cvs;

use Carbon\Carbon;
use Session;


class JobsController extends Controller
{
    /**
     * index - list all current jobs
     *
     * @return View
     */
	 
	public function index(){
	 
	 	$jobs = Jobs::orderBy('order', 'asc')->get();

	 	return view('jobs.index', ['jobs' => $jobs]);    
	}

    /**
     * Display the create form for Jobs
     *
     * @param Request $request
     * @return View
     */
	public function create(Request $request){

		$cvs = Cvs::where( 'user_id',1 )->pluck('title', 'id') ;
		
		$skillList = SkillList::where('user_id', $request->user()->id)->pluck('name', 'id');
		
		return view('jobs.create' , ['skills'=>$skillList ]) ;
	}

    /**
     * Save the newly created Jobs data
     *
     * @param Request $request
     * @return Redirector
     */
	public function store( Request $request ){
		$this->validate($request, [
		     'company' => 'required|max:255',
		     'summary' => 'required|max:255',
		     'description' => 'required',
		     'start' => 'required',
		     'end' => 'required',
		     'order' => 'required',
		     'user_id' => 'required',
		   
		]);
		$job = new Jobs;
		$job->company = $request->company;
		$job->order = $request->order;
		$job->summary = $request->summary;
		$job->description = $request->description;
		$job->start =  $request->start  ;
		$job->end =   $request->end  ;
		$job->users_id = $request->user_id;

		$job->save();

		$skills = $request->skills ;

		// Create a new set of skills - can the hasmany do this
		foreach( $skills as $skill ){
			$jobSkill = new Skills( ['skill_id'=>$skill]) ;
			$job->skills()->save($jobSkill) ;			
		}

      Session::flash('message', 'Successfully created Job!');
            
      return redirect('jobs') ;
	}

    /**
     * Display a single job index $id
     *
     * @param Request $request
     * @param $id
     * @return View
     */
	public function show( Request $request ,Jobs $job ){
		
	   $policy = policy($job)->show($request->user(), $job) ;
      
      if( !$policy  ){
	      Session::flash('message', 'Wrong user id contact Administrator!');
	   	return redirect('/home') ;
	   }
        return view('jobs.show', ['job'=>$job ] );
	}

    /**
     * Display edit form for Job index $id
     *
     * @param Request $request
     * @param $id
     * @return View
     */
	public function edit( Request $request ,Jobs $job ){

	   $policy = policy($job)->edit($request->user(), $job) ;
      
      if( !$policy  ){
	      Session::flash('message', 'Wrong user id contact Administrator!');
	   	return redirect('/home') ;
	   }
		$skillList = SkillList::where('user_id', $request->user()->id)->pluck('name', 'id');
		$selected = array();
		foreach( $job->skills as $jobSkill ){
			$selected[] = $jobSkill->skill_id;	
		}
      return view('jobs.edit', ['job'=>$job, 'skills'=>$skillList, 'selected'=>$selected] );
		
	}

    /**
     * Update details of job index $id
     *
     * @param Request $request
     * @param $id
     * @return Redirector
     */
	public function update( Request $request, Jobs $job ){
		
		$this->validate($request, [
		     'company' => 'required|max:255',
		     'summary' => 'required|max:255',
		     'description' => 'required',
		     'start' => 'required',
		     'end' => 'required',
		    'order' => 'required'
		]);
		
	   $policy = policy($job)->update($request->user(), $job) ;
      
      if( !$policy  ){
	      Session::flash('message', 'Wrong user id contact Administrator!');
	   	return redirect('/home') ;
	   }

		$job->company = $request->company;
		$job->order = $request->order;
		$job->summary = $request->summary;
		$job->description = $request->description;
		$job->start =  $request->start ;
		$job->end =  $request->end  ;
        $job->save();

		// Skills may need to be unique
		// and now get the skills
		$skills = $request->skills ;

		// Create a new set of skills
		foreach( $skills as $skill ){
			$job->skills()->firstOrCreate(['skill_id'=> $skill ] ) ;			
		}
		
      Session::flash('message', 'Successfully Updated Jobs!');
            
      return redirect('jobs') ;
	}

    /**
     * destroy - MOT IMPLEMENTED
     * @param $id
     */
	public function destroy( Jobs $job ){
	}

	
}
