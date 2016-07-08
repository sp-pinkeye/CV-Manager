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
	public function index(){
	 
	 	$jobs = Jobs::orderBy('order', 'asc')->get();
	 
	 	foreach( $jobs as $job ){
	 		$job->printSkill = Helpers::formatSkillSet( $job ) ;	
	 	}
      
	 	return view('jobs.index', ['jobs' => $jobs]);    
	}
	
	public function create(){

		// Get all the CVs for this user
		
		$cvs = Cvs::where( 'user_id',1 )->pluck('title', 'id') ;
		
		$skills = SkillList::pluck('name', 'id');
		
		return view('jobs.create' , ['skills'=>$skills ]) ;
	}
	
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
		// Dates must be filled in and formatted
		$job->start =  Carbon::parse( $request->start ) ;
		$job->end =  Carbon::parse( $request->end ) ;
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
	
	public function show( $id ){
		
		$job = Jobs::find($id);
		
		$printSkill = Helpers::formatSkillSet( $job ) ;
			
      return view('jobs.show', ['job'=>$job, 'skillSet'=> $printSkill ] );
	}
	
	public function edit( $id ){

      $job = Jobs::find($id);
		$skillList = SkillList::pluck('name', 'id');
		$selected = array();
		foreach( $job->skills as $jobSkill ){
			$selected[] = $jobSkill->skill_id;	
		}
      return view('jobs.edit', ['job'=>$job, 'skills'=>$skillList, 'selected'=>$selected] );
		
	}
	
	public function update( Request $request, $id ){
		
		$this->validate($request, [
		     'company' => 'required|max:255',
		     'summary' => 'required|max:255',
		     'description' => 'required',
		     'start' => 'required',
		     'end' => 'required',
		    'order' => 'required'
		]);
		
		$job = Jobs::find($id);

		$job->company = $request->company;
		$job->order = $request->order;
		$job->summary = $request->summary;
		$job->description = $request->description;
		$job->start =  Carbon::parse( $request->start ) ;
		$job->end =  Carbon::parse( $request->end ) ;
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
	public function destroy( $id ){
	}

	
}
