<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cvs;
use Auth ;

use App\Helpers;

use App\SkillList;
use App\Skills;
use App\Jobs;

use Carbon\Carbon;
use Session;


class CvsController extends Controller
{

	public function index(){
	 
	 	$cvs = Cvs::all();
	 
	 	return view('cvs.index', ['cvs' => $cvs]);    
	}
	
	public function create(){

		// Get all the CVs for this user
								
		$jobs = Jobs::where( 'users_id', Auth::user()->id)->pluck( 'company', 'id') ;
		
		return view('cvs.create', ['jobs'=>$jobs ] ) ;
	}
	
	public function store( Request $request ){
		
		$this->validate($request, [
		     'title' => 'required|max:255',
		     'user_id' => 'required',
		   
		]);
		
		$cv = new Cvs;
		$cv->title = $request->title;
		$cv->user_id = $request->user_id;
		$cv->save();

		
      Session::flash('message', 'Successfully created CV!');
            
      return redirect('cvs') ;
	}
	
	public function show( $id ){
		
		$cv = Cvs::find($id);

		// How can I get helper inside the views or the Model methinks
		foreach( $cv->jobs as $job ){
			$job->skillSet = Helpers::formatSkillSet( $job ) ;
		}
					
		return view('cvs.show', ['cv'=>$cv ] );
	}
	
	public function edit( $id ){

      $cv = Cvs::find($id);
		
		return view('cvs.edit', ['cv'=>$cv] );
		
	}
	
	public function update( Request $request, $id ){
		
		$this->validate($request, [
		     'title' => 'required|max:255',
		   
		]);
		
		$cv = Cvs::find($id);

		$cv->title = $request->title;
		$cv->save();

		
      Session::flash('message', 'Successfully Updated CV!');
            
      return redirect('cvs') ;
	}
	public function destroy( $id ){
	}

}
