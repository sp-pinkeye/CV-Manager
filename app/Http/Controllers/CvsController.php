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
	
	public function create( Request $request ){

		// Get all the CVs for this user

        $jobs = Jobs::where( 'users_id', $request->user()->id)->select( 'company', 'id')->get() ;
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

        // attach or sync new jobs
        $sync = array() ;

        foreach( $request->jobIds as $job ){
            // How do I know if already created and just needs updating
            if( in_array( $job, $request->featureIds ) ){
                $sync[$job] = ['featured'=>true ]  ;
            }else{
                $sync[$job] = ['featured'=>false ]  ;
            }
        }
        $cv->save();
        $cv->jobs()->sync($sync, false);

        Session::flash('message', 'Successfully created CV!');
            
        return redirect('cvs') ;
	}
	
	public function show( Request $request, $id ){
		
		$cv = Cvs::find($id);

 		$policy = policy($cv)->show($request->user(), $cv) ;
      
      if( !$policy  ){
	      Session::flash('message', 'Wrong user id contact Administrator!');
	   	return redirect('/home') ;
	   }
		// How can I get helper inside the views or the Model methinks
		foreach( $cv->jobs as $job ){
			$job->skillSet = Helpers::formatSkillSet( $job ) ;
		}
					
		return view('cvs.show', ['cv'=>$cv ] );
	}
	
	public function edit(  Request $request, $id ){

	    $cv = Cvs::find($id);
		$policy = policy($cv)->show($request->user(), $cv) ;

        if( !$policy  ){
	        Session::flash('message', 'Wrong user id contact Administrator!');
	   	    return redirect('/home') ;
	    }

	    $jobs = Jobs::where( 'users_id', $request->user()->id)->select( 'company', 'id' )->get() ;

        $selected = [] ;
        $featured = [] ;

	    foreach( $cv->jobs as $job ){
            $selected[] = $job->id ;
            if($job->pivot->featured){
                $featured[] =$job->id  ;
            }
        }

        $data = array() ;
        foreach( $jobs as $job ){
            $data[] = ['company'=>$job['company'], 'id'=>$job['id'], 'selected'=>in_array( $job['id'], $selected), 'featured'=>in_array( $job['id'], $featured) ] ;
        }
	    return view('cvs.edit', ['cv'=>$cv, 'jobs'=>$data] );
		
	}
	
	public function update( Request $request, $id ){
		
		$this->validate($request, [
		     'title' => 'required|max:255',
		   
		]);
		
		$cv = Cvs::find($id);
	
		$policy = policy($cv)->show($request->user(), $cv) ;
      
        if( !$policy  ){
	        Session::flash('message', 'Wrong user id contact Administrator!');
	   	    return redirect('/home') ;
	    }
		$cv->title = $request->title;

        // attach or sync new jobs
        $sync = array() ;
        foreach( $request->jobIds as $job ){
            // How do I know if already created and just needs updating
            if( in_array( $job, $request->featureIds ) ){
                $sync[$job] = ['featured'=>true ]  ;
            }else{
                $sync[$job] = ['featured'=>false ]  ;
            }
        }
        $cv->save();
        $cv->jobs()->sync($sync, false);
        Session::flash('message', 'Successfully Updated CV!');
            
        return redirect('cvs') ;
	}
	public function destroy( $id ){
	}

}
